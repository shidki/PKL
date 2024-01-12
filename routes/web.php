<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\landingController;
use App\Http\Controllers\akunController;
use App\Http\Controllers\GedungController;

// tampilan awal web
Route::get('/',[landingController::class,'makeGedung']);


//  untuk menampilkan file 3dmap di iframe
Route::get('/tour', function() {
    return view('landing_page.3dmap');
})->name('3dmap');

Route::get('/3DmapBalaikota',function(){
    return view('landing_page.3dmap');
});


//  ============== LOGIN ===========
Route::get('/login',function(){
    return view('login_page.login');
})->name('login_page')->middleware("guest");

Route::post('/login',[akunController::class,'confirmLogin'])->name('confirm_login')->middleware("guest");

// ============== LOG OUT ===========
Route::get('/logout',[akunController::class,'logout'])->middleware("isAdmin");

//  ============= SIGN UP ============
Route::get('/signup',[akunController::class,'signup1'])->middleware("guest");
Route::post('/signup',[akunController::class,'signup'])->middleware("guest");

//  ============== DETAIL ===========
Route::get('/detail/{id}',[GedungController::class,'showDetail']);