<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestasi extends Model
{
    use HasFactory;
    
    protected $table = 'prestasi';

    protected $fillable = [
        'nama_peserta',
        'nama_lomba',
        'tingkat',
        'juara',
        'tahun',
        'url_file',
        'public_id',
    ];
}