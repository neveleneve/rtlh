<?php

namespace App\Http\Controllers;

use App\Models\pembobotan;
use App\Models\pendaftar_rtlh;
use App\Rules\cekkkchar;
use App\Rules\cekkklength;
use App\Rules\ceknikchar;
use App\Rules\cekniklength;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('generalauth.dashboard');
    }

    // Halaman Data KK
    public function datakk()
    {
        $data = pendaftar_rtlh::orderBy('created_at')->get();
        return view('generalauth.datakk', [
            'data' => $data
        ]);
    }
    
    public function viewdatakk($id)
    {
        $data = pendaftar_rtlh::where('no_kk', $id)->get();
        // if ($data[0]['status'] == 0) {
        return view('generalauth.datakk_view', [
            'data' => $data
        ]);
        // } else {
        //     return redirect(route('datakk'))->with([
        //         'pemberitahuan' => 'Data KK Sudah diverifikasi oleh administrator provinsi!',
        //         'warna' => 'danger',
        //     ]);
        // }
    }
    
    public function setting()
    {
        # code...
    }
    public function bobot()
    {
        $data = pembobotan::get();
        $no = 1;
        return view('generalauth.bobot', [
            'data' => $data,
            'no' => $no,
            'sumbobot' => 0,
        ]);
    }
}
