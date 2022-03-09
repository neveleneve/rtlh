<?php

namespace App\Http\Controllers;

use App\Models\kecamatan;
use App\Models\kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function selectkotakab(Request $data)
    {
        if ($data) {
            $returndata = null;
            if ($data->kotakab == 'all') {
                $kecamatan = DB::table('kecamatans')
                ->join('kotakabs', 'kecamatans.kotakab_id', '=', 'kotakabs.id')
                ->join('provinsis', 'kotakabs.provinsi_id', '=', 'provinsis.id')
                ->where('provinsis.id', Auth::user()->daerah_id)
                ->select('kecamatans.*')
                ->get();
            } else {
                $kecamatan = kecamatan::where('kotakab_id', $data->kotakab)->orderBy('id')->get();
            }
            foreach ($kecamatan as $key) {
                $returndata .= "<option value=" . $key->id . ">" . ucwords(strtolower($key->name));
            }
            // tambahkan fungsi untuk tampil data pada tabel
            return json_encode($returndata);
        }
    }

    public function selectkecamatan(Request $data)
    {
        if ($data) {
            $returndata = null;
            if ($data->kecamatan == 'all') {
                $kelurahan = DB::table('kelurahans')
                ->join('kecamatans', 'kelurahans.kecamatan_id', '=', 'kecamatans.id')
                ->join('kotakabs', 'kecamatans.kotakab_id', '=', 'kotakabs.id')
                ->join('provinsis', 'kotakabs.provinsi_id', '=', 'provinsis.id')
                ->where('provinsis.id', Auth::user()->daerah_id)
                ->select('kelurahans.*')
                ->get();
            } else {
                $kelurahan = kelurahan::where('kecamatan_id', $data->kecamatan)->orderBy('id')->get();
            }
            foreach ($kelurahan as $key) {
                $returndata .= "<option value=" . $key->id . ">" . ucwords(strtolower($key->name));
            }
            // tambahkan fungsi untuk tampil data pada tabel
            return json_encode($returndata);
        }
    }

    public function selectkelurahan(Request $data)
    {
        # code...
    }

    public function pilihkelurahan(Request $data)
    {
        if ($data) {
            $returndata = null;
            if ($data->id == 'all') {
                $kelurahan = kelurahan::get();
            } else {
                $kelurahan = kelurahan::where('kecamatan_id', $data->id)->get();
            }
            foreach ($kelurahan as $key) {
                $returndata .= "<option value=" . $key->id . ">" . ucwords(strtolower($key->name));
            }
            return json_encode($returndata);
        }
    }
}
