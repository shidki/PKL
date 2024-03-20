<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use App\Models\Gedung;
use App\Models\Penginapan;
use App\Models\Wisata;
use App\Models\Kuliner;
use App\Models\Menu;
use App\Models\Layanan;
use Illuminate\Support\Facades\DB;

class landingController extends Controller
{
    //
    public function makeGedung(){
        $gedung = Gedung::select("*")
        ->from("gedung")
        ->get();
        
        $layanan = Layanan::select("l.nama",'g.nama as nama_gedung')
        ->from("layanan as l")
        ->join('gedung as g','g.id','=','l.id_gedung')
        ->get();
        
        $penginapan = Penginapan::select("*")
        ->from("penginapan")
        ->get();
        $wisata = Wisata::select("*")
        ->from("wisata")
        ->get();
        $kuliner = Kuliner::select("*")
        ->from("kuliner")
        ->get();

        return view('landing_page.main',['layanan' => $layanan, 'gedung' => $gedung, 'penginapan' => $penginapan, 'wisata' => $wisata, 'kuliner' => $kuliner]);
    }

    public function detail_penginapan($nama){

        $getId = Penginapan::select("id")
        ->from("penginapan")
        ->where("nama",'=',$nama)
        ->first();

        $penginapan = Penginapan::select("*")
        ->from("penginapan")
        ->where("id",'=',$getId->id)
        ->first();

        $fasilitas = Fasilitas::select("f.*","l.nama_fasilitas")
        ->from("fasilitas as f")
        ->join("list_fasilitas as l",'l.id','=',"f.id_jenis_fasilitas")
        ->where("id_penginapan",'=',$getId->id)
        ->get();
        
        // dd($fasilitas);

        $lainnya = Penginapan::select("*")
        ->from("penginapan")
        ->where("id",'!=',$getId->id)
        ->get();

        return view('landing_page.detail_penginapan',['fasilitas' => $fasilitas, 'lainnya' => $lainnya, 'penginapan' => $penginapan]);
    }
    public function penginapan_lengkap(){
        $penginapan = Penginapan:: select("*")
        ->from("penginapan")
        ->get();
        // dd($penginapan);
        return view("landing_page.penginapanLengkap",["penginapan" => $penginapan]);
    }
    public function detail_kuliner($nama){

        $getId = Kuliner::select("id")
        ->from("kuliner")
        ->where("nama",'=',$nama)
        ->first();

        $kuliner = Kuliner::select("*")
        ->from("kuliner")
        ->where("id",'=',$getId->id)
        ->first();

        $menu = Menu::select("*")
        ->from("menu")
        ->where("id_kuliner",'=',$getId->id)
        ->get();
        
        // dd($fasilitas);

        $lainnya = Kuliner::select("*")
        ->from("kuliner")
        ->where("id",'!=',$getId->id)
        ->get();

        return view('landing_page.detail_kuliner',['menu' => $menu, 'lainnya' => $lainnya, 'kuliner' => $kuliner]);
    }
    public function kuliner_lengkap(){
        $kuliner = Kuliner:: select("*")
        ->from("kuliner")
        ->get();
        // dd($kuliner);
        return view("landing_page.kulinerLengkap",["kuliner" => $kuliner]);
    }



    // Wisata
    public function detail_wisata($nama){

        $getId = Wisata::select("id")
        ->from("wisata")
        ->where("nama",'=',$nama)
        ->first();

        $wisata = Wisata::select("*")
        ->from("wisata")
        ->where("id",'=',$getId->id)
        ->first();


        $lainnya = Wisata::select("*")
        ->from("wisata")
        ->where("id",'!=',$getId->id)
        ->get();

        return view('landing_page.detail_wisata',['lainnya' => $lainnya, 'wisata' => $wisata]);
    }
    public function wisata_lengkap(){
        $wisata = Wisata:: select("*")
        ->from("wisata")
        ->get();
        // dd($wisata);
        return view("landing_page.wisataLengkap",["wisata" => $wisata]);
    }
    public function gedung_lengkap(){
        $gedung = Gedung:: select("*")
        ->from("gedung")
        ->get();

        return view("landing_page.instansiLengkap",["gedung" => $gedung]);
    }

    public function detail_layanan($id, $nama){
        $layanan = Layanan::select("l.*",'g.gambar_detail','g.judul_gambar')
        ->from("layanan as l")
        ->leftJoin("gambar_detail_layanan as g",'g.id_layanan','=',"l.id")
        ->where("l.id",'=',$id)
        ->first();

        // dd($layanan);
        return view("landing_page.detailLayanan",["layanan" => $layanan,"gedung" => $nama]);
    }
}
