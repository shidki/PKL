<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    use HasFactory;
    protected $tabel = 'penginapan';

    // Menentukan Primary Key pada tabel
    protected $primaryKey = 'id';

    // Menentukan kolom yang dapat diisi pada tabel
    protected $fillable = [
        'id', 
        'nama', 
        'alamat',
        'telp',
        'harga_terendah',
        'harga_tertinggi',
        'jarak',
        'jenis',
        'gambar'
    ] ;

    public $incrementing = false;
    public $timestamps = false; 
}
