<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai_pembobotan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pembobotan',
        'nama',
        'value',
    ];
}
