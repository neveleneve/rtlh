@extends('layouts.master')

@section('title')
<title>Pendataan RTLH</title>
@endsection

@section('content')
<div class="container mt-5 pt-5">
    <div class="row mb-3">
        <div class="col-12">
            @include('layouts.nav')
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-3 mb-3 mb-lg-0">
            <input type="text" class="form-control form-control-sm" placeholder="Pencarian...">
        </div>
        <div class="col-0 col-lg-6">

        </div>
        @if (count($data) > 0)
        <div class="col-12 col-lg-3 d-grid gap-2">
            <a class="btn btn-xs btn-dark float-end" type="button" href="#" data-bs-toggle="modal" data-bs-target="#modalcetak">
                Cetak Data RTLH
            </a>
        </div>
        @endif
    </div>
    <div class="row mb-3">
        <div class="col-12">
            * Data 50 penerima dengan hasil penilaian tertinggi dianggap lolos
            <div class="table-responsive">
                <table class="table table-hover border text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>No. KK</th>
                            <th>Nama Kepala Keluarga</th>
                            <th>Alamat</th>
                            <th>Nilai</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @forelse ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->no_kk }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ ucwords($item->alamat) }}</td>
                            <td>{{ $item->nilai_wp }}</td>
                            <td>
                                {{ $loop->index+1 <= 50 ? 'Lolos' : 'Tidak Lolos' }} </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <h4 class="text-center">Data Kosong</h4>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@if (count($data)>0)
<div class="modal fade" id="modalcetak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Jenis Cetak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 d-grid gap-2">
                        <a href="{{ route('cetakdatartlhpdf') }}" target="__blank" class="btn btn-dark">Format PDF</a>
                    </div>
                    <div class="col-12 d-grid gap-2">
                        <a href="{{ route('cetakdatartlhexcel') }}" target="__blank" class="btn btn-dark">Format Excel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection