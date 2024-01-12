<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gedung;
use Illuminate\Support\Facades\Crypt;

class GedungController extends Controller
{
    //
    public function showDetail($id)
    {
        $decrypt_id = Crypt::decrypt($id);
        $gedungDetails = Gedung::select('*')->from('gedung')->where('id', $decrypt_id)->first();
        return view('landing_page.detail', ['gedungDetails' => $gedungDetails]);
    }
}
