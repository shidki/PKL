<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tujuan_kunjungan extends Model
{
    use HasFactory;
    protected $tabel = 'tujuan_kunjungan';

    // Menentukan Primary Key pada tabel
    protected $primaryKey = 'id';

    // Menentukan kolom yang dapat diisi pada tabel
    protected $fillable = [
        'id', 
        'nama_tujuan', 
        'id_tujuan', 
        'id_pengunjung'
    ] ;

    public $incrementing = true;
    public $timestamps = false;  
}
