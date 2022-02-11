<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.dashboard');
    }
    
    public function datartlh()
    {
        return view('admin.datartlh');
    }

    public function dataverifikasi()
    {
        return view('admin.dataverifikasi');
    }

    public function datakk()
    {
        return view('admin.datakk');
    }
}
