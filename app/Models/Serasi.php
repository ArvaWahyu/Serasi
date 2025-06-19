<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serasi extends Model
{
    use HasFactory;

    protected $table = 'serasi';

    protected $fillable = [
        'nama',
        'npm',
        'email',
        'telpon',
        'kategori',
        'deskripsi_laporan',
        'status',
        'pesan_balasan',
    ];
}
