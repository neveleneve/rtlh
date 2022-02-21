<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembobotan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'sifat',
        'bobot',
        'id_nama',
    ];
}
