<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\landingController;
use App\Http\Controllers\akunController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Crypt;

// tampilan awal web
Route::get('/',[landingController::class,'makeGedung']);
// Route::get('/',function(){
//     return view('landing_page.promosi');
// });


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
Route::get('/edit_layanan',[landingController::class,'makeGedung'])->name('edit_layanan')->middleware('isAdmin');
// detail layanan
Route::get('/detail_layanan/{id}/{nama}',[landingController::class,'detail_layanan'])->name('detail_layanan');


Route::post('/edit_layanan',[AdminController::class,'edit_layanan'])->name('edit_layanan')->middleware('isAdmin');
// menambah dinas
Route::get('/add_dinas',[AdminController::class,'add_dinas'])->middleware('isAdmin');
Route::post('/submit_add_dinas',[AdminController::class,'submit_add_dinas'])->middleware('isAdmin');
Route::get('/submit_add_dinas',[landingController::class,'makeGedung'])->middleware('isAdmin');

Route::get('/gedung/all',[landingController::class,'gedung_lengkap'])->name('gedung_lengkap');
Route::get('/hapus_gambar_idInstansi/{idInstansi}',[AdminController::class,'hapus_gambar_idInstansi'])->name('hapus_gambar_idInstansi')->middleware('isAdmin');

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
Route::get('/add/penginapan',[AdminController::class,'add_penginapan'])->name('add_penginapan')->middleware('isAdmin');

Route::post('/submit_edit_penginapan',[AdminController::class,'submit_edit_penginapan'])->middleware('isAdmin');
Route::get('/submit_edit_penginapan',[landingController::class,'makeGedung'])->middleware('isAdmin');

Route::post('/submit_add_penginapan',[AdminController::class,'submit_add_penginapan'])->middleware('isAdmin');
Route::get('/submit_add_penginapan',[landingController::class,'makeGedung'])->middleware('isAdmin');

Route::get('/hapus_fasilitas/{id_fasilitas}',[AdminController::class,'hapus_fasilitas'])->name('hapus_fasilitas')->middleware('isAdmin');
Route::get('/hapus_jenis_fasilitas/{id}',[AdminController::class,'hapus_jenis_fasilitas'])->name('hapus_jenis_fasilitas')->middleware('isAdmin');

Route::get('/add_jenis_fasilitas',[landingController::class,'makeGedung'])->middleware('isAdmin');
Route::post('/add_jenis_fasilitas',[AdminController::class,'add_jenis_fasilitas'])->name('add_jenis_fasilitas')->middleware('isAdmin');
Route::get('/delete_gambar_penginapan/{idPenginapan}',[AdminController::class,'delete_gambar_penginapan'])->middleware('isAdmin');


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
Route::get('/delete_gambar_wisata/{idWisata}',[AdminController::class,'delete_gambar_wisata'])->middleware('isAdmin');

//  ============== kuliner ===========
// ke halaman info kuliner
Route::get('/kuliner',[AdminController::class,'info_kuliner'])->middleware('isAdmin');
// menghapus dinas
Route::get('/delete/kuliner/{id}',[AdminController::class,'delete_kuliner'])->name('delete_kuliner')->middleware('isAdmin');

// utk mengedit kuliner
Route::get('/edit/kuliner/{id}',[AdminController::class,'edit_kuliner'])->name('edit_kuliner')->middleware('isAdmin');
Route::post('/submit_edit_kuliner',[AdminController::class,'submit_edit_kuliner'])->middleware('isAdmin');
Route::get('/submit_edit_kuliner',[landingController::class,'makeGedung'])->middleware('isAdmin');

Route::get('/delete_gambar_warung/{idWarung}',[AdminController::class,'delete_gambar_warung'])->middleware('isAdmin');



// menghapus menu
Route::get('/hapus_menu/{id_menu}',[AdminController::class,'hapus_menu'])->name('hapus_menu')->middleware('isAdmin');
Route::post('/edit/menu',[AdminController::class,'edit_menu'])->name('edit_menu')->middleware('isAdmin');
Route::get('/edit/menu',[landingController::class,'makeGedung'])->middleware('isAdmin');

// menambah kuliner
Route::get('/add_kuliner',[AdminController::class,'add_kuliner'])->middleware('isAdmin');
Route::post('/submit_add_kuliner',[AdminController::class,'submit_add_kuliner'])->middleware('isAdmin');
Route::get('/submit_add_kuliner',[landingController::class,'makeGedung'])->middleware('isAdmin');

// =========== LANDING PAGE PROMOSI ===============

//  PENGINAPAN
Route::get('/detail/penginapan/{nama} ',[landingController::class,'detail_penginapan'])->name('detail_penginapan');
Route::get('/penginapan/all',[landingController::class,'penginapan_lengkap'])->name('penginapan_lengkap');

Route::get('/detail/wisata/{nama} ',[landingController::class,'detail_wisata'])->name('detail_wisata');
Route::get('/wisata/all',[landingController::class,'wisata_lengkap'])->name('wisata_lengkap');

Route::get('/detail/kuliner/{nama} ',[landingController::class,'detail_kuliner'])->name('detail_kuliner');
Route::get('/kuliner/all',[landingController::class,'kuliner_lengkap'])->name('kuliner_lengkap');

//  DOWNLOAD FILE FORMAT 
Route::get('/download_file_menu',[AdminController::class,'download_file_menu'])->middleware('isAdmin');
Route::get('/download_file_fasilitas',[AdminController::class,'download_file_fasilitas'])->middleware('isAdmin');
Route::get('/download_file_layanan',[AdminController::class,'download_file_layanan'])->middleware('isAdmin');