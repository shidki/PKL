<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gedung;
use App\Models\Akun;
use App\Models\Layanan;
use Illuminate\Support\Facades\DB;

class landingController extends Controller
{
    //
    public function makeGedung(){
        $gedung = Gedung::select("*")
        ->from("gedung")
        ->get();
        
        $layanan = Layanan::select("nama")
        ->from("layanan")
        ->get();
        
        return view('landing_page.main',['layanan' => $layanan, 'gedung' => $gedung]);
    }
}
