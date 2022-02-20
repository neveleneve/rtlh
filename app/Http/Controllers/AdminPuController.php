<?php

namespace App\Http\Controllers;

use App\Models\nilai_pembobotan;
use App\Models\pembobotan;
use App\Models\pendaftar_rtlh;
use App\Models\penilaian;
use Illuminate\Http\Request;

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
        return view('admin.datartlh');
    }

    public function dataverifikasi()
    {
        return view('admin.dataverifikasi');
    }

    public function verifdatakk($id)
    {
        $data = pendaftar_rtlh::where('no_kk', $id)->get();
        $pembobotan = pembobotan::get();
        $nilai_pembobotan = [];
        if ($data[0]['status'] == 0) {
            # code...
            for ($i = 0; $i < count($pembobotan); $i++) {
                $datanilaibobot = nilai_pembobotan::where('id_pembobotan', $pembobotan[$i]['id'])->get();
                $nilai_pembobotan[$i] = $datanilaibobot;
            }
            return view('admin.datakk_verif', [
                'data' => $data,
                'pembobotan' => $pembobotan,
                'nilai_pembobotan' => $nilai_pembobotan,
            ]);
        } else {
            return redirect(route('datakk'))->with([
                'pemberitahuan' => 'Data KK yang akan diverifikasi sudah terverifikasi!',
                'warna' => 'danger',
            ]);
        }
    }

    public function verification(Request $data)
    {
        $bobot = pembobotan::get();
        $totalbobot = pembobotan::sum('bobot');
    }

    public function viewbobot($id)
    {
        $databobot = pembobotan::where('id', $id)->get();
        $datanilaibobot = nilai_pembobotan::where('id_pembobotan', $id)->get();
        return view('admin.bobot_view', [
            'databobot' => $databobot,
            'datanilaibobot' => $datanilaibobot,
            'no' => 1,
        ]);
    }

    public function verifikasi(Request $data)
    {
        $datapenilaian = penilaian::where('no_kk', $data->no_kk)->get();
        $nilai = $data->nilai;
        $idbobot = array_keys($nilai);
        // cek jika data sudah ada dengan kondisi tertentu
        if (count($datapenilaian) > 0) {
            penilaian::where('no_kk', $data->no_kk)->delete();
        }
        for ($i = 0; $i < count($idbobot); $i++) {
            penilaian::insert([
                'no_kk' => $data->no_kk,
                'id_pembobotan' => $idbobot[$i],
                'nilai' => $nilai[$idbobot[$i]],
            ]);
        }
        pendaftar_rtlh::where('no_kk', $data->no_kk)->update([
            'status' => 1,
        ]);
        return redirect(route('datakk'))->with([
            'pemberitahuan' => 'Berhasil Input Penilaian No KK : ' . $data->no_kk,
            'warna' => 'success',
        ]);
    }
}
