<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class RTLHExport implements FromView
{
    public function view(): View
    {
        $data = DB::table('pendaftar_rtlhs')
            ->join('nilai_pengajus', 'pendaftar_rtlhs.no_kk', '=', 'nilai_pengajus.no_kk')
            ->orderBy('nilai_wp', 'desc')
            ->get()
            ->all();
        return view('admin.cetak-rtlh', [
            'data' => $data
        ]);
    }
}
