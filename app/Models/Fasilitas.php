<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $tabel = 'fasilitas';

    // Menentukan Primary Key pada tabel
    protected $primaryKey = 'id';

    // Menentukan kolom yang dapat diisi pada tabel
    protected $fillable = [
        'id', 
        'id_jenis_fasiitas', 
        'id_penginapan'
    ] ;

    public $incrementing = true;
    public $timestamps = false;  
}
