<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function viewpage(){
        return view('sistem_informasi.dashboard');
    }
}
