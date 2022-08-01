<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftar_rtlh extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_kk',
        'nik',
        'nama',
        'alamat',
        'status',
        'kelurahan_id',
        'tahun_anggaran',
    ];
}
