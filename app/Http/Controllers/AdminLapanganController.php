<?php

namespace App\Http\Controllers;


use App\Models\pembobotan;
use App\Models\pendaftar_rtlh;
use App\Models\penilaian;
use App\Rules\cekkkchar;
use App\Rules\cekkklength;
use App\Rules\ceknikchar;
use App\Rules\cekniklength;
use Illuminate\Http\Request;

class AdminLapanganController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'adminlapangan']);
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
            'alamat' => [
                'required',
            ],
        ]);
        $nilai = $data->nilai;
        $idbobot = array_keys($nilai);
        for ($i = 0; $i < count($idbobot); $i++) {
            penilaian::create([
                'no_kk' => $data->nokk,
                'id_pembobotan' => $idbobot[$i],
                'nilai' => $nilai[$idbobot[$i]],
            ]);
        }
        if (pendaftar_rtlh::where('no_kk', $data->nokk)->exists()) {
            $pemberitahuan = 'Data yang diinput sudah ada!';
            $warna = 'danger';
        } else {
            pendaftar_rtlh::create([
                'no_kk' => $data->nokk,
                'nik' => $data->nik,
                'nama' => $data->nama,
                'alamat' => $data->alamat,
                'status' => 0,
            ]);
            $pemberitahuan = 'Data berhasil diinput!';
            $warna = 'success';
        }
        return redirect(route('datakk'))
            ->with([
                'pemberitahuan' => $pemberitahuan,
                'warna' => $warna,
            ]);
    }

    public function updatedatakk(Request $data)
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
            'alamat' => [
                'required',
            ],
        ]);
        $cekdata = pendaftar_rtlh::where('no_kk', $data->nokk)
            ->get();
        if ($cekdata[0]['status'] == 0) {
            pendaftar_rtlh::where('no_kk', $data->nokk)->update([
                'nik' => $data->nik,
                'nama' => $data->nama,
                'alamat' => $data->alamat,
            ]);
            $pemberitahuan = 'Berhasil mengubah data pengaju!';
            $warna = 'success';
            $route = 'viewdatakk';
            $param = ['id' => $data->nokk];
        } else {
            $pemberitahuan = 'Data pengaju yang sudah diverifikasi tidak dapat diubah!';
            $warna = 'success';
            $route = 'datakk';
            $param = null;
        }
        return redirect(route('viewdatakk', ['id' => $data->nokk]))
            ->with([
                'pemberitahuan' => $pemberitahuan,
                'warna' => $warna,
            ]);
    }
}
