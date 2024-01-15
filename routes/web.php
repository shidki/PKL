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

//  ============== DINAS ===========
// ke halaman info dinas
Route::get('/dinas',[AdminController::class,'info_gedung'])->middleware('isAdmin');
// menghapus dinas
Route::get('/delete/dinas/{id}',[AdminController::class,'delete_gedung'])->name('delete_dinas')->middleware('isAdmin');

// utk mengedit dinas
Route::get('/edit/dinas/{id}',[AdminController::class,'edit_gedung'])->name('edit_dinas')->middleware('isAdmin');
Route::post('/submit_edit_dinas',[AdminController::class,'submit_edit_dinas'])->middleware('isAdmin');

// menghapus layanan
Route::get('/hapus_layanan/{id_layanan}',[AdminController::class,'hapus_layanan'])->name('hapus_layanan')->middleware('isAdmin');

// menambah dinas
Route::get('/add_dinas',[AdminController::class,'add_dinas'])->middleware('isAdmin');
Route::post('/submit_add_dinas',[AdminController::class,'submit_add_dinas'])->middleware('isAdmin');

//  ============== PENGUNJUNG ===========
Route::get('/pengunjung',[AdminController::class,'info_pengunjung'])->middleware('isAdmin');
// menghapus pengunjung
Route::get('/delete/pengunjung/{id}',[AdminController::class,'delete_pengunjung'])->name('delete_pengunjung')->middleware('isAdmin');
// mengedit pengunjung
Route::get('/edit/pengunjung/{id}',[AdminController::class,'edit_pengunjung'])->name('edit_pengunjung')->middleware('isAdmin');
// confirm pengunjung
Route::get('/confirm/pengunjung/{id}',[AdminController::class,'confirm_pengunjung'])->name('confirm_pengunjung')->middleware('isAdmin');
Route::post('/add/pengunjung',[AdminController::class,'add_pengunjung'])->name('add_pengunjung')->middleware('isAdmin');
Route::post('/submit_edit_pengunjung',[AdminController::class,'submit_edit_pengunjung'])->middleware('isAdmin');