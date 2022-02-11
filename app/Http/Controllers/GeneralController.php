<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function kriteria()
    {
        return view('kriteria');
    }
}
