<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_fasilitas extends Model
{
    use HasFactory;
    protected $tabel = 'list_fasilitas';

    // Menentukan Primary Key pada tabel
    protected $primaryKey = 'id';

    // Menentukan kolom yang dapat diisi pada tabel
    protected $fillable = [
        'id', 
        'nama_fasilitas', 
    ] ;

    public $incrementing = true;
    public $timestamps = false;  
}
