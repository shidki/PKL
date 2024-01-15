<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gedung;
use App\Models\Layanan;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    //
    public function viewpage(){
        return view('sistem_informasi.admin.dashboard');
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
            foreach($get_layanan as $layanan){
                DB::table('layanan')->where('id_gedung', $id)->delete();
            }
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
                if ($data[$i][1] !== null) {
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
                        if ($data[$i][1] !== null) {
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
                    File::delete('file_batch_mhs/'.$nama_file);
                    return back()->with(['sukses_toast' => 'berhasil Menambah data']);
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
}