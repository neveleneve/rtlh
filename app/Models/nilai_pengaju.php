<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai_pengaju extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_kk',
        'nilai_wp',
    ];
}
