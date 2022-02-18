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
            ]);
            $pemberitahuan = 'Data berhasil diinput!';
            $warna = 'success';
        }
        return redirect(route('datakk'))->with([
            'pemberitahuan' => $pemberitahuan,
            'warna' => $warna,
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
