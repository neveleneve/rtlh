<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_kk',
        'id_pembobotan',
        'nilai',
    ];
}
