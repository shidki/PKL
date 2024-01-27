<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gedung;
use App\Models\Layanan;
use App\Models\Users;
use App\Models\Penginapan;
use App\Models\Wisata;
use App\Models\Kuliner;
use App\Models\Menu;
use App\Models\Fasilitas;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    //
    public function viewpage(){
        $jml_pengguna = Users::select("id")
        ->from('users')
        ->count();

        $jml_admin = Users::select("id")
        ->from('users')
        ->count();

        $email = session('email');
        $getuser = Users::select("*")
        ->from("users")
        ->where("email",'=',$email)
        ->first();

        // $pw = Crypt::decryptString($getuser->password);
        // dd($pw);
        return view('sistem_informasi.admin.dashboard',["jml_pengguna" => $jml_pengguna,"jml_admin" => $jml_admin, 'email' => $email,'name' => $getuser->username ]);
    }
    public function info_gedung(){
        $gedung = Gedung::select('*')
        ->from('gedung')
        ->get();

        $count = count($gedung);
        $layananArray = [];
        for ($i = 0; $i < $count; $i++) {
            $gedungs = $gedung[$i];
            $layanan = Layanan::select('*')
            ->from('layanan')
            ->where('id_gedung','=',$gedungs->id)
            ->get();
            $layananArray[$gedungs->id] = $layanan;
        }
        // dd($layananArray);
        return view('sistem_informasi.admin.dinas.dinas',['gedung' => $gedung,'layanan' => $layananArray]);
    }
    public function delete_gedung($id){

        $delete_gedung = DB::table('gedung')->select("*")->where('id' ,"=", $id);

        if($delete_gedung){
            $get_layanan = DB::table('layanan')->select("*")->where('id_gedung' ,"=", $id)->get();
            // melakukan penghapusan semua layanan sesuai id gedung yang mau dihapus
            DB::table('layanan')->where('id_gedung','=', $id)->delete();
            $delete_gedung->delete();
            return back()->with(['sukses_toast' => "sukses menghapus data"]);
        }else{
            return back()->with(['error_toast' => "gagal menghapus data"]);
        }
    }
    public function edit_gedung($id){
        $dinas = Gedung::select('*')
        ->from('gedung')
        ->where('id','=',$id)
        ->first();
         $layanan = Layanan::select('*')
         ->from('layanan')
         ->where('id_gedung','=',$id)
         ->get();

        return view('sistem_informasi.admin.dinas.edit_dinas',['dinas' => $dinas,'layanan' => $layanan]);
    }
    public function submit_edit_dinas(Request $request){
        try {
            $this->validate($request, [
                'dinas' => 'required',
                'file_layanan' => 'nullable|mimes:xlsx',
            ]);
            // pertama update data gedung nya dulu
            // misal deskripsi nya  diubah
            if($request->deskripsi !== null){
                DB::table('gedung')
                ->update([
                    'nama' => $request->dinas,
                    'deskripsi' => $request->deskripsi
                ]);
            }else{
                //  misal deskripsinya ga dirubah
                DB::table('gedung')->where('id','=',$request->id)
                ->update([
                    'nama' => $request->dinas,
                ]);
            }

            if($request->file_layanan !== null){
                $file = $request->file('file_layanan');
                $nama_file = 'File_layanan'.'.'.$file->getClientOriginalExtension();
                $file->move('file_layanan',$nama_file);
                $nama_file_excel = 'file_layanan/'.$nama_file;
    
                $spreadsheet = IOFactory::load($nama_file_excel);
                // buat ngebaca sheet pertama
                $sheet = $spreadsheet->getActiveSheet();
                // ngubah seluruh data ke array
                $data = $sheet->toArray();
    
                // looping buat ngebaca isi file nya
                for($i = 0; $i < count($data); $i++){
                    // ini misal ada 2 kolom input ( soalnya aku nerapin cuman masukin 1 kolom doang )
                    if (isset($data[$i][1])) {
                        return back()->with(["error_input_dinas" => 'Input Layanan terhenti karena pada baris ke '.$i+1 .' tidak sesuai format penulisan']);
                    }else{
                        if($data[$i][0] == null){
                            return back()->with(["error_input_dinas" => 'Input Layanan terhenti karena pada baris ke '.$i+1 .' tidak sesuai format penulisan']);
                        }else{
                            $trim_data = trim($data[$i][0]);
                            $cek_layanan = Layanan::select('nama')
                            ->from('layanan')
                            ->where('nama','=',$trim_data)
                            ->get();
                            //  KUERI DIATAS UNTUK MENGECEK APAKAH NAMA LAYANAN SUDAH ADA DIDATA BASE ATAU BELOM
                            if(count($cek_layanan) > 0){
                                // KONDISI KETIKA SUDAH ADA DI DATABASE
                                return back()->with(["error_input_dinas" => 'Input Layanan terhenti karena Layanan pada baris ke '.$i+1 .' sudah tersedia']);
                            }else{
                                // KONDISI JIKA BELUM TERSEDIA, MAKA AKAN DILAKUKAN INSERT
                                DB::table('layanan')
                                ->insert([
                                    'nama' => $trim_data,
                                    'id_gedung' => $request->id // ini id gedung nya sesuai apa yang di insert
                                ]);
                            }
                        }
                    }
                }
                File::delete('file_layanan/'.$nama_file);
            }
            return back()->with(['sukses_toast' => 'berhasil mengedit data']);
        } catch (ValidationException $e) {
            // Validation failed
            $errors = $e->errors();

            // Check specific fields
            if (isset($errors['dinas'])) {
                return back()->with(["error_input_dinas" => 'nama dinas harus di isi']);
            }

            if (isset($errors['file_layanan'])) {
                return back()->with(["error_input_dinas" => 'File harus dalam bentuk .xlsx / excel']);
            }
        }
    }

    public function hapus_layanan($id_layanan){
        $hapus_layanan = DB::table('layanan')->where('id','=',$id_layanan)->delete();
        if($hapus_layanan){
            return back()->with(['sukses_toast' => "berhasil menghapus layanan"]);
        }else{
            return back()->with(['error_toast' => "gagal menghapus layanan"]);
        }
    }
    public function add_dinas(){
        return view('sistem_informasi.admin.dinas.add_dinas');
    }
    public function submit_add_dinas(Request $request){
        try {
            $this->validate($request, [
                'dinas' => 'required',
                'deskripsi' => 'required',
                'file_layanan' => 'required|mimes:xlsx',
            ]);
            $cek_data = Gedung::select('*')
            ->from('gedung')
            ->where('nama','=',$request->dinas)
            ->first();
            
            if($cek_data){
                return back()->with(["error_input_dinas" => 'Dinas sudah tersedia']);
            }else{
                if($request->maps !== null){
                    $insert_data = DB::table('gedung')
                    ->insert([
                        "nama" => $request->dinas,
                        "maps" => $request->maps,
                        "deskripsi" => $request->deskripsi,
                    ]);
                    if($insert_data){
                        // membaca isi data file excel nya
                        $file = $request->file('file_layanan');
                        $nama_file = 'File_layanan'.'.'.$file->getClientOriginalExtension();
                        $file->move('file_layanan',$nama_file);
                        $nama_file_excel = 'file_layanan/'.$nama_file;
            
                        $spreadsheet = IOFactory::load($nama_file_excel);
                        // buat ngebaca sheet pertama
                        $sheet = $spreadsheet->getActiveSheet();
                        // ngubah seluruh data ke array
                        $data = $sheet->toArray();
                        for($i = 0; $i < count($data); $i++){
                            // ini misal ada 2 kolom input ( soalnya aku nerapin cuman masukin 1 kolom doang )
                            if (isset($data[$i][1])) {
                                // dd(5);
                                return back()->with(["error_input_dinas" => 'Input Layanan terhenti karena pada baris ke '.$i+1 .' tidak sesuai format penulisan']);
                            }else{
                                if($data[$i][0] == null){
                                    return back()->with(["error_input_dinas" => 'Input Layanan terhenti karena pada baris ke '.$i+1 .' tidak sesuai format penulisan']);
                                }else{
                                    //  mengecek id gedung yang sudah ditambah sebelumnya diatas untuk menambah data layanan pada gedung tersebut
                                    $cek_id = Gedung::select('id')
                                    ->from('gedung')
                                    ->where('nama','=',$request->dinas)
                                    ->first();
    
                                    // kondisi jika id ditemukan
                                    if($cek_id){
                                        $insert_layanan = DB::table('layanan')
                                        ->insert([
                                            'nama' => $data[$i][0],
                                            'id_gedung' => $cek_id->id
                                        ]);
                                        // kondisi jika insert gagal
                                        if(!$insert_layanan){
                                            return back()->with(['error_toast' => 'gagal Menambah data']);
                                        }
                                    }
                                }
                            }
                        }
                        File::delete('file_layanan/'.$nama_file);
                        return back()->with(['sukses_toast' => 'berhasil Menambah data']);
                    }
                }else{
                    $insert_data = DB::table('gedung')
                    ->insert([
                        "nama" => $request->dinas,
                        "deskripsi" => $request->deskripsi,
                    ]);
                    if($insert_data){
                        // membaca isi data file excel nya
                        $file = $request->file('file_layanan');
                        $nama_file = 'File_layanan'.'.'.$file->getClientOriginalExtension();
                        $file->move('file_layanan',$nama_file);
                        $nama_file_excel = 'file_layanan/'.$nama_file;
            
                        $spreadsheet = IOFactory::load($nama_file_excel);
                        // buat ngebaca sheet pertama
                        $sheet = $spreadsheet->getActiveSheet();
                        // ngubah seluruh data ke array
                        $data = $sheet->toArray();
                        for($i = 0; $i < count($data); $i++){
                            // ini misal ada 2 kolom input ( soalnya aku nerapin cuman masukin 1 kolom doang )
                            if (isset($data[$i][1])) {
                                // dd(5);
                                return back()->with(["error_input_dinas" => 'Input Layanan terhenti karena pada baris ke '.$i+1 .' tidak sesuai format penulisan']);
                            }else{
                                if($data[$i][0] == null){
                                    return back()->with(["error_input_dinas" => 'Input Layanan terhenti karena pada baris ke '.$i+1 .' tidak sesuai format penulisan']);
                                }else{
                                    //  mengecek id gedung yang sudah ditambah sebelumnya diatas untuk menambah data layanan pada gedung tersebut
                                    $cek_id = Gedung::select('id')
                                    ->from('gedung')
                                    ->where('nama','=',$request->dinas)
                                    ->first();
    
                                    // kondisi jika id ditemukan
                                    if($cek_id){
                                        $insert_layanan = DB::table('layanan')
                                        ->insert([
                                            'nama' => $data[$i][0],
                                            'id_gedung' => $cek_id->id
                                        ]);
                                        // kondisi jika insert gagal
                                        if(!$insert_layanan){
                                            return back()->with(['error_toast' => 'gagal Menambah data']);
                                        }
                                    }
                                }
                            }
                        }
                        File::delete('file_layanan/'.$nama_file);
                        return back()->with(['sukses_toast' => 'berhasil Menambah data']);
                    }
                }
            }
        }
        catch(ValidationException $e){
            $errors = $e->errors();

            // Check specific fields
            if (isset($errors['dinas'])) {
                return back()->with(["error_input_dinas" => 'nama dinas harus di isi']);
            }

            if (isset($errors['file_layanan'])) {
                return back()->with(["error_input_dinas" => 'File harus dalam bentuk .xlsx / Layanan harus di isi']);
            }

            if (isset($errors['deskripsi'])) {
                return back()->with(["error_input_dinas" => 'Deskripsi tidak boleh kosong']);
            }
        }
    }


    
    
    // ADMIN
    public function info_admin(){
        $users = Users::select('u.*')
        ->from('users as u')
        ->get();
        return view('sistem_informasi.admin.CRUD_admin.main_admin', ['users' => $users]);
    }

    public function add_admin(Request $request) {
        $pw = Bcrypt($request->password);
        // untuk insert ID admin nya
        $cek = DB::table('users')
        ->select('id')
        ->orderByRaw("LENGTH(id), CAST(id AS SIGNED), id")
        ->get();

        $cekPanjang = count($cek);
        $lastNumber = (int)substr($cek[$cekPanjang - 1]->id, 9);
        $year = Date('Y');
        $id = 'admin' . $year . $lastNumber+1;
        
        $exsistingUser = DB::table('users')->where('email', $request->email)->first();
        if($exsistingUser) {
            return back()->with(["error_toast" => 'Email sudah tersedia']);
        }else{
            $add_admin = DB::table('users')->insert([
                "id" => $id,
                "email" => $request->email,
                "username" => $request->username,
                "password" => $pw,
            ]);
        }
        return back()->with(["sukses_toast" => 'Sukses menambahkan admin']);
    }

    public function edit_admin($id) {
        $update = DB::table('users')->select("*")->where('id','=',$id)->first();
        // dd($update);    
        return view('sistem_informasi.admin.CRUD_admin.edit_admin',['admin' => $update]);
    }
    public function submit_edit_admin(Request $request) {
        try {
            $this->validate($request, [
                'email' => 'required',
                'nama' => 'required',
            ]);
            $update = DB::table('users')->where('id', '=', $request->id)->update([
                "email" => $request->email,
                "username" => $request->nama,
            ]);
            return back()->with(['sukses_toast' => "berhasil update admin"]);
        }
        catch(ValidationException $e){
            $errors = $e->errors();

            // Check specific fields
            if (isset($errors['email'])) {
                return back()->with(["error_input_admin" => 'email harus di isi']);
            }
            if (isset($errors['nama'])) {
                return back()->with(["error_input_admin" => 'nama tidak boleh kosong']);
            }
        }
    }
    public function delete_admin($id){
        DB::table('users')->where('id','=', $id)->delete();
        return back()->with(['sukses_toast' => "berhasil menghapus admin"]);
    }


        // PENGINAPAN
    public function info_penginapan(){
        $penginapan = Penginapan::select('p.*')
        ->from('penginapan as p')
        ->get();

        $count = count($penginapan);
        $fasilitasArray = [];
        for ($i = 0; $i < $count; $i++) {
            $penginapans = $penginapan[$i];
            $fasilitas = Fasilitas::select('*')
            ->from('fasilitas')
            ->where('id_penginapan','=',$penginapans->id)
            ->get();
            $fasilitasArray[$penginapans->id] = $fasilitas;
        }

        // dd($fasilitas);
        return view('sistem_informasi.admin.penginapan.penginapan',['penginapan' => $penginapan,'fasilitas' => $fasilitasArray ]);
    }
    public function delete_penginapan($id){
        // dd($id);
        $delete_fasilitas_penginapan = DB::table('fasilitas')->where('id_penginapan','=',$id)->delete();
        $delete_penginapan = DB::table('penginapan')->where('id','=',$id)->delete();
        return back()->with(['sukses_toast' => "sukses menghapus tujuan"]);
    }
    public function add_penginapan(){
        return view('sistem_informasi.admin.penginapan.add_penginapan');
    }

    public function edit_penginapan($id){
        //  untuk mengisi di select nya
        $penginapan = Penginapan::select('*')->from('penginapan')->where('id','=',$id)->first();
        $fasilitas = Fasilitas::select('nama as nama_fasilitas','id as id_fasilitas')
        ->from("fasilitas")
        ->where('id_penginapan','=',$id)
        ->get();
        // dd($fasilitas);
        // dd($penginapan);

        return view('sistem_informasi.admin.penginapan.edit_penginapan',['penginapan' => $penginapan, 'fasilitas' => $fasilitas ]);
    }
    public function hapus_fasilitas($id_fasilitas){
        $delete_fasilitas_penginapan = DB::table('fasilitas')->where('id','=',$id_fasilitas)->delete();
        if($delete_fasilitas_penginapan){
            return back()->with(['sukses_toast' => "berhasil menghapus layanan"]);
        }else{
            return back()->with(['error_toast' => "gagal menghapus layanan"]);
        }
    }
    public function submit_edit_penginapan(Request $request){
        try {
            $this->validate($request, [
                'penginapan' => 'required',
                'telp' => 'required|integer',
                'harga' => 'required|integer',
                'jarak' => 'required|integer',
                'file_fasilitas' => 'mimes:xlsx',
            ]);
            // kalo inputan tujuan kosng, berarti masih make tujuan kunjungan sebelumnya
            if($request->alamat == null){
                $update_penginapan = DB::table('penginapan')
                ->where('id','=',$request->id)
                ->update([
                    'nama' => $request->penginapan,
                    'telp' => $request->telp,
                    'harga' => $request->harga,
                    'jarak' => $request->jarak,
                ]);
                // dd($request->alamat);
                if($request->file_fasilitas !== null){
                    $file = $request->file('file_fasilitas');
                    $nama_file = 'File_fasilitas'.'.'.$file->getClientOriginalExtension();
                    $file->move('file_layanan',$nama_file);
                    $nama_file_excel = 'file_layanan/'.$nama_file;
        
                    $spreadsheet = IOFactory::load($nama_file_excel);
                    // buat ngebaca sheet pertama
                    $sheet = $spreadsheet->getActiveSheet();
                    // ngubah seluruh data ke array
                    $data = $sheet->toArray();
                    for($i = 0; $i < count($data); $i++){
                        // ini misal ada 2 kolom input ( soalnya aku nerapin cuman masukin 1 kolom doang )
                        if (isset($data[$i][1])) {
                            // dd(5);
                            return back()->with(["error_input_dinas" => 'Input fasilitas terhenti karena pada baris ke '.$i+1 .' tidak sesuai format penulisan']);
                        }else{
                            if($data[$i][0] == null){
                                return back()->with(["error_input_dinas" => 'Input fasilitas terhenti karena pada baris ke '.$i+1 .' tidak sesuai format penulisan']);
                            }else{

                                $insert_fasilitas = DB::table('fasilitas')
                                ->insert([
                                    'nama' => $data[$i][0],
                                    'id_penginapan' => $request->id
                                ]);
                                // kondisi jika insert gagal
                                if(!$insert_fasilitas){
                                    return back()->with(['error_toast' => 'gagal Menambah data']);
                                }
                            }
                        }
                    }
                    File::delete('file_layanan/'.$nama_file);
                    return redirect('/penginapan')->with(['sukses_toast' => "Fasilitas berhasil di edit"]);
                }
            }else{
                $update_penginapan = DB::table('penginapan')
                ->where('id','=',$request->id)
                ->update([
                    'nama' => $request->penginapan,
                    'alamat' => $request->alamat,
                    'telp' => $request->telp,
                    'harga' => $request->harga,
                    'jarak' => $request->jarak,
                ]);
                if($request->file_fasilitas !== null){
                    $file = $request->file('file_fasilitas');
                    $nama_file = 'File_fasilitas'.'.'.$file->getClientOriginalExtension();
                    $file->move('file_layanan',$nama_file);
                    $nama_file_excel = 'file_layanan/'.$nama_file;
        
                    $spreadsheet = IOFactory::load($nama_file_excel);
                    // buat ngebaca sheet pertama
                    $sheet = $spreadsheet->getActiveSheet();
                    // ngubah seluruh data ke array
                    $data = $sheet->toArray();
                    for($i = 0; $i < count($data); $i++){
                        // ini misal ada 2 kolom input ( soalnya aku nerapin cuman masukin 1 kolom doang )
                        if (isset($data[$i][1])) {
                            // dd(5);
                            return back()->with(["error_input_dinas" => 'Input fasilitas terhenti karena pada baris ke '.$i+1 .' tidak sesuai format penulisan']);
                        }else{
                            if($data[$i][0] == null){
                                return back()->with(["error_input_dinas" => 'Input fasilitas terhenti karena pada baris ke '.$i+1 .' tidak sesuai format penulisan']);
                            }else{

                                $insert_fasilitas = DB::table('fasilitas')
                                ->insert([
                                    'nama' => $data[$i][0],
                                    'id_penginapan' => $request->id
                                ]);
                                // kondisi jika insert gagal
                                if(!$insert_fasilitas){
                                    return back()->with(['error_toast' => 'gagal Menambah data']);
                                }
                            }
                        }
                    }
                    File::delete('file_layanan/'.$nama_file);
                    return redirect('/penginapan')->with(['sukses_toast' => "Fasilitas berhasil di edit"]);
                }
            }
        }catch (ValidationException $e) {
            // Validation failed
            $errors = $e->errors();

            // Check specific fields
            if (isset($errors['nama'])) {
                return back()->with(["error_input_dinas" => 'nama penginapan harus di isi']);
            }

            if (isset($errors['file_fasilitas'])) {
                return back()->with(["error_input_dinas" => 'File harus dalam bentuk .xlsx / fasilitas harus di isi']);
            }

            if (isset($errors['alamat'])) {
                return back()->with(["error_input_dinas" => 'alamat tidak boleh kosong']);
            }
            if (isset($errors['telp'])) {
                return back()->with(["error_input_dinas" => 'No telepon harus dalam bentuk angka']);
            }
            if (isset($errors['harga'])) {
                return back()->with(["error_input_dinas" => 'harga harus dalam bentuk angka']);
            }
            if (isset($errors['jarak'])) {
                return back()->with(["error_input_dinas" => 'jarak harus dalam bentuk angka']);
            }
        }
    }
    public function submit_add_penginapan(Request $request){
        try {
            $this->validate($request, [
                'penginapan' => 'required',
                'alamat' => 'required',
                'telp' => 'required|integer',
                'harga' => 'required|integer',
                'jarak' => 'required|integer',
                'file_fasilitas' => 'required|mimes:xlsx',
            ]);
            $cek = DB::table('penginapan')
            ->select('id')
            ->orderByRaw("LENGTH(id), CAST(id AS SIGNED), id")
            ->get();
    
            $cekPanjang = count($cek);

            if($cekPanjang == 0){
                $year = Date('Y');
                $id = 'PH' . $year . 1;
            }else{
                $lastNumber = (int)substr($cek[$cekPanjang - 1]->id, 6);
                $year = Date('Y');
                $id = 'PH' . $year . $lastNumber+1;
            }
            // dd($id);
            $cek_data = Penginapan::select('*')
            ->from('penginapan')
            ->where('nama','=',$request->penginapan)
            ->first();
            
            if($cek_data){
                return back()->with(["error_input_dinas" => 'Dinas sudah tersedia']);
            }else{
                $insert_data = DB::table('penginapan')
                ->insert([
                    "id" => $id,
                    "nama" => $request->penginapan,
                    "alamat" => $request->alamat,
                    "telp" => $request->telp,
                    "harga" => $request->harga,
                    "jarak" => $request->jarak,
                ]);
                if($insert_data){
                    // membaca isi data file excel nya
                    $file = $request->file('file_fasilitas');
                    $nama_file = 'File_fasilitas'.'.'.$file->getClientOriginalExtension();
                    $file->move('file_layanan',$nama_file);
                    $nama_file_excel = 'file_layanan/'.$nama_file;
        
                    $spreadsheet = IOFactory::load($nama_file_excel);
                    // buat ngebaca sheet pertama
                    $sheet = $spreadsheet->getActiveSheet();
                    // ngubah seluruh data ke array
                    $data = $sheet->toArray();
                    for($i = 0; $i < count($data); $i++){
                        // ini misal ada 2 kolom input ( soalnya aku nerapin cuman masukin 1 kolom doang )
                        if (isset($data[$i][1])) {
                            // dd(5);
                            return back()->with(["error_input_dinas" => 'Input fasilitas terhenti karena pada baris ke '.$i+1 .' tidak sesuai format penulisan']);
                        }else{
                            if($data[$i][0] == null){
                                return back()->with(["error_input_dinas" => 'Input fasilitas terhenti karena pada baris ke '.$i+1 .' tidak sesuai format penulisan']);
                            }else{
                                //  mengecek id penginapan yang sudah ditambah sebelumnya diatas untuk menambah data fasilitas pada penginapan tersebut
                                $cek_id = Penginapan::select('id')
                                ->from('penginapan')
                                ->where('nama','=',$request->penginapan)
                                ->first();

                                // kondisi jika id ditemukan
                                if($cek_id){
                                    $insert_fasilitas = DB::table('fasilitas')
                                    ->insert([
                                        'nama' => $data[$i][0],
                                        'id_penginapan' => $cek_id->id
                                    ]);
                                    // kondisi jika insert gagal
                                    if(!$insert_fasilitas){
                                        return back()->with(['error_toast' => 'gagal Menambah data']);
                                    }
                                }
                            }
                        }
                    }
                    File::delete('file_layanan/'.$nama_file);
                    return back()->with(['sukses_toast' => 'berhasil Menambah data']);
                }
            }
        }
        catch(ValidationException $e){
            $errors = $e->errors();

            // Check specific fields
            if (isset($errors['nama'])) {
                return back()->with(["error_input_dinas" => 'nama penginapan harus di isi']);
            }

            if (isset($errors['file_fasilitas'])) {
                return back()->with(["error_input_dinas" => 'File harus dalam bentuk .xlsx / fasilitas harus di isi']);
            }

            if (isset($errors['alamat'])) {
                return back()->with(["error_input_dinas" => 'alamat tidak boleh kosong']);
            }
            if (isset($errors['telp'])) {
                return back()->with(["error_input_dinas" => 'No telepon harus dalam bentuk angka']);
            }
            if (isset($errors['harga'])) {
                return back()->with(["error_input_dinas" => 'harga harus dalam bentuk angka']);
            }
            if (isset($errors['jarak'])) {
                return back()->with(["error_input_dinas" => 'jarak harus dalam bentuk angka']);
            }
        }
    }
    public function info_wisata(){
        $wisata = Wisata::select('*')
        ->from('wisata')
        ->get();
        return view('sistem_informasi.admin.wisata.wisata',['wisata' => $wisata]);
    }
    public function add_wisata(Request $request){
        // cek apakah nama wisata sudah ada atau belom
        $cek = DB::table('wisata')
        ->select('id')
        ->orderByRaw("LENGTH(id), CAST(id AS SIGNED), id")
        ->get();

        $cekPanjang = count($cek);

        if($cekPanjang == 0){
            $year = Date('Y');
            $id = 'WST' . $year . 1;
        }else{
            $lastNumber = (int)substr($cek[$cekPanjang - 1]->id, 6);
            $year = Date('Y');
            $id = 'WST' . $year . $lastNumber+1;
        }

        $cek = Wisata::select('*')
        ->from('wisata')
        ->where('nama','=',$request->nama)
        ->first();
        if($cek){
            return back()->with(['error_toast' => 'wisata sudah tersedia']);
        }else{
            $insertWisata = DB::table('wisata')
            ->insert([
                'id' => $id,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'alamat' => $request->alamat,
                'harga_tiket' => $request->harga,
                'jarak' => $request->jarak
            ]);
            if($insertWisata){
                return back()->with(['sukses_toast' => 'wisata berhasil ditambah']);
            }else{
                return back()->with(['error_toast' => 'wisata gagal ditambah']);
            }
        }
    }
    public function delete_wisata($id){
        $delete = DB::table('wisata')->where('id','=',$id)->delete();
        return back()->with(['sukses_toast' => 'wisata berhasil dihapus']);
    }
    public function edit_wisata($id){
        $wisata = Wisata::select('*')
        ->from('wisata')
        ->where('id','=',$id)
        ->first();
        return view('sistem_informasi.admin.wisata.edit_wisata',['wisata' => $wisata]);
    }
    public function submit_edit_wisata(Request $request){
        try{
            $this->validate($request, [
                'nama' => 'required',
                'harga' => 'required|integer',
                'jarak' => 'required|integer',
            ]);
            $updateWisata = DB::table('wisata')
            ->where('id','=',$request->id)
            ->update([
                'nama' => $request->nama,
                'harga_tiket' => $request->harga,
                'jarak' => $request->jarak,
            ]);
            if($request->deskripsi !== null){
                $updateDeskripsi = DB::table('wisata')
                ->where('id','=',$request->id)
                ->update([
                    'deskripsi' => $request->deskripsi,
                ]);
            }
            if($request->alamat !== null){
                $updateAlamat = DB::table('wisata')
                ->where('id','=',$request->id)
                ->update([
                    'alamat' => $request->alamat,
                ]);
            }
            if($updateWisata){
                return back()->with(['sukses_toast' => 'sukses mengupdate wisata']);
            }else{
                return back()->with(['error_toast' => 'gagal mengupdate wisata']);
            }
        }catch (ValidationException $e) {
            // Validation failed
            $errors = $e->errors();

            // Check specific fields
            if (isset($errors['nama'])) {
                return back()->with(["error_input_dinas" => 'nama dinas harus di isi']);
            }
            if (isset($errors['harga'])) {
                return back()->with(["error_input_dinas" => 'harga harus dalam bentuk angka']);
            }
            if (isset($errors['jarak'])) {
                return back()->with(["error_input_dinas" => 'jarak harus dalam bentuk angka']);
            }
        }
    }
    public function info_kuliner(){
        $kuliner = Kuliner::select('*')
        ->from('kuliner')
        ->get();

        $count = count($kuliner);
        $menuArray = [];
        for ($i = 0; $i < $count; $i++) {
            $kuliners = $kuliner[$i];
            $menu = Menu::select('*')
            ->from('menu')
            ->where('id_kuliner','=',$kuliners->id)
            ->get();
            $menuArray[$kuliners->id] = $menu;
        }
        // dd($layananArray);
        return view('sistem_informasi.admin.kuliner.kuliner',['kuliner' => $kuliner,'menu' => $menuArray]);
    }
    public function delete_kuliner($id){

        $delete_kuliner = DB::table('kuliner')->select("*")->where('id' ,"=", $id);

        if($delete_kuliner){
            $get_layanan = DB::table('menu')->select("*")->where('id_kuliner' ,"=", $id)->get();
            // melakukan penghapusan semua menu sesuai id kuliner yang mau dihapus
            DB::table('menu')->where('id_kuliner','=', $id)->delete();
            $delete_kuliner->delete();
            return back()->with(['sukses_toast' => "sukses menghapus data"]);
        }else{
            return back()->with(['error_toast' => "gagal menghapus data"]);
        }
    }
    public function edit_kuliner($id){
        $kuliner = Kuliner::select('*')
        ->from('kuliner')
        ->where('id','=',$id)
        ->first();
         $menu = Menu::select('*')
         ->from('menu')
         ->where('id_kuliner','=',$id)
         ->get();

        return view('sistem_informasi.admin.kuliner.edit_kuliner',['kuliner' => $kuliner,'menu' => $menu]);
    }
    public function submit_edit_kuliner(Request $request){
        try {
            $this->validate($request, [
                'nama' => 'required',
                'alamat' => 'required',
                'jarak' => 'required|integer',
                'file_layanan' => 'nullable|mimes:xlsx',
            ]);
            // pertama update data gedung nya dulu
            // misal deskripsi nya  diubah
            DB::table('kuliner')
            ->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'jarak' => $request->jarak
            ]);

            if($request->file_layanan !== null){
                $file = $request->file('file_layanan');
                $nama_file = 'File_layanan'.'.'.$file->getClientOriginalExtension();
                $file->move('file_layanan',$nama_file);
                $nama_file_excel = 'file_layanan/'.$nama_file;
    
                $spreadsheet = IOFactory::load($nama_file_excel);
                // buat ngebaca sheet pertama
                $sheet = $spreadsheet->getActiveSheet();
                // ngubah seluruh data ke array
                $data = $sheet->toArray();
    
                // looping buat ngebaca isi file nya
                for($i = 0; $i < count($data); $i++){
                    // ini misal ada 2 kolom input ( soalnya aku nerapin cuman masukin 1 kolom doang )
                    if (isset($data[$i][2])) {
                        return back()->with(["error_input_dinas" => 'Input Layanan terhenti karena pada baris ke '.$i+1 .' tidak sesuai format penulisan']);
                    }else{
                        if($data[$i][0] == null || !isset($data[$i][1]) || !is_numeric($data[$i][1])){
                            return back()->with(["error_input_dinas" => 'Input Layanan terhenti karena pada baris ke '.$i+1 .' tidak sesuai format penulisan']);
                        }else{
                            // $trim_data = trim($data[$i][0]);
                            $trim_data = $data[$i][0];
                            $cek_menu = Menu::select('nama')
                            ->from('menu')
                            ->where('nama','=',$trim_data)
                            ->get();
                            //  KUERI DIATAS UNTUK MENGECEK APAKAH NAMA menu SUDAH ADA DIDATA BASE ATAU BELOM
                            if(count($cek_menu) > 0){
                                // KONDISI KETIKA SUDAH ADA DI DATABASE
                                return back()->with(["error_input_dinas" => 'Input menu terhenti karena menu pada baris ke '.$i+1 .' sudah tersedia']);
                            }else{
                                // KONDISI JIKA BELUM TERSEDIA, MAKA AKAN DILAKUKAN INSERT
                                DB::table('menu')
                                ->insert([
                                    'nama' => $trim_data,
                                    'harga' => $data[$i][1],
                                    'id_kuliner' => $request->id // ini id gedung nya sesuai apa yang di edit
                                ]);
                            }
                        }
                    }
                }
                File::delete('file_layanan/'.$nama_file);
            }
            return back()->with(['sukses_toast' => 'berhasil mengedit data']);
        } catch (ValidationException $e) {
            // Validation failed
            $errors = $e->errors();

            // Check specific fields
            if (isset($errors['nama'])) {
                return back()->with(["error_input_dinas" => 'nama Warung harus di isi']);
            }
            if (isset($errors['alamat'])) {
                return back()->with(["error_input_dinas" => 'Alamat harus di isi']);
            }
            if (isset($errors['jarak'])) {
                return back()->with(["error_input_dinas" => 'jarak harus dalam bentuk integer']);
            }

            if (isset($errors['file_layanan'])) {
                return back()->with(["error_input_dinas" => 'File harus dalam bentuk .xlsx / excel']);
            }
        }
    }

    public function hapus_menu($id_menu){
        $hapus_menu = DB::table('menu')->where('id','=',$id_menu)->delete();
        if($hapus_menu){
            return back()->with(['sukses_toast' => "berhasil menghapus menu"]);
        }else{
            return back()->with(['error_toast' => "gagal menghapus menu"]);
        }
    }
    public function add_kuliner(){
        return view('sistem_informasi.admin.kuliner.add_kuliner');
    }
    public function submit_add_kuliner(Request $request){
        try {
            $this->validate($request, [
                'nama' => 'required',
                'alamat' => 'required',
                'jarak' => 'required|integer',
                'file_layanan' => 'required|mimes:xlsx',
            ]);
            $cek = DB::table('kuliner')
            ->select('id')
            ->orderByRaw("LENGTH(id), CAST(id AS SIGNED), id")
            ->get();

            $cekPanjang = count($cek);

            if($cekPanjang == 0){
                $year = Date('Y');
                $id = 'KLN' . $year . 1;
            }else{
                $lastNumber = (int)substr($cek[$cekPanjang - 1]->id, 6);
                $year = Date('Y');
                $id = 'KLN' . $year . $lastNumber+1;
            }

            $cek_data = Kuliner::select('*')
            ->from('kuliner')
            ->where('nama','=',$request->nama)
            ->first();
            
            if($cek_data){
                return back()->with(["error_input_dinas" => 'Kuliner sudah tersedia']);
            }else{
                $insert_data = DB::table('kuliner')
                ->insert([
                    "id" => $id,
                    "nama" => $request->nama,
                    "alamat" => $request->alamat,
                    "jarak" => $request->jarak,
                ]);
                if($insert_data){
                    // membaca isi data file excel nya
                    $file = $request->file('file_layanan');
                    $nama_file = 'File_layanan'.'.'.$file->getClientOriginalExtension();
                    $file->move('file_layanan',$nama_file);
                    $nama_file_excel = 'file_layanan/'.$nama_file;
        
                    $spreadsheet = IOFactory::load($nama_file_excel);
                    // buat ngebaca sheet pertama
                    $sheet = $spreadsheet->getActiveSheet();
                    // ngubah seluruh data ke array
                    $data = $sheet->toArray();
        
                    // looping buat ngebaca isi file nya
                    for($i = 0; $i < count($data); $i++){
                        // ini misal ada 2 kolom input ( soalnya aku nerapin cuman masukin 1 kolom doang )
                        if (isset($data[$i][2])) {
                            return back()->with(["error_input_dinas" => 'Input Layanan terhenti karena pada baris ke '.$i+1 .' tidak sesuai format penulisan']);
                        }else{
                            if($data[$i][0] == null || !isset($data[$i][1]) || !is_numeric($data[$i][1])){
                                return back()->with(["error_input_dinas" => 'Input Layanan terhenti karena pada baris ke '.$i+1 .' tidak sesuai format penulisan']);
                            }else{
                                // $trim_data = trim($data[$i][0]);
                                $trim_data = $data[$i][0];
                                $cek_menu = Menu::select('nama')
                                ->from('menu')
                                ->where('nama','=',$trim_data)
                                ->where('id_kuliner','=',$id)
                                ->get();
                                //  KUERI DIATAS UNTUK MENGECEK APAKAH NAMA menu SUDAH ADA DIDATA BASE ATAU BELOM
                                if(count($cek_menu) > 0){
                                    // KONDISI KETIKA SUDAH ADA DI DATABASE
                                    return back()->with(["error_input_dinas" => 'Input menu terhenti karena menu pada baris ke '.$i+1 .' sudah tersedia']);
                                }else{
                                    // KONDISI JIKA BELUM TERSEDIA, MAKA AKAN DILAKUKAN INSERT
                                    DB::table('menu')
                                    ->insert([
                                        'nama' => $trim_data,
                                        'harga' => $data[$i][1],
                                        'id_kuliner' => $id // ini id gedung nya sesuai apa yang di edit
                                    ]);
                                }
                            }
                        }
                    }
                    File::delete('file_layanan/'.$nama_file);
                    return back()->with(['sukses_toast' => 'berhasil Menambah data']);
                }
            }
        }
        catch(ValidationException $e){
            $errors = $e->errors();

            // Check specific fields
            if (isset($errors['nama'])) {
                return back()->with(["error_input_dinas" => 'nama Warung harus di isi']);
            }
            if (isset($errors['alamat'])) {
                return back()->with(["error_input_dinas" => 'Alamat harus di isi']);
            }
            if (isset($errors['jarak'])) {
                return back()->with(["error_input_dinas" => 'jarak harus dalam bentuk integer']);
            }

            if (isset($errors['file_layanan'])) {
                return back()->with(["error_input_dinas" => 'File harus dalam bentuk .xlsx / excel']);
            }
        }
    }
    public function edit_menu(Request $request){
        $cek_menu = Menu::select('*')
        ->from('menu')
        ->where('nama','=',$request->nama)
        ->where('id_kuliner','=',$request->warung)
        ->get();
        // dd(count($cek_menu));
        if(count($cek_menu) == 0){
            $edit_menu = DB::table('menu')
            ->where('id','=',$request->id)
            ->update([
                'nama' => $request->nama,
                'harga' => $request->harga
            ]);
            if($edit_menu){
                return back()->with(['sukses_toast' => "berhasil edit menu"]);
            }
        }else{
            return back()->with(['error_toast' => "menu sudah ada"]);
        }
    }
}
