<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_ekskul',
        'nama_ekskul',
        'image',
        'informasi_ekskul',
    ];
}
