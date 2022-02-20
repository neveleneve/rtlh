<?php

namespace App\Http\Controllers;

use App\Models\nilai_pembobotan;
use App\Models\pembobotan;
use App\Models\pendaftar_rtlh;
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
        for ($i = 0; $i < count($pembobotan); $i++) {
            $nilai_pembobotan[$i] = nilai_pembobotan::where('id', $i+1)->get();
        }
        dd($nilai_pembobotan);
        return view('admin.datakk_verif', [
            'data' => $data,
            'pembobotan' => $pembobotan,
            'nilai_pembobotan' => $nilai_pembobotan,
        ]);
    }

    public function verification(Request $data)
    {
        $bobot = pembobotan::get();
        $totalbobot = pembobotan::sum('bobot');
    }
}
