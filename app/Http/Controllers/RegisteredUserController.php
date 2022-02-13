<?php

namespace App\Http\Controllers;

use App\Models\pendaftar_rtlh;
use App\Rules\cekkkchar;
use App\Rules\cekkklength;
use App\Rules\ceknikchar;
use App\Rules\cekniklength;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $data = pendaftar_rtlh::get();
        return view('admin.datakk', [
            'data' => $data
        ]);
    }
    public function adddatakk(Request $data)
    {
        $data->validate([
            'nama' => 'required',
            'nokk' => [
                'required',
                new cekkkchar(),
                new cekkklength(),
            ],
            'nik' => [
                'required',
                new ceknikchar(),
                new cekniklength(),
            ],
        ]);

        // dd($validator);
        dd($data->all());
    }
}
