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
Route::get('/detail/{nama}',[GedungController::class,'showDetail']);

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
Route::get('/submit_edit_dinas',[landingController::class,'makeGedung'])->middleware('isAdmin');

// menghapus layanan
Route::get('/hapus_layanan/{id_layanan}',[AdminController::class,'hapus_layanan'])->name('hapus_layanan')->middleware('isAdmin');

// menambah dinas
Route::get('/add_dinas',[AdminController::class,'add_dinas'])->middleware('isAdmin');
Route::post('/submit_add_dinas',[AdminController::class,'submit_add_dinas'])->middleware('isAdmin');
Route::get('/submit_add_dinas',[landingController::class,'makeGedung'])->middleware('isAdmin');

//  ============== admin ===========
Route::get('/admin',[AdminController::class,'info_admin'])->middleware('isAdmin');
// menghapus admin
Route::get('/delete/admin/{id}',[AdminController::class,'delete_admin'])->name('delete_admin')->middleware('isAdmin');
// mengedit admin
Route::get('/edit/admin/{id}',[AdminController::class,'edit_admin'])->name('edit_admin')->middleware('isAdmin');
// confirm admin
Route::post('/add/admin',[AdminController::class,'add_admin'])->name('add_admin')->middleware('isAdmin');
Route::get('/add/admin',[landingController::class,'makeGedung'])->middleware('isAdmin');

Route::post('/submit_edit_admin',[AdminController::class,'submit_edit_admin'])->middleware('isAdmin');
Route::get('/submit_edit_admin',[landingController::class,'makeGedung'])->middleware('isAdmin');

//  ============== penginapan ===========
Route::get('/penginapan',[AdminController::class,'info_penginapan'])->middleware('isAdmin');
// menghapus penginapan
Route::get('/delete/penginapan/{id}',[AdminController::class,'delete_penginapan'])->name('delete_penginapan')->middleware('isAdmin');
// mengedit penginapan
Route::get('/edit/penginapan/{id}',[AdminController::class,'edit_penginapan'])->name('edit_penginapan')->middleware('isAdmin');

Route::post('/submit_edit_penginapan',[AdminController::class,'submit_edit_penginapan'])->middleware('isAdmin');
Route::get('/submit_edit_penginapan',[landingController::class,'makeGedung'])->middleware('isAdmin');

Route::post('/submit_add_penginapan',[AdminController::class,'submit_add_penginapan'])->middleware('isAdmin');
Route::get('/submit_add_penginapan',[landingController::class,'makeGedung'])->middleware('isAdmin');

Route::get('/hapus_fasilitas/{id_fasilitas}',[AdminController::class,'hapus_fasilitas'])->name('hapus_fasilitas')->middleware('isAdmin');


//  ============== wisata ===========
Route::get('/wisata',[AdminController::class,'info_wisata'])->middleware('isAdmin');
// menghapus admin
Route::get('/delete/wisata/{id}',[AdminController::class,'delete_wisata'])->name('delete_wisata')->middleware('isAdmin');
// mengedit admin
Route::get('/edit/wisata/{id}',[AdminController::class,'edit_wisata'])->name('edit_wisata')->middleware('isAdmin');
// confirm admin
Route::post('/add/wisata',[AdminController::class,'add_wisata'])->name('add_wisata')->middleware('isAdmin');
Route::get('/add/wisata',[landingController::class,'makeGedung'])->middleware('isAdmin');
Route::post('/submit_edit_wisata',[AdminController::class,'submit_edit_wisata'])->middleware('isAdmin');
Route::get('/submit_edit_wisata',[landingController::class,'makeGedung'])->middleware('isAdmin');