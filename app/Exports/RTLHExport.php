<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class RTLHExport implements FromView
{
    protected $tahun;

    public function __construct($tahun)
    {
        $this->tahun = $tahun;
    }
    public function view(): View
    {
        if ($this->tahun == 'all') {
            $data = DB::table('pendaftar_rtlhs')
                ->join('nilai_pengajus', 'pendaftar_rtlhs.no_kk', '=', 'nilai_pengajus.no_kk')
                ->orderBy('nilai_wp', 'desc')
                ->get()
                ->all();
        } else {
            $data = DB::table('pendaftar_rtlhs')
                ->join('nilai_pengajus', 'pendaftar_rtlhs.no_kk', '=', 'nilai_pengajus.no_kk')
                ->where('pendaftar_rtlhs.tahun_anggaran', $this->tahun)
                ->orderBy('nilai_wp', 'desc')
                ->get()
                ->all();
        }
        return view('admin.cetak-rtlh', [
            'data' => $data,
            'tahun' => $this->tahun,
        ]);
    }
}
