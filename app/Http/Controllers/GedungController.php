<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gedung;
use App\Models\Layanan;
use Illuminate\Support\Facades\Crypt;

class GedungController extends Controller
{
    //
    public function showDetail($id)
    {
        $decrypt_id = Crypt::decrypt($id);
        $gedungDetails = Gedung::select('*')->from('gedung')->where('id', $decrypt_id)->first();

        $layanan = Layanan::select("nama")
        ->from("layanan")
        ->where('id_gedung','=',$decrypt_id)
        ->get();

        return view('landing_page.detail', ['gedungDetails' => $gedungDetails,'layanan' => $layanan]);
    }
}
