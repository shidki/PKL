<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gedung;
use App\Models\Layanan;
use App\Models\Penginapan;
use Illuminate\Support\Facades\Crypt;

class GedungController extends Controller
{
    //
    public function showDetail($nama)
    {
        // $decrypt_id = Crypt::decrypt($id);
        //  $id ini dikirim sebgai nama gedung
        $gedungDetails = Gedung::select('*')->from('gedung')->where('nama', $nama)->first();
        // dd($nama);
        // dd($gedungDetails->id);
        $getID = $gedungDetails->id;
        $layanan = Layanan::select("nama")
        ->from("layanan")
        ->where('id_gedung','=',$getID)
        ->get();


        return view('landing_page.detail', ['gedungDetails' => $gedungDetails,'layanan' => $layanan]);
    }
}
