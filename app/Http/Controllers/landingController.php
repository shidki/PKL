<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gedung;
use App\Models\Akun;
use App\Models\layanan;
use Illuminate\Support\Facades\DB;

class landingController extends Controller
{
    //
    public function makeGedung(){
        $gedung = Gedung::select("*")
        ->from("gedung")
        ->get();
        
        $jmlGedung = Gedung::select("nama")
        ->from("gedung")
        ->count();
        
        return view('landing_page.main',['jml' => $jmlGedung, 'gedung' => $gedung]);
    }
}
