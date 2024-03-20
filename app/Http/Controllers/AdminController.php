<?php

namespace App\Http\Controllers;

use App\Models\Gambar_detail_layanan;
use App\Models\List_fasilitas;
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
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AdminController extends Controller
{
    //
    public function viewpage(){

        $jml_admin = Users::select("id")
        ->from('users')
        ->count();
        $jml_instansi = Gedung::select("id")
        ->from('gedung')
        ->count();
        $jml_wisata = Wisata::select("id")
        ->from('wisata')
        ->count();
        $jml_penginapan = Penginapan::select("id")
        ->from('penginapan')
        ->count();
        $jml_kuliner = Kuliner::select("id")
        ->from('kuliner')
        ->count();

        $nama = session('nama');
        $getuser = Users::select("*")
        ->from("users")
        ->where("username",'=',$nama)
        ->first();

        // $pw = Crypt::decryptString($getuser->password);
        // dd($pw);
        return view('sistem_informasi.admin.dashboard',["jml_instansi" => $jml_instansi,"jml_penginapan" => $jml_penginapan,"jml_wisata" => $jml_wisata,"jml_kuliner" => $jml_kuliner,"jml_admin" => $jml_admin, 'email' => $getuser->email,'name' => $getuser->username, "nama_admin" => $getuser->nama_admin ]);
    }
    public function info_gedung(){
        $gedung = Gedung::select('*')
        ->from('gedung')
        ->get();

        // dd($gedung)''
        $count = count($gedung);
        $layananArray = [];
        for ($i = 0; $i < $count; $i++) {
            $gedungs = $gedung[$i];
            $layanan = Layanan::select('l.*','g.id_layanan','g.gambar_detail','g.judul_gambar')
            ->from('layanan as l')
            ->leftJoin("gambar_detail_layanan as g",'g.id_layanan','=',"l.id")
            ->where('l.id_gedung','=',$gedungs->id)
            ->get();
            $layananArray[$gedungs->id] = $layanan;
        }
        // dd($layananArray);
        return view('sistem_informasi.admin.dinas.dinas',['gedung' => $gedung,'layanan' => $layananArray]);
    }
    public function delete_gedung($id){

        $delete_gedung = DB::table('gedung')->select("*")->where('id' ,"=", $id);
        if($delete_gedung){
            $getGambar = Gedung::select('*')
            ->from("gedung")
            ->where('id','=',$id)
            ->first();
            if($getGambar){
                File::delete($getGambar->gambar);
            }
            $get_layanan = DB::table('layanan')->select("*")->where('id_gedung' ,"=", $id)->get();




            // delete gambar detail layanan dulu baru delete data yang ada di database
            foreach ($get_layanan as $detail_gambar) {
                $getPath_gambar = Gambar_detail_layanan::select("*")->from("gambar_detail_layanan")->where('id_layanan','=',$detail_gambar->id)->get();
                foreach ($getPath_gambar as $gambar) {
                    File::delete($gambar->gambar_detail);
                }
                DB::table('gambar_detail_layanan')->where('id_layanan','=', $detail_gambar->id)->delete();
            }
            DB::table('layanan')->where('id_gedung','=', $id)->delete();
                        // melakukan penghapusan semua layanan sesuai id gedung yang mau dihapus

            $delete_gedung->delete();
            return back()->with(['sukses_delete' => "sukses menghapus data"]);
        }else{
            return back()->with(['error_delete' => "gagal menghapus data"]);
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
                'file_gambar' => 'nullable|image',
                'jenis' => 'nullable',
                'jumlah_layanan' => 'required',
                'file_layanan' => 'nullable|mimes:xlsx',
            ]);
            $get_gedung = DB::table('gedung')->pluck('nama')->toArray();
            $get_nama = Gedung::select("nama")->from("gedung")->where("id",'=',$request->id)->first();

            // misal nama dinas nya diubah
            if($get_nama->nama !== $request->dinas){
                if(in_array($request->dinas, $get_gedung)){
                    return back()->with(["error_input_dinas" => "dinas sudah tersedia"]);
                }
            }

            if($request->jenis !== null){
                DB::table('gedung')->where('id','=',$request->id)
                ->update([
                    'jenis' => $request->jenis,
                ]);
            }
            // pertama update data gedung nya dulu
            // misal deskripsi nya  diubah
            if($request->deskripsi !== null){
                DB::table('gedung')->where('id','=',$request->id)
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
            // jika gambar nya tidak kosong alias gambar nya di isi
            if($request->file_gambar !== null){
                // ini ambil gambar yang sudah ada sebelumnya
                $getGambar = Gedung::select('gambar')
                ->from("gedung")
                ->where('id','=',$request->id)
                ->first();
                if($getGambar){
                    File::delete($getGambar->gambar);
                }
                
                $file_gambar = $request->file('file_gambar');
                $nama_file_gambar = 'gambar_instansi_'.$request->dinas;
                $file_gambar->move('file_gambar/instansi',$nama_file_gambar);
                $nama_file_gambar_instansi = 'file_gambar/instansi/'.$nama_file_gambar;
                DB::table('gedung')->where('id','=',$request->id)
                ->update([
                    'gambar' => $nama_file_gambar_instansi,
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
                                return redirect('/dinas')->with(["error_input_dinas" => 'Input Layanan terhenti karena Layanan pada baris ke '.$i+1 .' sudah tersedia']);
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
            }else{
                for($i=1; $i<$request->jumlah_layanan + 1; $i++){
                    $this->validate($request,[
                        'layananke'.$i => 'nullable',
                        'deskripsilayananke'.$i => 'nullable',
                        'judulGambarlayananke'.$i => 'nullable',
                    ]);
                    
                    if($request->{'layananke'.$i} !== null){
                        if($request->{'deskripsilayananke'.$i} !== null){
                            $cek_id = Gedung::select('id')
                            ->from('gedung')
                            ->where('nama','=',$request->dinas)
                            ->first();
    
                            // kondisi jika id ditemukan
                            if($cek_id){
                                // valdiasi bahwa layanan belom tersedia
                                $cek_layanan = Layanan::select("nama")
                                ->from("layanan")
                                ->where("id_gedung",'=',$cek_id->id)
                                ->where("nama",'=',$request->{'layananke'.$i})
                                ->first();

                                if(!$cek_layanan){
                                    $insert_layanan = DB::table('layanan')
                                    ->insert([
                                        'nama' => $request->{'layananke'.$i},
                                        'deskripsi' => $request->{'deskripsilayananke'.$i},
                                        'id_gedung' => $cek_id->id
                                    ]);
                                    // kondisi jika insert gagal
                                    if(!$insert_layanan){
                                        return redirect('/dinas')->with(['error_add' => 'gagal Menambah data']);
                                    }
                                }else{
                                    return back()->with(["error_input_dinas" => 'Input Layanan terhenti karena layanan '.$request->{'layananke'.$i}.' sudah tersedia']);
                                }
                            }
                        }else{
                            $cek_id = Gedung::select('id')
                            ->from('gedung')
                            ->where('nama','=',$request->dinas)
                            ->first();
    
                            // kondisi jika id ditemukan
                            if($cek_id){
                                // valdiasi bahwa layanan belom tersedia
                                $cek_layanan = Layanan::select("nama")
                                ->from("layanan")
                                ->where("id_gedung",'=',$cek_id->id)
                                ->where("nama",'=',$request->{'layananke'.$i})
                                ->first();

                                if(!$cek_layanan){
                                    $insert_layanan = DB::table('layanan')
                                    ->insert([
                                        'nama' => $request->{'layananke'.$i},
                                        'id_gedung' => $cek_id->id
                                    ]);
                                    // kondisi jika insert gagal
                                    if(!$insert_layanan){
                                        return redirect('/dinas')->with(['error_add' => 'gagal Menambah data']);
                                    }
                                }else{
                                    return back()->with(["error_input_dinas" => 'Input Layanan terhenti karena layanan '.$request->{'layananke'.$i}.' sudah tersedia']);
                                }
                            }
                        }
                        if($request->{'file_gambar_layanan'.$i} !== null){
                            $file_gambar = $request->file('file_gambar_layanan'.$i);
                            $nama_file_gambar = 'gambar_layanan_'.$request->dinas."_".$request->{'layananke'.$i}.$file_gambar->getClientOriginalName();
                            $file_gambar->move('file_gambar/instansi/layanan',$nama_file_gambar);
                            $nama_file_gambar_layanan = 'file_gambar/instansi/layanan/'.$nama_file_gambar;
                            // dd($request->file('file_gambar_layanan2'));
                            // cek id layanan yang sudah ditambah
                            $cek_id_layanan = Layanan::select("*")
                            ->from("layanan")
                            ->where("nama",'=',$request->{'layananke'.$i})
                            ->where("id_gedung",'=',$cek_id->id)
                            ->first();
                            // jika layanan ketemu
                            if($cek_id_layanan){
                                if($request->{'judulGambarlayananke'.$i} !== null){
                                    $insert_layanan = DB::table('gambar_detail_layanan')
                                    ->insert([
                                        'gambar_detail' => $nama_file_gambar_layanan,
                                        'judul_gambar' => $request->{'judulGambarlayananke'.$i},
                                        'id_layanan' => $cek_id_layanan->id
                                    ]);
                                }else{
                                    $insert_layanan = DB::table('gambar_detail_layanan')
                                    ->insert([
                                        'gambar_detail' => $nama_file_gambar_layanan,
                                        'id_layanan' => $cek_id_layanan->id
                                    ]);
                                }
                            }else{
                                return back()->with(["error_input_dinas" => 'input gambar layanan ke '.$i." gagal"]);
                            }
                        }else{
                            $cek_id_layanan = Layanan::select("*")
                            ->from("layanan")
                            ->where("nama",'=',$request->{'layananke'.$i})
                            ->where("id_gedung",'=',$cek_id->id)
                            ->first();
                            
                            if($request->{'judulGambarlayananke'.$i} !== null){
                                $insert_layanan = DB::table('gambar_detail_layanan')
                                ->insert([
                                    'judul_gambar' => $request->{'judulGambarlayananke'.$i},
                                    'id_layanan' => $cek_id_layanan->id
                                ]);
                            }
                        }
                    }else{
                        if($request->{'deskripsilayananke'.$i} !== null || $request->{'file_gambar_layanan'.$i} !== null || $request->{'judulGambarlayananke'.$i} !== null){
                            return back()->with(["error_input_dinas" => 'input layanan ke '.$i." gagal"]);
                        }
                    }
                }
            }
            return redirect('/dinas')->with(['sukses_edit' => 'berhasil mengedit data']);
        } catch (ValidationException $e) {
            // Validation failed
            $errors = $e->errors();

            // Check specific fields
            if (isset($errors['dinas'])) {
                return back()->with(["error_input_dinas" => 'nama instansi harus di isi']);
            }
            if (isset($errors['jenis'])) {
                return back()->with(["error_input_dinas" => 'jenis Gedung Error']);
            }

            if (isset($errors['file_layanan'])) {
                return back()->with(["error_input_dinas" => 'File harus dalam bentuk .xlsx / excel']);
            }
        }
    }

    public function hapus_layanan($id_layanan){
        
        $getPath_gambar = Gambar_detail_layanan::select("*")->from("gambar_detail_layanan")->where('id_layanan','=',$id_layanan)->get();
        $hapus_gambar_layanan = DB::table('gambar_detail_layanan')->where('id_layanan','=',$id_layanan)->delete();
        
        if($hapus_gambar_layanan ){
            if (!$getPath_gambar->isEmpty()) {
                foreach ($getPath_gambar as $gambar) {
                    File::delete($gambar->gambar_detail);
                }
            }
            $hapus_layanan = DB::table('layanan')->where('id','=',$id_layanan)->delete();
            return back()->with(['sukses_delete_layanan' => "berhasil menghapus layanan"]);
        }else{
            $hapus_layanan = DB::table('layanan')->where('id','=',$id_layanan)->delete();
            return back()->with(['error_delete_layanan' => "gagal menghapus layanan"]);
        }
    }
    public function hapus_gambar_idInstansi($idInstansi){
        $getGambar = Gedung::select('gambar')
        ->from("gedung")
        ->where('id','=',$idInstansi)
        ->first();
        if($getGambar){
            File::delete($getGambar->gambar);
        }

        $hapus_gambar = DB::table('gedung')->where('id','=',$idInstansi)
        ->update([
            'gambar' => null
        ]);
        if($hapus_gambar){
            return back()->with(['sukses_delete_layanan' => "berhasil menghapus Gambar"]);
        }else{
            return back()->with(['error_delete_layanan' => "gagal menghapus Gambar"]);
        }
    }
    public function delete_gambar_warung($idWarung){
        $getGambar = Kuliner::select('gambar')
        ->from("kuliner")
        ->where('id','=',$idWarung)
        ->first();
        if($getGambar){
            $gambarPath = $getGambar->gambar;
            File::delete($gambarPath);
        }

        $hapus_gambar = DB::table('kuliner')->where('id','=',$idWarung)
        ->update([
            'gambar' => null
        ]);
        if($hapus_gambar){
            return back()->with(['sukses_delete_layanan' => "berhasil menghapus Gambar"]);
        }else{
            return back()->with(['error_delete_layanan' => "gagal menghapus Gambar"]);
        }
    }
    public function delete_gambar_penginapan($idPenginapan){
        $getGambar = Penginapan::select('gambar')
        ->from("penginapan")
        ->where('id','=',$idPenginapan)
        ->first();
        if($getGambar){
            $gambarPath = $getGambar->gambar;
            File::delete($gambarPath);
        }

        $hapus_gambar = DB::table('penginapan')->where('id','=',$idPenginapan)
        ->update([
            'gambar' => null
        ]);
        if($hapus_gambar){
            return back()->with(['sukses_delete_layanan' => "berhasil menghapus Gambar"]);
        }else{
            return back()->with(['error_delete_layanan' => "gagal menghapus Gambar"]);
        }
    }
    public function delete_gambar_wisata($idWisata){
        $getGambar = Wisata::select('gambar')
        ->from("wisata")
        ->where('id','=',$idWisata)
        ->first();
        if($getGambar){
            $gambarPath = $getGambar->gambar;
            File::delete($gambarPath);
        }

        $hapus_gambar = DB::table('wisata')->where('id','=',$idWisata)
        ->update([
            'gambar' => null
        ]);
        if($hapus_gambar){
            return back()->with(['sukses_delete_layanan' => "berhasil menghapus Gambar"]);
        }else{
            return back()->with(['error_delete_layanan' => "gagal menghapus Gambar"]);
        }
    }
    public function edit_layanan(Request $request){
        // cek apakah layanan sudah tersedia atau belom
        // dd(5);
        $getNama = Layanan::select('*')
        ->from('layanan')
        ->where('nama','=',$request->nama_layanan)
        ->whereNot('id','=',$request->id_layanan)
        ->first();
        
        if($getNama){
            if($request->nama_layanan !== $getNama->nama){
                $cekNama = Layanan::select('*')
                ->from('layanan')
                ->where('nama','=',$request->nama_layanan)
                ->first();
                if($cekNama){
                    return back()->with(['error_add' => "layanan sudah tersedia"]);
                }
            }
        }
        
        if($request->deskripsiLayanan == null){
            // dd(6);
            $update = DB::table('layanan')
            ->where('id','=',$request->id_layanan)
            ->update([
                'nama' => $request->nama_layanan
            ]);
            if($request->detail_layanan_gambar !== null){
                $file_gambar = $request->file('detail_layanan_gambar');
                $nama_file_gambar = 'gambar_layanan_'.$request->nama_layanan.$file_gambar->getClientOriginalName();
                $file_gambar->move('file_gambar/instansi/layanan',$nama_file_gambar);
                $nama_file_gambar_layanan = 'file_gambar/instansi/layanan/'.$nama_file_gambar;
                // get path gambar sebelumnya
                
                $getpath = Gambar_detail_layanan::select("*")->from("gambar_detail_layanan")->where("id_layanan",'=',$request->id_layanan)->first();
                if($getpath !== null){
                    File::delete($getpath->gambar_detail);
                    $update = DB::table('gambar_detail_layanan')
                    ->where('id_layanan','=',$request->id_layanan)
                    ->update([
                        'gambar_detail' => $nama_file_gambar_layanan,
                        'judul_gambar' => $request->judul_gambar_detail
                    ]);
                    if($update){
                        return back()->with(['sukses_edit' => "berhasil edit layanan"]);
                    }else{
                        dd(1);
                        return back()->with(['error_edit' => "gagal edit layanan"]);
                    }
                }else{
                    $update = DB::table('gambar_detail_layanan')
                    ->insert([
                        'gambar_detail' => $nama_file_gambar_layanan,
                        'judul_gambar' => $request->judul_gambar_detail
                    ]);
                    if($update){
                        return back()->with(['sukses_edit' => "berhasil edit layanan"]);
                    }else{
                        dd(2);
                        return back()->with(['error_edit' => "gagal edit layanan"]);
                    }
                }

            }else{
                $update = DB::table('gambar_detail_layanan')
                    ->where('id_layanan','=',$request->id_layanan)
                    ->update([
                        'judul_gambar' => $request->judul_gambar_detail
                    ]);
                if($update){
                    return back()->with(['sukses_edit' => "berhasil edit layanan"]);
                }else{
                    dd($request->judul_gambar_detail);
                    return back()->with(['error_edit' => "gagal edit layanan"]);
                }
            }
        }else{
            $update = DB::table('layanan')
            ->where('id','=',$request->id_layanan)
            ->update([
                'nama' => $request->nama_layanan,
                'deskripsi' => $request->deskripsiLayanan,
            ]);
            if($request->detail_layanan_gambar !== null){
                $file_gambar = $request->file('detail_layanan_gambar');
                $nama_file_gambar = 'gambar_layanan_'.$request->nama_layanan.$file_gambar->getClientOriginalName();
                $file_gambar->move('file_gambar/instansi/layanan',$nama_file_gambar);
                $nama_file_gambar_layanan = 'file_gambar/instansi/layanan/'.$nama_file_gambar;
                dd($nama_file_gambar_layanan);
                // get path gambar sebelumnya
                $getpath = Gambar_detail_layanan::select("*")->from("gambar_detail_layanan")->where("id_layanan",'=',$request->id_layanan)->first();
                if($getpath !== null){
                    File::delete($getpath->gambar_detail);
                    $update = DB::table('gambar_detail_layanan')
                    ->where('id_layanan','=',$request->id_layanan)
                    ->update([
                        'gambar_detail' => $nama_file_gambar_layanan,
                        'judul_gambar' => $request->judul_gambar
                    ]);
                    if($update){
                        return back()->with(['sukses_edit' => "berhasil edit layanan"]);
                    }else{
                        dd(14);
                        return back()->with(['error_edit' => "gagal edit layanan"]);
                    }
                }else{
                    $update = DB::table('gambar_detail_layanan')
                    ->insert([
                        'gambar_detail' => $nama_file_gambar_layanan,
                        'id_layanan' => $request->id_layanan,
                    ]);
                    if($update){
                        return back()->with(['sukses_edit' => "berhasil edit layanan"]);
                    }else{
                        dd(5);
                        return back()->with(['error_edit' => "gagal edit layanan"]);
                    }
                }
            }else{
                $update = DB::table('gambar_detail_layanan')
                ->where('id_layanan','=',$request->id_layanan)
                ->update([
                    'judul_gambar' => $request->judul_gambar
                ]);
            }
            if($update){
                return back()->with(['sukses_edit' => "berhasil edit layanan"]);
            }else{
                dd(100);
                return back()->with(['error_edit' => "gagal edit layanan"]);
            }
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
                'jenis' => 'required',
                'jumlah_layanan' => 'required',
                'file_gambar' => 'required|image',
                'file_layanan' => 'nullable|mimes:xlsx',
            ]);
            
            // dd($request->jumlah_layanan);
            // dd($request->{'judulGambarlayananke1'});
            $cek_data = Gedung::select('*')
            ->from('gedung')
            ->where('nama','=',$request->dinas)
            ->first();
            $file_gambar_layanan1 = $request->file('file_gambar_layanan1');
            // dd($file_gambar_layanan1);
            if($cek_data){
                return back()->with(["error_input_dinas" => 'instansi sudah tersedia']);
            }else{
                if($request->maps !== null){
                    $file_gambar = $request->file('file_gambar');
                    $nama_file_gambar = 'gambar_instansi_'.$file_gambar->getClientOriginalName();
                    $file_gambar->move('file_gambar/instansi',$nama_file_gambar);
                    $nama_file_gambar_instansi = 'file_gambar/instansi/'.$nama_file_gambar;
                    

                    $insert_data = DB::table('gedung')
                    ->insert([
                        "nama" => $request->dinas,
                        "maps" => $request->maps,
                        "deskripsi" => $request->deskripsi,
                        "jenis" => $request->jenis,
                        "gambar" => $nama_file_gambar_instansi,
                    ]);
                    if($insert_data){
                        // membaca isi data file excel nya
                        if($request->file_layanan !== null){
                            //  file excel
                            $file = $request->file('file_layanan');
                            $nama_file = 'File_layanan'.'.'.$file->getClientOriginalExtension();
                            $file->move('file_layanan',$nama_file);
                            $nama_file_excel = 'file_layanan/'.$nama_file;

                            //  file gambar

                
                            $spreadsheet = IOFactory::load($nama_file_excel);
                            // buat ngebaca sheet pertama
                            $sheet = $spreadsheet->getActiveSheet();
                            // ngubah seluruh data ke array
                            $data = $sheet->toArray();
                            if($data[0][0] !== "Nama Layanan"){
                                return back()->with(["error_input_dinas" => 'Input Excel harus sesuai format yang tersedia']);
                            }
                            for($i = 1; $i < count($data); $i++){
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
                                                return redirect('/dinas')->with(['error_add' => 'gagal Menambah data']);
                                            }
                                        }
                                    }
                                }
                            }
                            File::delete('file_layanan/'.$nama_file);
                        }else{
                            for($i=1; $i<$request->jumlah_layanan + 1; $i++){
                                $this->validate($request,[
                                    'layananke'.$i => 'nullable',
                                    'judulGambarlayananke'.$i => 'nullable',
                                    'deskripsilayananke'.$i => 'nullable',
                                    'file_gambar_layanan'.$i => 'nullable',
                                ]);
                                
                                if($request->{'layananke'.$i} !== null){
                                    if($request->{'deskripsilayananke'.$i} !== null){
                                        $cek_id = Gedung::select('id')
                                        ->from('gedung')
                                        ->where('nama','=',$request->dinas)
                                        ->first();
                
                                        // kondisi jika id ditemukan
                                        if($cek_id){
                                            // valdiasi bahwa layanan belom tersedia
                                            $cek_layanan = Layanan::select("nama")
                                            ->from("layanan")
                                            ->where("id_gedung",'=',$cek_id->id)
                                            ->where("nama",'=',$request->{'layananke'.$i})
                                            ->first();
            
                                            if(!$cek_layanan){
                                                $insert_layanan = DB::table('layanan')
                                                ->insert([
                                                    'nama' => $request->{'layananke'.$i},
                                                    'deskripsi' => $request->{'deskripsilayananke'.$i},
                                                    'id_gedung' => $cek_id->id
                                                ]);
                                                // kondisi jika insert gagal
                                                if(!$insert_layanan){
                                                    return redirect('/dinas')->with(['error_add' => 'gagal Menambah data']);
                                                }
                                            }else{
                                                return back()->with(["error_input_dinas" => 'Input Layanan terhenti karena layanan '.$request->{'layananke'.$i}.' sudah tersedia']);
                                            }
                                        }
                                    }else{
                                        $cek_id = Gedung::select('id')
                                        ->from('gedung')
                                        ->where('nama','=',$request->dinas)
                                        ->first();
                
                                        // kondisi jika id ditemukan
                                        if($cek_id){
                                            // valdiasi bahwa layanan belom tersedia
                                            $cek_layanan = Layanan::select("nama")
                                            ->from("layanan")
                                            ->where("id_gedung",'=',$cek_id->id)
                                            ->where("nama",'=',$request->{'layananke'.$i})
                                            ->first();
            
                                            if(!$cek_layanan){
                                                $insert_layanan = DB::table('layanan')
                                                ->insert([
                                                    'nama' => $request->{'layananke'.$i},
                                                    'id_gedung' => $cek_id->id
                                                ]);
                                                // kondisi jika insert gagal
                                                if(!$insert_layanan){
                                                    return redirect('/dinas')->with(['error_add' => 'gagal Menambah data']);
                                                }
                                            }else{
                                                return back()->with(["error_input_dinas" => 'Input Layanan terhenti karena layanan '.$request->{'layananke'.$i}.' sudah tersedia']);
                                            }
                                        }
                                    }
                                    
                                    if($request->{'file_gambar_layanan'.$i} !== null){
                                        $file_gambar = $request->file('file_gambar_layanan'.$i);
                                        $nama_file_gambar = 'gambar_layanan_'.$request->dinas."_".$request->{'layananke'.$i}.$file_gambar->getClientOriginalName();
                                        $file_gambar->move('file_gambar/instansi/layanan',$nama_file_gambar);
                                        $nama_file_gambar_layanan = 'file_gambar/instansi/layanan/'.$nama_file_gambar;

                                        // cek id layanan yang sudah ditambah
                                        $cek_id_layanan = Layanan::select("*")
                                        ->from("layanan")
                                        ->where("nama",'=',$request->{'layananke'.$i})
                                        ->where("id_gedung",'=',$cek_id->id)
                                        ->first();
                                        // jika layanan ketemu
                                        if($cek_id_layanan){
                                            if($request->{'judulGambarlayananke'.$i} !== null){
                                                $insert_layanan = DB::table('gambar_detail_layanan')
                                                ->insert([
                                                    'gambar_detail' => $nama_file_gambar_layanan,
                                                    'judul_gambar' => $request->{'judulGambarlayananke'.$i},
                                                    'id_layanan' => $cek_id_layanan->id
                                                ]);
                                            }else{
                                                $insert_layanan = DB::table('gambar_detail_layanan')
                                                ->insert([
                                                    'gambar_detail' => $nama_file_gambar_layanan,
                                                    'id_layanan' => $cek_id_layanan->id
                                                ]);
                                            }
                                        }else{
                                            return back()->with(["error_input_dinas" => 'input gambar layanan ke '.$i." gagal"]);
                                        }
                                    }else{
                                        $cek_id_layanan = Layanan::select("*")
                                        ->from("layanan")
                                        ->where("nama",'=',$request->{'layananke'.$i})
                                        ->where("id_gedung",'=',$cek_id->id)
                                        ->first();

                                        if($request->{'judulGambarlayananke'.$i} !== null){
                                            $insert_layanan = DB::table('gambar_detail_layanan')
                                            ->insert([
                                                'judul_gambar' => $request->{'judulGambarlayananke'.$i},
                                                'id_layanan' => $cek_id_layanan->id
                                            ]);
                                        }
                                    }
                                }else{
                                    if($request->{'deskripsilayananke'.$i} !== null || $request->{'file_gambar_layanan'.$i} !== null || $request->{'judulGambarlayananke'.$i} !== null){
                                        return back()->with(["error_input_dinas" => 'input layanan ke '.$i." gagal"]);
                                    }
                                }
                            }
                        }
                        return redirect('/dinas')->with(['sukses_add' => 'berhasil Menambah data']);
                    }
                }else{
                    $file_gambar = $request->file('file_gambar');
                    $nama_file_gambar = 'gambar_instansi_'.$file_gambar->getClientOriginalName();
                    $file_gambar->move('file_gambar/instansi',$nama_file_gambar);
                    $nama_file_gambar_instansi = 'file_gambar/instansi/'.$nama_file_gambar;


                    $insert_data = DB::table('gedung')
                    ->insert([
                        "nama" => $request->dinas,
                        "deskripsi" => $request->deskripsi,
                        "jenis" => $request->jenis,
                        "gambar" => $nama_file_gambar_instansi,
                    ]);
                    if($insert_data){
                        // membaca isi data file excel nya
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
                            if($data[0][0] !== "Nama Layanan"){
                                return back()->with(["error_input_dinas" => 'Input Excel harus sesuai format yang tersedia']);
                            }

                            for($i = 1; $i < count($data); $i++){
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
                                                return redirect('/dinas')->with(['error_add' => 'gagal Menambah data']);
                                            }
                                        }else{
                                            $cek_id = Gedung::select('id')
                                            ->from('gedung')
                                            ->where('nama','=',$request->dinas)
                                            ->first();
                    
                                            // kondisi jika id ditemukan
                                            if($cek_id){
                                                $insert_layanan = DB::table('layanan')
                                                ->insert([
                                                    'nama' => $request->{'layananke'.$i},
                                                    'id_gedung' => $cek_id->id
                                                ]);
                                                // kondisi jika insert gagal
                                                if(!$insert_layanan){
                                                    return redirect('/dinas')->with(['error_add' => 'gagal Menambah data']);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            File::delete('file_layanan/'.$nama_file);
                        }else{
                            for($i=1; $i<=$request->jumlah_layanan; $i++){
                                $this->validate($request,[
                                    'layananke'.$i => 'nullable',
                                    'deskripsilayananke'.$i => 'nullable',
                                    'judulGambarlayananke'.$i => 'nullable',
                                ]);
                                if($request->{'layananke'.$i} !== null){
                                    if($request->{'deskripsilayananke'.$i} !== null){
                                        $cek_id = Gedung::select('id')
                                        ->from('gedung')
                                        ->where('nama','=',$request->dinas)
                                        ->first();
                
                                        // kondisi jika id ditemukan
                                        if($cek_id){
                                            // valdiasi bahwa layanan belom tersedia
                                            $cek_layanan = Layanan::select("nama")
                                            ->from("layanan")
                                            ->where("id_gedung",'=',$cek_id->id)
                                            ->where("nama",'=',$request->{'layananke'.$i})
                                            ->first();
            
                                            if(!$cek_layanan){
                                                $insert_layanan = DB::table('layanan')
                                                ->insert([
                                                    'nama' => $request->{'layananke'.$i},
                                                    'deskripsi' => $request->{'deskripsilayananke'.$i},
                                                    'id_gedung' => $cek_id->id
                                                ]);
                                                // kondisi jika insert gagal
                                                if(!$insert_layanan){
                                                    return redirect('/dinas')->with(['error_add' => 'gagal Menambah data']);
                                                }
                                            }else{
                                                return back()->with(["error_input_dinas" => 'Input Layanan terhenti karena layanan '.$request->{'layananke'.$i}.' sudah tersedia']);
                                            }
                                        }
                                    }else{
                                        $cek_id = Gedung::select('id')
                                        ->from('gedung')
                                        ->where('nama','=',$request->dinas)
                                        ->first();
                
                                        // kondisi jika id ditemukan
                                        if($cek_id){
                                            // valdiasi bahwa layanan belom tersedia
                                            $cek_layanan = Layanan::select("nama")
                                            ->from("layanan")
                                            ->where("id_gedung",'=',$cek_id->id)
                                            ->where("nama",'=',$request->{'layananke'.$i})
                                            ->first();
            
                                            if(!$cek_layanan){
                                                $insert_layanan = DB::table('layanan')
                                                ->insert([
                                                    'nama' => $request->{'layananke'.$i},
                                                    'id_gedung' => $cek_id->id
                                                ]);
                                                // kondisi jika insert gagal
                                                if(!$insert_layanan){
                                                    return redirect('/dinas')->with(['error_add' => 'gagal Menambah data']);
                                                }
                                            }else{
                                                return back()->with(["error_input_dinas" => 'Input Layanan terhenti karena layanan '.$request->{'layananke'.$i}.' sudah tersedia']);
                                            }
                                        }
                                    }
                                    
                                    if($request->{'file_gambar_layanan'.$i} !== null){
                                        $file_gambar = $request->file('file_gambar_layanan'.$i);
                                        $nama_file_gambar = 'gambar_layanan_'.$request->dinas."_".$request->{'layananke'.$i}.$file_gambar->getClientOriginalName();
                                        $file_gambar->move('file_gambar/instansi/layanan',$nama_file_gambar);
                                        $nama_file_gambar_layanan = 'file_gambar/instansi/layanan/'.$nama_file_gambar;

                                        // cek id layanan yang sudah ditambah
                                        $cek_id_layanan = Layanan::select("*")
                                        ->from("layanan")
                                        ->where("nama",'=',$request->{'layananke'.$i})
                                        ->where("id_gedung",'=',$cek_id->id)
                                        ->first();
                                        // jika layanan ketemu
                                        if($cek_id_layanan){
                                            if($request->{'judulGambarlayananke'.$i} !== null){
                                                $insert_layanan = DB::table('gambar_detail_layanan')
                                                ->insert([
                                                    'gambar_detail' => $nama_file_gambar_layanan,
                                                    'judul_gambar' => $request->{'judulGambarlayananke'.$i},
                                                    'id_layanan' => $cek_id_layanan->id
                                                ]);
                                            }else{
                                                $insert_layanan = DB::table('gambar_detail_layanan')
                                                ->insert([
                                                    'gambar_detail' => $nama_file_gambar_layanan,
                                                    'id_layanan' => $cek_id_layanan->id
                                                ]);
                                            }
                                        }else{
                                            return back()->with(["error_input_dinas" => 'input gambar layanan ke '.$i." gagal"]);
                                        }
                                    }else{
                                        $cek_id_layanan = Layanan::select("*")
                                        ->from("layanan")
                                        ->where("nama",'=',$request->{'layananke'.$i})
                                        ->where("id_gedung",'=',$cek_id->id)
                                        ->first();
                                        
                                        if($request->{'judulGambarlayananke'.$i} !== null){
                                            $insert_layanan = DB::table('gambar_detail_layanan')
                                            ->insert([
                                                'judul_gambar' => $request->{'judulGambarlayananke'.$i},
                                                'id_layanan' => $cek_id_layanan->id
                                            ]);
                                        }
                                    }
                                }else{
                                    if($request->{'deskripsilayananke'.$i} !== null || $request->{'file_gambar_layanan'.$i} !== null || $request->{'judulGambarlayananke'.$i} !== null){
                                        return back()->with(["error_input_dinas" => 'input layanan ke '.$i." gagal"]);
                                    }
                                }
                            }
                        }
                        return redirect('/dinas')->with(['sukses_add' => 'berhasil Menambah data']);
                    }
                }
            }
        }
        catch(ValidationException $e){
            $errors = $e->errors();

            // Check specific fields
            if (isset($errors['dinas'])) {
                return back()->with(["error_input_dinas" => 'nama insantsi harus di isi']);
            }
            if (isset($errors['jenis'])) {
                return back()->with(["error_input_dinas" => 'Jenis gedung harus di isi']);
            }

            if (isset($errors['file_layanan'])) {
                return back()->with(["error_input_dinas" => 'File harus dalam bentuk .xlsx / Layanan harus di isi']);
            }
            if (isset($errors['file_gambar'])) {
                return back()->with(["error_input_dinas" => 'File harus dalam bentuk gambar / gambar harus di isi']);
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

        // cek username udah tersedia atau belom
        $cek_username = Users::select("*")->from("users")->where("username",'=',$request->username)->first();

        // dd($cek_username);
        if($cek_username){
            return back()->with(["error_add" => "username sudah tersedia"]);
        }
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
            return back()->with(["error_add" => 'Email sudah tersedia']);
        }else{
            $add_admin = DB::table('users')->insert([
                "id" => $id,
                "email" => $request->email,
                "username" => $request->username,
                "nama_admin" => $request->nama_admin,
                "password" => $pw,
            ]);
        }
        return back()->with(["sukses_add" => 'Sukses menambahkan admin']);
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
                'nama_admin' => 'required',
            ]);
            $cek_username = Users::select("*")
            ->from("users")->where("username",'=',$request->username)->where("id",'!=',$request->id)->first();
    
            if($cek_username){
                return back()->with(["error_input_admin" => "username sudah tersedia"]);
            }

            $cek_email = Users::select("*")->from("users")->where("id",'=',$request->id)->first();
            if($request->email !== $cek_email->email){
                $get_email = Users::pluck("email")->toArray();
                if(in_array($request->email, $get_email)){
                    return back()->with(["error_input_admin" => 'email sudah tersedia']);
                }else{
                }
            }
            $update = DB::table('users')->where('id', '=', $request->id)->update([
                "email" => $request->email,
                "username" => $request->nama,
            ]);
            return redirect('/admin')->with(['sukses_edit' => "berhasil update admin"]);
        }
        catch(ValidationException $e){
            $errors = $e->errors();

            // Check specific fields
            if (isset($errors['email'])) {
                return redirect('/admin')->with(["error_input_admin" => 'email harus di isi']);
            }
            if (isset($errors['nama'])) {
                return redirect('/admin')->with(["error_input_admin" => 'username tidak boleh kosong']);
            }
            if (isset($errors['nama_admin'])) {
                return redirect('/admin')->with(["error_input_admin" => 'nama tidak boleh kosong']);
            }
        }
    }
    public function delete_admin($id){
        $jml_admin = Users::select("id")
        ->from('users')
        ->count();
        $cek_email = Session('email');
        if($jml_admin > 1){
            // cek email yang mau dihapus
            $cek_email_dariId = Users::select("email")->from("users")->where('id','=',$id)->first();
            // dd($cek_email_dariId);
            if($cek_email_dariId->email !== $cek_email){
                DB::table('users')->where('id','=', $id)->delete();
                return redirect('/admin')->with(['sukses_delete' => "berhasil menghapus admin"]);
            }else{
                return response()->json(['error_delete' => 'Tidak bisa menghapus akun']);
            }
        }else{
            return response()->json(['error_delete' => 'Tidak bisa menghapus akun']);
        }
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
            $fasilitas = Fasilitas::select('f.*','l.nama_fasilitas')
            ->from('fasilitas as f')
            ->join("list_fasilitas as l",'l.id','=','f.id_jenis_fasilitas')
            ->where('id_penginapan','=',$penginapans->id)
            ->get();
            $fasilitasArray[$penginapans->id] = $fasilitas;
        }

        // dd($fasilitas);
        return view('sistem_informasi.admin.penginapan.penginapan',['penginapan' => $penginapan,'fasilitas' => $fasilitasArray ]);
    }
    public function delete_penginapan($id){
        // dd($id);
        $getGambar = Penginapan::select('gambar')
        ->from("penginapan")
        ->where('id','=',$id)
        ->first();
        if($getGambar){
            $gambarPath = $getGambar->gambar;
            File::delete($gambarPath);
        }
        $delete_fasilitas_penginapan = DB::table('fasilitas')->where('id_penginapan','=',$id)->delete();
        $delete_penginapan = DB::table('penginapan')->where('id','=',$id)->delete();
        return back()->with(['sukses_delete' => "sukses menghapus penginapan"]);
    }
    public function add_penginapan(){
        $fasilitas = List_fasilitas::select("*")->from("list_fasilitas")->get();

        return view('sistem_informasi.admin.penginapan.add_penginapan',["fasilitas" => $fasilitas]);
    }

    public function edit_penginapan($id){
        //  untuk mengisi di select nya
        $penginapan = Penginapan::select('*')->from('penginapan')->where('id','=',$id)->first();
        
        // get fasilitas yang sudah dipilih apa aja
        $getFasilitasPenginapan = Fasilitas::select("*")->from("fasilitas")->where("id_penginapan", '=', $id)->get();
        $fasilitas = List_fasilitas::select("*")->from("list_fasilitas")->whereNotIn("id", $getFasilitasPenginapan->pluck('id_jenis_fasilitas'))->get();
        // dd($fasilitas);        

        // dd($fasilitas);
        // dd($penginapan);

        return view('sistem_informasi.admin.penginapan.edit_penginapan',['penginapan' => $penginapan, 'fasilitas' => $fasilitas ]);
    }
    public function hapus_fasilitas($id_fasilitas){
        $delete_fasilitas_penginapan = DB::table('fasilitas')->where('id','=',$id_fasilitas)->delete();
        if($delete_fasilitas_penginapan){
            return back()->with(['sukses_delete_fasilitas' => "berhasil menghapus fasilitas"]);
        }else{
            return back()->with(['error_delete_fasilitas' => "gagal menghapus fasilitas"]);
        }
    }
    public function submit_edit_penginapan(Request $request){
        try {
            $this->validate($request, [
                'penginapan' => 'required',
                'telp' => 'required|numeric',
                'harga_terendah' => 'required|integer',
                'harga_tertinggi' => 'required|integer',
                'jarak' => 'required|numeric',
                'file_gambar' => 'nullable|image',
                'jenis' => 'nullable',
            ]);
            $get_penginapan = DB::table('penginapan')->pluck('nama')->toArray();
            $get_nama = Penginapan::select("nama")->from("penginapan")->where("id",'=',$request->id)->first();

            // misal nama penginapan nya diubah
            if($get_nama->nama !== $request->penginapan){
                if(in_array($request->penginapan, $get_penginapan)){
                    return back()->with(["error_input_dinas" => "penginapan sudah tersedia"]);
                }
            }

            // ketika jarak yang dimasukkan lebih dari 10 km
            if($request->jarak >= 10){
                return back()->with(["error_input_dinas" => 'jarak tidak boleh lebih dari 10km']);
            }

            // kalo inputan tujuan kosng, berarti masih make tujuan kunjungan sebelumnya
            if($request->jenis !== null){
                $update_penginapan = DB::table('penginapan')
                ->where('id','=',$request->id)
                ->update([
                    'jenis' => $request->jenis,
                ]);
            }
            if($request->alamat == null){
                
                $update_penginapan = DB::table('penginapan')
                ->where('id','=',$request->id)
                ->update([
                    'nama' => $request->penginapan,
                    'telp' => $request->telp,
                    "harga_terendah" => $request->harga_terendah,
                    "harga_tertinggi" => $request->harga_tertinggi,
                    'jarak' => $request->jarak,
                ]);
                if($request->file_gambar !== null){
                    $file_gambar = $request->file('file_gambar');
                    $nama_file_gambar = 'gambar_penginapan_'.$file_gambar->getClientOriginalName();
                    $file_gambar->move('file_gambar/penginapan',$nama_file_gambar);
                    $nama_file_gambar_penginapan = 'file_gambar/penginapan/'.$nama_file_gambar;
                    $getGambar = Penginapan::select('gambar')
                    ->from("penginapan")
                    ->where('id','=',$request->id)
                    ->first();
                    if($getGambar){
                        $gambarPath = $getGambar->gambar;
                        File::delete($gambarPath);
                    }
                    DB::table('penginapan')->where('id','=',$request->id)->update(['gambar' => $nama_file_gambar_penginapan]);
                }
                // dd($request->file_fasilitas);
                $fasilitas = $request->input('fasilitas');
                if($fasilitas !== null){
                    foreach ($fasilitas as $fasilitass) {
                        $insert = DB::table("fasilitas")->insert([
                            "id_jenis_fasilitas" => $fasilitass,
                            "id_penginapan" => $request->id,
                        ]);
                    }
                }else{
                    return redirect('/penginapan')->with(['sukses_edit' => "Fasilitas berhasil di edit"]);
                }
                return redirect('/penginapan')->with(['sukses_edit' => "Fasilitas berhasil di edit"]);
            }else{
                
                $update_penginapan = DB::table('penginapan')
                ->where('id','=',$request->id)
                ->update([
                    'nama' => $request->penginapan,
                    'alamat' => $request->alamat,
                    'telp' => $request->telp,
                    "harga_terendah" => $request->harga_terendah,
                    "harga_tertinggi" => $request->harga_tertinggi,
                    'jarak' => $request->jarak,
                ]);
                if($request->file_gambar !== null){
                    $file_gambar = $request->file('file_gambar');
                    $nama_file_gambar = 'gambar_penginapan_'.$file_gambar->getClientOriginalName();
                    $file_gambar->move('file_gambar/penginapan',$nama_file_gambar);
                    $nama_file_gambar_penginapan = 'file_gambar/penginapan/'.$nama_file_gambar;
                    $getGambar = Penginapan::select('gambar')
                    ->from("penginapan")
                    ->where('id','=',$request->id)
                    ->first();
                    if($getGambar){
                        $gambarPath = $getGambar->gambar;
                        File::delete($gambarPath);
                    }
                    DB::table('penginapan')->where('id','=',$request->id)->update(['gambar' => $nama_file_gambar_penginapan]);
                }
                $fasilitas = $request->input('fasilitas');
                if($fasilitas !== null){
                    foreach ($fasilitas as $fasilitass) {
                        // cek apakah fasilitas sudah dipilih atau belum
                        $insert = DB::table("fasilitas")->insert([
                            "id_jenis_fasilitas" => $fasilitass,
                            "id_penginapan" => $request->penginapan,
                        ]);
                    }
                }else{
                    return redirect('/penginapan')->with(['sukses_edit' => "Fasilitas berhasil di edit"]);
                }
                return redirect('/penginapan')->with(['sukses_edit' => "Fasilitas berhasil di edit"]);
            }
        }catch (ValidationException $e) {
            // Validation failed
            $errors = $e->errors();

            // Check specific fields
            if (isset($errors['nama'])) {
                return back()->with(["error_input_dinas" => 'nama penginapan harus di isi']);
            }


            if (isset($errors['file_gambar'])) {
                return back()->with(["error_input_dinas" => 'Format gambar salah']);
            }

            if (isset($errors['alamat'])) {
                return back()->with(["error_input_dinas" => 'alamat tidak boleh kosong']);
            }
            if (isset($errors['telp'])) {
                return back()->with(["error_input_dinas" => 'No telepon harus dalam bentuk angka']);
            }
            if (isset($errors['harga_terendah'])) {
                return back()->with(["error_input_dinas" => 'harga harus dalam bentuk angka']);
            }
            if (isset($errors['harga_tertinggi'])) {
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
                'telp' => 'required|numeric',
                'harga_terendah' => 'required|integer',
                'harga_tertinggi' => 'required|integer',
                'jarak' => 'required|numeric',
                'jenis' => 'required',
                'file_gambar' => 'required|image',
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

            $file_gambar = $request->file('file_gambar');
            $nama_file_gambar = 'gambar_penginapan_'.$file_gambar->getClientOriginalName();
            $file_gambar->move('file_gambar/penginapan',$nama_file_gambar);
            $nama_file_gambar_penginapan = 'file_gambar/penginapan/'.$nama_file_gambar;

            if($cek_data){
                return back()->with(["error_ready" => 'instansi sudah tersedia']);
            }else{
                if($request->jarak >= 10){
                    return back()->with(["error_input_dinas" => 'jarak tidak boleh lebih dari 10km']);
                }

                $insert_data = DB::table('penginapan')
                ->insert([
                    "id" => $id,
                    "nama" => $request->penginapan,
                    "alamat" => $request->alamat,
                    "telp" => $request->telp,
                    "harga_terendah" => $request->harga_terendah,
                    "harga_tertinggi" => $request->harga_tertinggi,
                    "jarak" => $request->jarak,
                    "jenis" => $request->jenis,
                    "gambar" => $nama_file_gambar_penginapan,
                ]);
                if($insert_data){
                    // membaca isi data file excel nya
                    $fasilitas = $request->input('fasilitas');
                    // dd($fasilitas);
                    if($fasilitas!== null){
                        foreach ($fasilitas as $fasilitass) {
                            $insert = DB::table("fasilitas")->insert([
                                "id_jenis_fasilitas" => $fasilitass,
                                "id_penginapan" => $id,
                            ]);
                        }
                    }else{
                        return redirect('/penginapan')->with(['sukses_add' => 'berhasil Menambah data']);
                    }
                }else{
                    return redirect('/penginapan')->with(['error_add' => 'Gagal Menambah data']);
                }
                return redirect('/penginapan')->with(['sukses_add' => 'berhasil Menambah data']);
            }
        }
        catch(ValidationException $e){
            $errors = $e->errors();

            // Check specific fields
            if (isset($errors['nama'])) {
                return back()->with(["error_input_dinas" => 'nama penginapan harus di isi']);
            }
            if (isset($errors['jenis'])) {
                return back()->with(["error_input_dinas" => 'jenis penginapan harus di isi']);
            }
            if (isset($errors['harga_terendah'])) {
                return back()->with(["error_input_dinas" => 'harga penginapan harus di isi / harus dalam berbentuk angka']);
            }
            if (isset($errors['harga_tertinggi'])) {
                return back()->with(["error_input_dinas" => 'harga penginapan harus di isi / harus dalam berbentuk angka']);
            }
            if (isset($errors['file_gambar'])) {
                return back()->with(["error_input_dinas" => 'File harus dalam bentuk gambar / gambar harus di isi']);
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
            $lastNumber = (int)substr($cek[$cekPanjang - 1]->id, 7);
            $year = Date('Y');
            $id = 'WST' . $year . $lastNumber+1;
        }
        // dd($id);
        $cek = Wisata::select('*')
        ->from('wisata')
        ->where('nama','=',$request->nama)
        ->first();
        if($cek){
            return redirect("/wisata")->with(['error_ready' => 'wisata sudah tersedia']);
        }else{
            $file_gambar = $request->file('file_gambar');
            $nama_file_gambar = 'gambar_wisata_'.$file_gambar->getClientOriginalName();
            $file_gambar->move('file_gambar/wisata',$nama_file_gambar);
            $nama_file_gambar_wisata = 'file_gambar/wisata/'.$nama_file_gambar;
            // dd($nama_file_gambar);
            if($request->jarak >= 10){
                return redirect("/wisata")->with(['error_ready' => 'Jarak Tidak boleh lebih dari 10km']);
            }

            $insertWisata = DB::table('wisata')
            ->insert([
                'id' => $id,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'alamat' => $request->alamat,
                'harga_tiket' => $request->harga,
                'harga_weekend' => $request->harga_weekend,
                'gambar' => $nama_file_gambar_wisata,
                'jarak' => $request->jarak
            ]);
            if($insertWisata){
                return redirect("/wisata")->with(['sukses_add' => 'wisata berhasil ditambah']);
            }else{
                return redirect("/wisata")->with(['error_add' => 'wisata gagal ditambah']);
            }
        }
    }
    public function delete_wisata($id){
        $getGambar = Wisata::select('gambar')
        ->from("wisata")
        ->where('id','=',$id)
        ->first();
        if($getGambar){
            $gambarPath = $getGambar->gambar;
            File::delete($gambarPath);
        }

        $delete = DB::table('wisata')->where('id','=',$id)->delete();
        return back()->with(['sukses_delete' => 'wisata berhasil dihapus']);
    }
    public function edit_wisata($id){
        $wisata = Wisata::select('*')
        ->from('wisata')
        ->where('id','=',$id)
        ->first();
        return view('sistem_informasi.admin.wisata.edit_wisata',['wisata' => $wisata]);
    }
    public function submit_edit_wisata(Request $request){
        $updateWisata = true;
        try{
            $this->validate($request, [
                'nama' => 'required',
                'harga' => 'required|integer',
                'harga_weekend' => 'required|integer',
                'deskripsi' => 'nullable',
                'alamat' => 'nullable',
                'file_gambar' => 'nullable|image',
                'jarak' => 'required|numeric',
            ]);
            // dd($nama_file_gambar_wisata);
            // mengambil data wisata yang ada di database sesuai id
            $get_wisata = DB::table('wisata')->pluck('nama')->toArray();
            $get_nama = Wisata::select("nama")->from("wisata")->where("id",'=',$request->id)->first();

            // misal nama wisata nya diubah
            if($get_nama->nama !== $request->nama){
                if(in_array($request->nama, $get_wisata)){
                    return back()->with(["error_input_dinas" => "wisata sudah tersedia"]);
                }
            }

            $getdata = Wisata::select('*')
            ->from("wisata")
            ->where('id','=',$request->id)
            ->first();
            // dd($getdata);
            if($request->nama != $getdata->nama || $request->harga != $getdata->harga_tiket || $request->harga_weekend != $getdata->harga_weekend || $request->jarak != $getdata->jarak ){
                if($request->jarak >= 10){
                    return back()->with(["error_input_dinas" => 'jarak tidak boleh lebih dari 10km']);
                }
                $updateWisata = DB::table('wisata')
                ->where('id','=',$request->id)
                ->update([
                    'nama' => $request->nama,
                    'harga_tiket' => $request->harga,
                    'harga_weekend' => $request->harga_weekend,
                    'jarak' => $request->jarak,
                ]);
                if($request->file_gambar !== null){
                    $file_gambar = $request->file('file_gambar');
                    $nama_file_gambar = 'gambar_wisata_'.$file_gambar->getClientOriginalName();
                    $file_gambar->move('file_gambar/wisata',$nama_file_gambar);
                    $nama_file_gambar_wisata = 'file_gambar/wisata/'.$nama_file_gambar;
                    $getGambar = Wisata::select('gambar')
                    ->from("wisata")
                    ->where('id','=',$request->id)
                    ->first();
                    if($getGambar){
                        $gambarPath = $getGambar->gambar;
                        File::delete($gambarPath);
                    }
                    DB::table('wisata')->where('id','=',$request->id)->update(['gambar' => $nama_file_gambar_wisata]);
                }
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
                    return redirect('/wisata')->with(['sukses_edit' => 'sukses mengupdate wisata']);
                }else{
                    return redirect('/wisata')->with(['error_edit' => 'gagal mengupdate wisata']);
                }
            }else{
                if($request->file_gambar !== null){
                    $file_gambar = $request->file('file_gambar');
                    $nama_file_gambar = 'gambar_wisata_'.$file_gambar->getClientOriginalName();
                    $file_gambar->move('file_gambar/wisata',$nama_file_gambar);
                    $nama_file_gambar_wisata = 'file_gambar/wisata/'.$nama_file_gambar;
                    $getGambar = Wisata::select('gambar')
                    ->from("wisata")
                    ->where('id','=',$request->id)
                    ->first();
                    if($getGambar){
                        $gambarPath = $getGambar->gambar;
                        File::delete($gambarPath);
                    }
                    DB::table('wisata')->where('id','=',$request->id)->update(['gambar' => $nama_file_gambar_wisata]);
                }
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
            }
            
        }catch (ValidationException $e) {
            // Validation failed
            $errors = $e->errors();

            // Check specific fields
            if (isset($errors['nama'])) {
                return back()->with(["error_input_dinas" => 'nama instansi harus di isi']);
            }
            if (isset($errors['harga'])) {
                return back()->with(["error_input_dinas" => 'harga harus dalam bentuk angka']);
            }
            if (isset($errors['harga_weekend'])) {
                return back()->with(["error_input_dinas" => 'harga harus dalam bentuk angka']);
            }
            if (isset($errors['jarak'])) {
                return back()->with(["error_input_dinas" => 'jarak harus dalam bentuk angka']);
            }
            if (isset($errors['file_gambar'])) {
                return back()->with(["error_input_dinas" => 'File harus dalam bentuk gambar / gambar harus di isi']);
            }
        }
        return redirect('/wisata')->with(['sukses_edit' => 'sukses mengupdate wisata']);
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
            $getGambar = Kuliner::select('gambar')
            ->from("kuliner")
            ->where('id','=',$id)
            ->first();
            if($getGambar){
                $gambarPath = $getGambar->gambar;
                File::delete($gambarPath);
            }

            $get_layanan = DB::table('menu')->select("*")->where('id_kuliner' ,"=", $id)->get();
            // melakukan penghapusan semua menu sesuai id kuliner yang mau dihapus
            DB::table('menu')->where('id_kuliner','=', $id)->delete();
            $delete_kuliner->delete();
            return back()->with(['sukses_delete' => "sukses menghapus data"]);
        }else{
            return back()->with(['error_delete' => "gagal menghapus data"]);
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
                'alamat' => 'nullable',
                'jarak' => 'required|numeric',
                'jumlah_menu' => 'required|numeric',
                'file_gambar' => 'nullable|image',
                'file_layanan' => 'nullable|mimes:xlsx',
            ]);
            // pertama update data gedung nya dulu
            // misal deskripsi nya  diubah
            $get_kuliner = DB::table('kuliner')->pluck('nama')->toArray();
            $get_nama = Kuliner::select("nama")->from("kuliner")->where("id",'=',$request->id)->first();

            // misal nama kuliner nya diubah
            if($get_nama->nama !== $request->nama){
                if(in_array($request->nama, $get_kuliner)){
                    return back()->with(["error_input_dinas" => "kuliner sudah tersedia"]);
                }
            }

            if($request->jarak >= 10){
                return back()->with(["error_input_dinas" => 'jarak tidak boleh lebih dari 10km']);
            }
            if($request->alamat !== null ){
                DB::table('kuliner')->where('id','=',$request->id)
                ->update([
                    'alamat' => $request->alamat,
                ]);
            }
            DB::table('kuliner')->where('id','=',$request->id)
            ->update([
                'nama' => $request->nama,
                'jarak' => $request->jarak
            ]);
            if($request->file_gambar !== null){
                $file_gambar = $request->file('file_gambar');
                $nama_file_gambar = 'gambar_kuliner_'.$file_gambar->getClientOriginalName();
                $file_gambar->move('file_gambar/kuliner',$nama_file_gambar);
                $nama_file_gambar_kuliner = 'file_gambar/kuliner/'.$nama_file_gambar;
                $getGambar = Kuliner::select('gambar')
                ->from("kuliner")
                ->where('id','=',$request->id)
                ->first();
                if($getGambar){
                    $gambarPath = $getGambar->gambar;
                    File::delete($gambarPath);
                }
                DB::table('kuliner')->where('id','=',$request->id)->update(['gambar' => $nama_file_gambar_kuliner]);
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
                for($i = 1; $i < count($data); $i++){
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
            }else{
                for($i=1; $i<$request->jumlah_menu + 1; $i++){
                    if($request->{'menu'.$i} !== null){
                        if($request->{'hargamenu'.$i} === null){
                            return back()->with(["error_input_dinas" => "Harga Menu ke ".$i." Kosong"]);
                        }else{
                            $cek_id = Kuliner::select('id')
                            ->from('kuliner')
                            ->where('nama','=',$request->nama)
                            ->first();
    
                            // kondisi jika id ditemukan
                            if($cek_id){
                                // valdiasi bahwa layanan belom tersedia
                                $cek_menu = Menu::select("nama")
                                ->from("menu")
                                ->where("id_kuliner",'=',$cek_id->id)
                                ->where("nama",'=',$request->{'menu'.$i})
                                ->first();

                                if(!$cek_menu){
                                    if(!is_numeric($request->{'hargamenu'.$i})){
                                        return back()->with(["error_input_dinas" => 'Input Menu terhenti karena Harga Menu ke '.$i.' tidak berbentuk angka']);
                                    }
                                    $insert_menu = DB::table('menu')
                                    ->insert([
                                        'nama' => $request->{'menu'.$i},
                                        'harga' => $request->{'hargamenu'.$i},
                                        'id_kuliner' => $cek_id->id
                                    ]);
                                    // kondisi jika insert gagal
                                    if(!$insert_menu){
                                        return redirect('/dinas')->with(['error_add' => 'gagal Menambah data']);
                                    }
                                }else{
                                    return back()->with(["error_input_dinas" => 'Input Menu terhenti karena Menu '.$request->{'menu'.$i}.' sudah tersedia']);
                                }
                            }
                        }
                    }else{
                        if($request->{'hargamenu'.$i} !== null){
                            return back()->with(["error_input_dinas" => "Menu ke ".$i." Kosong"]);
                        }
                    }
                }
            }
            return redirect('/kuliner')->with(['sukses_edit' => 'berhasil mengedit data']);
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
            if (isset($errors['file_gambar'])) {
                return back()->with(["error_input_dinas" => 'File harus dalam bentuk gambar / gambar harus di isi']);
            }
        }
    }

    public function hapus_menu($id_menu){
        $hapus_menu = DB::table('menu')->where('id','=',$id_menu)->delete();
        if($hapus_menu){
            return back()->with(['sukses_delete' => "berhasil menghapus menu"]);
        }else{
            return back()->with(['error_delete' => "gagal menghapus menu"]);
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
                'jarak' => 'required|numeric',
                'jumlah_menu' => 'required|numeric',
                'file_gambar' => 'required|image',
                'file_layanan' => 'nullable|mimes:xlsx',
            ]);
            // dd($request->jumlah_menu);
            $cek = DB::table('kuliner')
            ->select('id')
            ->orderByRaw("LENGTH(id), CAST(id AS SIGNED), id")
            ->get();

            $cekPanjang = count($cek);

            if($cekPanjang == 0){
                $year = Date('Y');
                $id = 'KLN' . $year . 1;
            }else{
                $lastNumber = (int)substr($cek[$cekPanjang - 1]->id, 7);
                $year = Date('Y');
                $id = 'KLN' . $year . $lastNumber+1;
            }
            // dd($lastNumber);
            $cek_data = Kuliner::select('*')
            ->from('kuliner')
            ->where('nama','=',$request->nama)
            ->first();
            
            if($cek_data){
                return back()->with(["error_input_dinas" => 'Kuliner sudah tersedia']);
            }else{
                if($request->jarak >= 10){
                    return back()->with(["error_input_dinas" => 'jarak tidak boleh lebih dari 10km']);
                }

                $file_gambar = $request->file('file_gambar');
                $nama_file_gambar = 'gambar_kuliner_'.$file_gambar->getClientOriginalName();
                $file_gambar->move('file_gambar/kuliner',$nama_file_gambar);
                $nama_file_gambar_kuliner = 'file_gambar/kuliner/'.$nama_file_gambar;

                $insert_data = DB::table('kuliner')
                ->insert([
                    "id" => $id,
                    "nama" => $request->nama,
                    "alamat" => $request->alamat,
                    "jarak" => $request->jarak,
                    "gambar" => $nama_file_gambar_kuliner,
                ]);

                if($insert_data){
                    if($request->file_layanan !== null){
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
                        if($data[0][0] !== "Nama Menu" || $data[0][1] !== "Harga Menu ( angka )"){
                            return back()->with(["error_input_dinas" => 'Input Excel harus sesuai format yang tersedia']);
                        }
                        // looping buat ngebaca isi file nya
                        for($i = 1; $i < count($data); $i++){
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
                        File::delete('file_layanan/'.$nama_file);
                    }else{
                        for($i=1; $i<$request->jumlah_menu + 1; $i++){
                            if($request->{'menu'.$i} !== null){
                                if($request->{'hargamenu'.$i} === null){
                                    return back()->with(["error_input_dinas" => "Harga Menu ke ".$i." Kosong"]);
                                }else{
                                    $cek_id = Kuliner::select('id')
                                    ->from('kuliner')
                                    ->where('nama','=',$request->nama)
                                    ->first();
            
                                    // kondisi jika id ditemukan
                                    if($cek_id){
                                        // valdiasi bahwa layanan belom tersedia
                                        $cek_menu = Menu::select("nama")
                                        ->from("menu")
                                        ->where("id_kuliner",'=',$cek_id->id)
                                        ->where("nama",'=',$request->{'menu'.$i})
                                        ->first();
        
                                        if(!$cek_menu){
                                            if(!is_numeric($request->{'hargamenu'.$i})){
                                                return back()->with(["error_input_dinas" => 'Input Menu terhenti karena Harga Menu ke '.$i.' tidak berbentuk angka']);
                                            }
                                            $insert_menu = DB::table('menu')
                                            ->insert([
                                                'nama' => $request->{'menu'.$i},
                                                'harga' => $request->{'hargamenu'.$i},
                                                'id_kuliner' => $cek_id->id
                                            ]);
                                            // kondisi jika insert gagal
                                            if(!$insert_menu){
                                                return redirect('/dinas')->with(['error_add' => 'gagal Menambah data']);
                                            }
                                        }else{
                                            return back()->with(["error_input_dinas" => 'Input Menu terhenti karena Menu '.$request->{'menu'.$i}.' sudah tersedia']);
                                        }
                                    }
                                }
                            }else{
                                if($request->{'hargamenu'.$i} !== null){
                                    return back()->with(["error_input_dinas" => "Menu ke ".$i." Kosong"]);
                                }
                            }
                        }
                    }
                    return redirect('kuliner')->with(['sukses_add' => 'berhasil Menambah data']);
                }else{
                    return redirect('kuliner')->with(['error_add' => 'gagal Menambah data']);
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
            if (isset($errors['file_gambar'])) {
                return back()->with(["error_input_dinas" => 'File harus dalam bentuk gambar / gambar harus di isi']);
            }
        }
    }
    public function edit_menu(Request $request){
        $get_id_kuliner = Kuliner::select("*")->from("kuliner")->where("nama",'=',$request->warung)->first();
        $cek_menu = Menu::select('*')
        ->from('menu')
        ->where('nama','=',$request->nama)
        ->where('id_kuliner','=',$get_id_kuliner->id)
        ->first();
        if(!$cek_menu){
            if(!is_numeric($request->harga)){
                return back()->with(['error_edit' => "harga harus dalam bentuk angka"]);
            }
            $edit_menu = DB::table('menu')
            ->where('id','=',$request->id)
            ->update([
                'nama' => $request->nama,
                'harga' => $request->harga
            ]);
            if($edit_menu){
                return back()->with(['sukses_edit' => "berhasil edit menu"]);
            }
        }else{
            if($cek_menu->id == $request->id){
                if(!is_numeric($request->harga)){
                    return back()->with(['error_edit' => "harga harus dalam bentuk angka"]);
                }
                $edit_menu = DB::table('menu')
                ->where('id','=',$request->id)
                ->update([
                    'nama' => $request->nama,
                    'harga' => $request->harga
                ]);
                return redirect('/kuliner')->with(['sukses_edit' => "berhasil edit menu"]);
            }else{
                return back()->with(['error_ready' => "menu sudah ada"]);
            }
        }
    }
    public function download_file_menu(){
        $filePath = public_path('file_template/menu.xlsx');

        if (!file_exists($filePath)) {
            return back()->with(['error_ready' => "File tidak tersedia"]);
        }
        return response()->download($filePath);
    }
    public function download_file_layanan(){
        $filePath = public_path('file_template/layanan.xlsx');

        if (!file_exists($filePath)) {
            return back()->with(['error_ready' => "File tidak tersedia"]);
        }
        return response()->download($filePath);
    }
    public function download_file_fasilitas(){
        $filePath = public_path('file_template/fasilitas.xlsx');

        if (!file_exists($filePath)) {
            return back()->with(['error_ready' => "File tidak tersedia"]);
        }
        return response()->download($filePath);
    }
    public function add_jenis_fasilitas(Request $request){
        $jenisFasilitas = $request->input('jenis_fasilitas');
        // cek apakah fasilitas udah ada apa belom
        $cek = List_fasilitas::select("*")->from("list_fasilitas")->where("nama_fasilitas",'=',$jenisFasilitas)->first();
        if($cek){
            return redirect("/add/penginapan")->with(["error_add" => "Gagal Menambah Fasilitas"]);
        }
        if($jenisFasilitas){
            DB::table("list_fasilitas")->insert([
                "nama_fasilitas" => $jenisFasilitas
            ]);
            return redirect("/add/penginapan")->with(["sukses_add" => "Berhasil Menambah Fasilitas"]);
        }else{
            return redirect("/add/penginapan")->with(["error_add" => "Gagal Menambah Fasilitas"]);
        }
    }
    public function hapus_jenis_fasilitas($id){
        $cek = List_fasilitas::select("*")->from("list_fasilitas")->where("id",'=',$id)->first();
        if($cek){
            // cek diatas merupakan ngecek apakah benar adanya data tersebut di table list fasilitas
            $hapus_fasilitas_penginapan = DB::table("fasilitas")->select("*")->where("id_jenis_fasilitas",'=',$id)->delete();
            // hapus_fasilitas_penginapan adalah menghapus fasilitas terkait yang sudah digunakan pada penginapan
            // setelah itu baru hapus dari list fasilitas
            if($hapus_fasilitas_penginapan){
                $hapus_jenis_fasilitas = DB::table("list_fasilitas")->select("*")->where("id",'=',$id)->delete();
                if($hapus_jenis_fasilitas){
                    return back()->with(["sukses_delete" => "berhasil menghapus fasilitas"]);
                }else{
                    return back()->with(["error_delete" => "gagal menghapus fasilitas"]);
                }
            }else{
                return back()->with(["error_delete" => "gagal menghapus fasilitas"]);
            }
        }
    }
}
