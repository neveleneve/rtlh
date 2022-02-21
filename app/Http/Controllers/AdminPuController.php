<?php

namespace App\Http\Controllers;

use App\Models\nilai_pembobotan;
use App\Models\nilai_pengaju;
use App\Models\pembobotan;
use App\Models\pendaftar_rtlh;
use App\Models\penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPuController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'adminpupr']);
    }

    // function hitung nilai S pada weight product
    private function vectorS($c, $w, $tipe)
    {
        $s = null;
        for ($i = 0; $i < count($c); $i++) {
            if ($i == 0) {
                if ($tipe[$i] == 0) {
                    $s = number_format(pow($c[$i], $w[$i]), 3, '.', ',');
                } elseif ($tipe[$i] == 1) {
                    $s = number_format(pow($c[$i], (-$w[$i])), 3, '.', ',');
                }
            } else {
                if ($tipe[$i] == 0) {
                    $s = $s *  number_format(pow($c[$i], $w[$i]), 3, '.', ',');
                } elseif ($tipe[$i] == 1) {
                    $s = $s * number_format(pow($c[$i], (-$w[$i])), 3, '.', ',');
                }
            }
        }
        return number_format($s, 3, '.', ',');
    }

    public function datartlh()
    {
        $data = DB::table('pendaftar_rtlhs')
            ->join('nilai_pengajus', 'pendaftar_rtlhs.no_kk', '=', 'nilai_pengajus.no_kk')
            ->orderBy('nilai_wp', 'desc')
            ->get();
        // dd($data);
        return view('admin.datartlh', [
            'data' => $data,
            'no' => 1,
        ]);
    }

    public function dataverifikasi()
    {
        return view('admin.dataverifikasi');
    }

    public function verifdatakk($id)
    {
        $data = pendaftar_rtlh::where('no_kk', $id)
            ->get();
        $datanilai = DB::table('penilaians')
            ->join('pembobotans', 'penilaians.id_pembobotan', '=', 'pembobotans.id')
            ->where('penilaians.no_kk', $id)
            ->get();
        $w = [];
        $c = [];
        $tipe = [];
        $sumbobot = 0;
        for ($i = 0; $i < count($datanilai); $i++) {
            $sumbobot += $datanilai[$i]->bobot;
        }
        for ($i = 0; $i < count($datanilai); $i++) {
            array_push($w, number_format($datanilai[$i]->bobot / $sumbobot, 3, '.', ','));
            array_push($tipe, $datanilai[$i]->sifat);
            array_push($c, $datanilai[$i]->nilai);
        }
        if ($data[0]['status'] == 0) {
            $s = $this->vectorS($c, $w, $tipe);
            return view('admin.datakk_verif', [
                'data' => $data,
                'nilai_pembobotan' => $datanilai,
                'hasil_pembobotan' => $s,
            ]);
        } else {
            return redirect(route('datakk'))->with([
                'pemberitahuan' => 'Data KK yang akan diverifikasi sudah terverifikasi!',
                'warna' => 'danger',
            ]);
        }
    }

    public function viewbobot($id)
    {
        $databobot = pembobotan::where('id', $id)
            ->get();
        $datanilaibobot = nilai_pembobotan::where('id_pembobotan', $id)
            ->get();
        return view('admin.bobot_view', [
            'databobot' => $databobot,
            'datanilaibobot' => $datanilaibobot,
            'no' => 1,
        ]);
    }

    public function verifikasi(Request $data)
    {
        nilai_pengaju::create([
            'no_kk' => $data->no_kk,
            'nilai_wp' => number_format($data->hasil, 3, '.', ','),
        ]);
        pendaftar_rtlh::where('no_kk', $data->no_kk)
            ->update([
                'status' => 1,
            ]);
        return redirect(route('datakk'))->with([
            'pemberitahuan' => 'Berhasil Input Penilaian No KK : ' . $data->no_kk,
            'warna' => 'success',
        ]);
    }

    public function administrator()
    {
        return view('admin.administrator');
    }
}
