<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PesertaDidik extends Model
{
    use HasFactory;
    
    protected $table = 'peserta_didik';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'kelas',
        'url_file',
        'public_id',
    ];
}
