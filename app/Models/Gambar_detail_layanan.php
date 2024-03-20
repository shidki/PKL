<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar_detail_layanan extends Model
{
    use HasFactory;
    protected $tabel = 'gambar_detail_layanan';

    // Menentukan Primary Key pada tabel
    protected $primaryKey = 'id';

    // Menentukan kolom yang dapat diisi pada tabel
    protected $fillable = [
        'id', 
        'judul_gambar', 
        'gambar_detail', 
        'id_layanan', 
    ] ;

    public $incrementing = true;
    public $timestamps = false;  
}
