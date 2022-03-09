@extends('layouts.master')

@section('title')
<title>Lihat Bobot Penilaian</title>
@endsection

@section('content')
<div class="container mt-5 pt-5">
    <div class="row mb-3">
        <div class="col-12">
            @include('layouts.nav')
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-3 d-grid gap-2">
            <a class="btn btn-danger" href="{{ route('bobot') }}">
                <i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Kembali
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <p><strong>Nama Kriteria :</strong> {{ $databobot[0]['nama'] }}</p>
        </div>
        <div class="col-6">
            <p><strong>Bobot Kriteria :</strong> {{ $databobot[0]['bobot'] }}</p>
        </div>
        <div class="col-6">
            <p><strong>Keterangan :</strong> {{ $databobot[0]['keterangan'] }}</p>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table border table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Pilihan</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($datanilaibobot as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ ucwords($item->nama) }}</td>
                            <td>{{ $item->value }}</td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection