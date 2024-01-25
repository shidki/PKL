<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;
    protected $tabel = 'wisata';

    // Menentukan Primary Key pada tabel
    protected $primaryKey = 'id';

    // Menentukan kolom yang dapat diisi pada tabel
    protected $fillable = [
        'id', 
        'nama', 
        'deskripsi',
        'alamat',
        'harga_tiket',
        'jarak'
    ] ;

    public $incrementing = true;
    public $timestamps = false; 
}
