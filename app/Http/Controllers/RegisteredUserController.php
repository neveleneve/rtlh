<?php

namespace App\Http\Controllers;

use App\Models\kecamatan;
use App\Models\kotakab;
use App\Models\nilai_pembobotan;
use App\Models\pembobotan;
use App\Models\pendaftar_rtlh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        DB::enableQueryLog();
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
    public function datakk(Request $data)
    {
        $wherearraykecamatan = [];
        $wherearraykelurahan = [];
        $wherearraydatartlh = [];
        $wherearraydatartlhsearch = null;
        if (Auth::user()->level == 0) {
            if (count($data->all()) > 1) {
                if ($data->kotakab == 'all') {
                    $wherearraykecamatan += [
                        'kotakabs.provinsi_id' => Auth::user()->daerah_id,
                    ];
                    $wherearraykelurahan += [
                        'kotakabs.provinsi_id' => Auth::user()->daerah_id,
                    ];
                    $wherearraydatartlh += [
                        'provinsis.id' => Auth::user()->daerah_id
                    ];
                } else {
                    $wherearraykecamatan += [
                        'kotakabs.provinsi_id' => Auth::user()->daerah_id,
                        'kecamatans.kotakab_id' => $data->kotakab
                    ];
                    $wherearraykelurahan += [
                        'kotakabs.provinsi_id' => Auth::user()->daerah_id,
                        'kecamatans.kotakab_id' => $data->kotakab
                    ];
                    $wherearraydatartlh += [
                        'provinsis.id' => Auth::user()->daerah_id,
                        'kecamatans.kotakab_id' => $data->kotakab
                    ];
                }
                if ($data->kecamatan == 'all') {
                } else {
                    $wherearraykelurahan += [
                        'kelurahans.kecamatan_id' => $data->kecamatan
                    ];
                    $wherearraydatartlh += [
                        'kelurahans.kecamatan_id' => $data->kecamatan
                    ];
                }
                if ($data->kelurahan == 'all') {
                } else {
                    $wherearraydatartlh += [
                        'kelurahans.id' => $data->kelurahan
                    ];
                }
                if ($data->pencarian == '' || $data->pencarian == null) {
                    $data = DB::table('pendaftar_rtlhs')
                        ->join('kelurahans', 'pendaftar_rtlhs.kelurahan_id', '=', 'kelurahans.id')
                        ->join('kecamatans', 'kelurahans.kecamatan_id', '=', 'kecamatans.id')
                        ->join('kotakabs', 'kecamatans.kotakab_id', '=', 'kotakabs.id')
                        ->join('provinsis', 'kotakabs.provinsi_id', '=', 'provinsis.id')
                        ->select([
                            'pendaftar_rtlhs.no_kk',
                            'pendaftar_rtlhs.nama',
                            'pendaftar_rtlhs.status',
                            'kelurahans.name as kelurahan',
                            'kecamatans.name as kecamatan',
                            'kotakabs.name as kotakab',
                        ])
                        ->orderBy('status')
                        ->where($wherearraydatartlh)
                        ->paginate(10);
                } else {
                    $wherearraydatartlhsearch = DB::raw('(pendaftar_rtlhs.nama like "%' . $data->pencarian . '%" or pendaftar_rtlhs.no_kk like "%' . $data->pencarian . '%" or pendaftar_rtlhs.nik like "%' . $data->pencarian . '%")');
                    $data = DB::table('pendaftar_rtlhs')
                        ->join('kelurahans', 'pendaftar_rtlhs.kelurahan_id', '=', 'kelurahans.id')
                        ->join('kecamatans', 'kelurahans.kecamatan_id', '=', 'kecamatans.id')
                        ->join('kotakabs', 'kecamatans.kotakab_id', '=', 'kotakabs.id')
                        ->join('provinsis', 'kotakabs.provinsi_id', '=', 'provinsis.id')
                        ->select([
                            'pendaftar_rtlhs.no_kk',
                            'pendaftar_rtlhs.nama',
                            'pendaftar_rtlhs.status',
                            'kelurahans.name as kelurahan',
                            'kecamatans.name as kecamatan',
                            'kotakabs.name as kotakab',
                        ])
                        ->orderBy('status')
                        ->where($wherearraydatartlh)
                        ->whereRaw($wherearraydatartlhsearch)
                        ->paginate(10);
                }
            } else {
                $wherearraykecamatan += [
                    'kotakabs.provinsi_id' => Auth::user()->daerah_id,
                ];
                $wherearraykelurahan += [
                    'kotakabs.provinsi_id' => Auth::user()->daerah_id,
                ];
                $wherearraydatartlh += [
                    'provinsis.id' => Auth::user()->daerah_id,
                ];
                $data = DB::table('pendaftar_rtlhs')
                    ->join('kelurahans', 'pendaftar_rtlhs.kelurahan_id', '=', 'kelurahans.id')
                    ->join('kecamatans', 'kelurahans.kecamatan_id', '=', 'kecamatans.id')
                    ->join('kotakabs', 'kecamatans.kotakab_id', '=', 'kotakabs.id')
                    ->join('provinsis', 'kotakabs.provinsi_id', '=', 'provinsis.id')
                    ->select([
                        'pendaftar_rtlhs.no_kk',
                        'pendaftar_rtlhs.nama',
                        'pendaftar_rtlhs.status',
                        'kelurahans.name as kelurahan',
                        'kecamatans.name as kecamatan',
                        'kotakabs.name as kotakab',
                    ])
                    ->orderBy('status')
                    ->where($wherearraydatartlh)
                    ->paginate(10);
            }
            $datakotakab = kotakab::where([
                'provinsi_id' => Auth::user()->daerah_id
            ])->get();
            $datakecamatan = DB::table('kecamatans')
                ->join('kotakabs', 'kecamatans.kotakab_id', '=', 'kotakabs.id')
                ->where($wherearraykecamatan)
                ->select('kecamatans.*')
                ->get();
            $datakelurahan = DB::table('kelurahans')
                ->join('kecamatans', 'kelurahans.kecamatan_id', '=', 'kecamatans.id')
                ->join('kotakabs', 'kecamatans.kotakab_id', '=', 'kotakabs.id')
                ->where($wherearraykelurahan)
                ->select('kelurahans.*')
                ->get();
            $datas = [
                'data' => $data,
                'datakotakab' => $datakotakab,
                'datakecamatan' => $datakecamatan,
                'datakelurahan' => $datakelurahan,
            ];
        } elseif (Auth::user()->level == 1) {
            if ($data->pencarian == '' || $data->pencarian == null) {
                $data = DB::table('pendaftar_rtlhs')
                    ->join('kelurahans', 'pendaftar_rtlhs.kelurahan_id', '=', 'kelurahans.id')
                    ->join('kecamatans', 'kelurahans.kecamatan_id', '=', 'kecamatans.id')
                    ->join('kotakabs', 'kecamatans.kotakab_id', '=', 'kotakabs.id')
                    ->join('provinsis', 'kotakabs.provinsi_id', '=', 'provinsis.id')
                    ->select([
                        'pendaftar_rtlhs.no_kk',
                        'pendaftar_rtlhs.nama',
                        'pendaftar_rtlhs.status',
                        'kelurahans.name as kelurahan',
                        'kecamatans.name as kecamatan',
                        'kotakabs.name as kotakab',
                    ])
                    ->where('kotakabs.id', Auth::user()->daerah_id)
                    ->paginate(10);
            } else {
                $wherearraydatartlhsearch = DB::raw('(pendaftar_rtlhs.nama like "%' . $data->pencarian . '%" or pendaftar_rtlhs.no_kk like "%' . $data->pencarian . '%" or pendaftar_rtlhs.nik like "%' . $data->pencarian . '%")');
                $data = DB::table('pendaftar_rtlhs')
                    ->join('kelurahans', 'pendaftar_rtlhs.kelurahan_id', '=', 'kelurahans.id')
                    ->join('kecamatans', 'kelurahans.kecamatan_id', '=', 'kecamatans.id')
                    ->join('kotakabs', 'kecamatans.kotakab_id', '=', 'kotakabs.id')
                    ->join('provinsis', 'kotakabs.provinsi_id', '=', 'provinsis.id')
                    ->select([
                        'pendaftar_rtlhs.no_kk',
                        'pendaftar_rtlhs.nama',
                        'pendaftar_rtlhs.status',
                        'kelurahans.name as kelurahan',
                        'kecamatans.name as kecamatan',
                        'kotakabs.name as kotakab',
                    ])
                    ->where('kotakabs.id', Auth::user()->daerah_id)
                    ->whereRaw($wherearraydatartlhsearch)
                    ->paginate(10);
            }
            $databobot = pembobotan::get();
            $nilai_pembobotan = [];
            for ($i = 0; $i < count($databobot); $i++) {
                $datanilaibobot = nilai_pembobotan::where('id_pembobotan', $databobot[$i]['id'])->get();
                $nilai_pembobotan[$i] = $datanilaibobot;
            }
            $datadaerah = kecamatan::where('kotakab_id', Auth::user()->daerah_id)->get();
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

    public function updatesetting(Request $data)
    {
        if ($data->old_password ==  null  || $data->password == null || $data->password_confirmation == null) {
            echo 'kosong';
        } else {
            $data->validate([
                'password'=> 'required|confirmed|min:8'
            ]);
            echo 'ada';
            # code...
        }
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
