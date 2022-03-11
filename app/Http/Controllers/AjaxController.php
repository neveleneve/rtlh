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
            $returndata = [
                'kecamatan' => null,
                'kelurahan' => null,
            ];
            if ($data->kotakab == 'all') {
                $kecamatan = DB::table('kecamatans')
                    ->join('kotakabs', 'kecamatans.kotakab_id', '=', 'kotakabs.id')
                    ->join('provinsis', 'kotakabs.provinsi_id', '=', 'provinsis.id')
                    ->where('provinsis.id', Auth::user()->daerah_id)
                    ->select('kecamatans.*')
                    ->get();
                $kelurahan = DB::table('kelurahans')
                    ->join('kecamatans', 'kelurahans.kecamatan_id', '=', 'kecamatans.id')
                    ->join('kotakabs', 'kecamatans.kotakab_id', '=', 'kotakabs.id')
                    ->join('provinsis', 'kotakabs.provinsi_id', '=', 'provinsis.id')
                    ->where('provinsis.id', Auth::user()->daerah_id)
                    ->select('kelurahans.*')
                    ->get();
            } else {
                $kecamatan = kecamatan::where('kotakab_id', $data->kotakab)->orderBy('id')->get();
                $kelurahan = DB::table('kelurahans')
                    ->join('kecamatans', 'kelurahans.kecamatan_id', '=', 'kecamatans.id')
                    ->join('kotakabs', 'kecamatans.kotakab_id', '=', 'kotakabs.id')
                    ->join('provinsis', 'kotakabs.provinsi_id', '=', 'provinsis.id')
                    ->where([
                        'provinsis.id' => Auth::user()->daerah_id,
                        'kotakabs.id' => $data->kotakab,
                    ])
                    ->select('kelurahans.*')
                    ->get();
            }
            foreach ($kecamatan as $key) {
                $returndata['kecamatan'] .= "<option value=" . $key->id . ">" . ucwords(strtolower($key->name));
            }
            foreach ($kelurahan as $key) {
                $returndata['kelurahan'] .= "<option value=" . $key->id . ">" . ucwords(strtolower($key->name));
            }
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
            return json_encode($returndata);
        }
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
