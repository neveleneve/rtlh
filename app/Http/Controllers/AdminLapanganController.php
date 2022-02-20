<?php

namespace App\Http\Controllers;


use App\Models\pembobotan;
use App\Models\pendaftar_rtlh;
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

        if (pendaftar_rtlh::where('no_kk', $data->nokk)->exists()) {
            $pemberitahuan = 'Data yang diinput sudah ada!';
            $warna = 'danger';
        } else {
            pendaftar_rtlh::insert([
                'no_kk' => $data->nokk,
                'nik' => $data->nik,
                'nama' => $data->nama,
                'alamat' => $data->alamat,
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $pemberitahuan = 'Data berhasil diinput!';
            $warna = 'success';
        }
        return redirect(route('datakk'))->with([
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
        pendaftar_rtlh::where('no_kk', $data->nokk)->update([
            'nik' => $data->nik,
            'nama' => $data->nama,
            'alamat' => $data->alamat,
        ]);
        return redirect(route('viewdatakk', ['id' => $data->nokk]))->with([
            'pemberitahuan' => 'Berhasil mengubah data pengaju!',
            'warna' => 'success',
        ]);
    }
}
