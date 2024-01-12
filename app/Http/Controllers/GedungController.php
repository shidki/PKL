<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gedung;


class GedungController extends Controller
{
    //
    public function showDetail($id)
    {
        $gedungDetails = Gedung::select('*')->from('gedung')->where('id', $id)->get();
        return view('landing_page.detail', ['gedungDetails' => $gedungDetails]);
    }
}
