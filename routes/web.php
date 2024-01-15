<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\landingController;
use App\Http\Controllers\akunController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Crypt;

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
Route::get('/logout',[akunController::class,'logout']);

//  ============= SIGN UP ============
Route::get('/signup',[akunController::class,'signup1'])->middleware("guest");
Route::post('/signup',[akunController::class,'signup'])->middleware("guest");

//  ============== DETAIL ===========
Route::get('/detail/{id}',[GedungController::class,'showDetail']);

//  ============== SISTEM INFORMASI ===========
Route::get('/administrator',[AdminController::class,'viewpage'])->middleware('isAdmin');
// ke halaman info dinas
Route::get('/dinas',[AdminController::class,'info_gedung'])->middleware('isAdmin');
// menghapus gedung
Route::get('/delete/{id}',[AdminController::class,'delete_gedung'])->name('delete')->middleware('isAdmin');

// utk mengedit gedung
Route::get('/edit/{id}',[AdminController::class,'edit_gedung'])->name('edit')->middleware('isAdmin');
Route::post('/submit_edit_dinas',[AdminController::class,'submit_edit_dinas'])->middleware('isAdmin');
// menghapus layanan
Route::get('/hapus_layanan/{id_layanan}',[AdminController::class,'hapus_layanan'])->name('hapus_layanan')->middleware('isAdmin');
// menambah dinas
Route::get('/add_dinas',[AdminController::class,'add_dinas'])->middleware('isAdmin');
Route::post('/submit_add_dinas',[AdminController::class,'submit_add_dinas'])->middleware('isAdmin');