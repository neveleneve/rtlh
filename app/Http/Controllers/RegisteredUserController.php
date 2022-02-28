<?php

namespace App\Http\Controllers;

use App\Models\kecamatan;
use App\Models\nilai_pembobotan;
use App\Models\pembobotan;
use App\Models\pendaftar_rtlh;
use App\Rules\cekkkchar;
use App\Rules\cekkklength;
use App\Rules\ceknikchar;
use App\Rules\cekniklength;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $datadaftar = pendaftar_rtlh::where('status', 0)->count();
        $dataterverifikasi = pendaftar_rtlh::where('status', 1)->count();
        return view('generalauth.dashboard', [
            'terdaftar' => $datadaftar,
            'terverifikasi' => $dataterverifikasi,
        ]);
    }

    // Halaman Data KK
    public function datakk()
    {
        $data = pendaftar_rtlh::orderBy('status')
            ->get();
        $databobot = pembobotan::get();
        $nilai_pembobotan = [];
        for ($i = 0; $i < count($databobot); $i++) {
            $datanilaibobot = nilai_pembobotan::where('id_pembobotan', $databobot[$i]['id'])->get();
            $nilai_pembobotan[$i] = $datanilaibobot;
        }
        $datadaerah = kecamatan::where('kotakab_id', Auth::user()->daerah_id)->get();
        if (Auth::user()->level == 0) {
            $datas = [
                'data' => $data,
            ];
        } elseif (Auth::user()->level == 1) {
            $datas = [
                'data' => $data,
                'pembobotan' => $databobot,
                'nilai_pembobotan' => $nilai_pembobotan,
                'data_daerah' => $datadaerah,
            ];
        }
        return view('generalauth.datakk', $datas);
    }

    public function viewdatakk($id)
    {
        $data = pendaftar_rtlh::where('no_kk', $id)
            ->get();
        $datanilai = DB::table('penilaians')
            ->join('pembobotans', 'penilaians.id_pembobotan', '=', 'pembobotans.id')
            ->where('penilaians.no_kk', $id)
            ->get();
        return view('generalauth.datakk_view', [
            'data' => $data,
            'nilai_pembobotan' => $datanilai,
        ]);
    }

    public function setting()
    {
        return view('generalauth.setting');
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
