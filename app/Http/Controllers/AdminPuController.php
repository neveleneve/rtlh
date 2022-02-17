<?php

namespace App\Http\Controllers;

use App\Models\pendaftar_rtlh;
use Illuminate\Http\Request;

class AdminPuController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'adminpupr']);
    }

    public function datartlh()
    {
        return view('admin.datartlh');
    }

    public function dataverifikasi()
    {
        return view('admin.dataverifikasi');
    }

    public function verifdatakk($id)
    {
        $data = pendaftar_rtlh::where('no_kk', $id)->get();
        return view('admin.datakk_verif', [
            'data' => $data
        ]);
    }
}
