<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $tabel = 'layanan';

    // Menentukan Primary Key pada tabel
    protected $primaryKey = 'id';

    // Menentukan kolom yang dapat diisi pada tabel
    protected $fillable = [
        'id', 
        'nama', 
        'deskripsi', 
        'id_gedung'
    ] ;

    public $incrementing = true;
    public $timestamps = false;  
}
