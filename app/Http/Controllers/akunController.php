<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gedung;
use App\Models\Users;
use App\Models\layanan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class akunController extends Controller
{
    //
    public function confirmLogin(Request $request){
        
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $getname = Users::select("username")
            ->from("users")
            ->where("email",'=',$request->email)
            ->first();
            return redirect()->intended('/')->with(["name" => $getname->username]);
        }

        return back()->with([
            'login_error' => 'LOGIN GAGAL',
        ])->onlyInput('email');
    }
    public function logout(){
        Auth::logout();
        
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
    public function signup(Request $request){
        $username = $request->username;
        $email = $request->email;
        $password = bcrypt($request->password); // Melakukan bcryot buat dimasukin ke database

        $cekusername = Users::select("username")
        ->from("users")
        ->where("username",'=',$username)
        ->first();
        
        if($cekusername){
            //  artinya username sudah ada di database maka akan menghasilkan error saat mendaftar akan
            return back()->with(["signup_error" => "username sudah digunakan"]);
        }

        $cekemail = Users::select("email")
        ->from("users")
        ->where("email",'=',$email)
        ->first();

        if($cekemail){
            //  artinya email sudah ada di database maka akan menghasilkan error saat mendaftar akan
            return back()->with(["signup_error" => "email sudah digunakan"]);
        }

        $insertData = Users::insert([
            "username" => $username,
            "email" => $email,
            "password" => $password,
        ]);
        if($insertData){
            return redirect()->intended('/login')->with(["email" => $email,"password" => $request->password,"sukses_daftar" => "Pendaftaran Berhasil, Silahkan login"]);
        }else{
            return back()->with([
                'signup_error' => 'Gagal Melakukan Pendaftaran',
            ]);
        }
    }
    //  function dibawah digunakan ketika ada guest yang mengetik /signup secara manual agar diarahkan ke halaman awal
    public function signup1(){
        return redirect("/");
    }
}
