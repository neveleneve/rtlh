<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPuController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'adminpupr']);
    }
}
