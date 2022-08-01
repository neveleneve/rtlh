@extends('layouts.master')

@section('title')
    <title>Bobot Penilaian</title>
@endsection

@section('content')
    <div class="container mt-5 pt-5">
        <div class="row mb-3">
            <div class="col-12">
                @include('layouts.nav')
            </div>
        </div>
        @if ($errors->any())
            <div class="row mb-3">
                <div class="col-12">
                    <div class="alert bg-danger alert-dismissable text-center text-light font-weight-bold" role="alert">
                        {{ implode('', $errors->all(':message')) }}
                        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-hidden="true"></button>
                    </div>
                </div>
            </div>
        @endif
        @if (Session::has('pemberitahuan'))
            <div class="row mb-3">
                <div class="col-12">
                    <div class="alert bg-{{ session('warna') }} alert-dismissable text-center text-light font-weight-bold"
                        role="alert">
                        {{ session('pemberitahuan') }}
                        <button type="button" class="btn-close float-end" data-bs-dismiss="alert"
                            aria-hidden="true"></button>
                    </div>
                </div>
            </div>
        @endif
        <div class="row mb-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table border fw-bold table-hover text-center">
                        <thead class="table-dark ">
                            <tr>
                                @if (Auth::user()->level == 0)
                                    <th></th>
                                @elseif(Auth::user()->level == 1)
                                    <th>No</th>
                                @endif
                                <th>Nama Kriteria</th>
                                <th>Kategori Kriteria</th>
                                <th>Bobot Kriteria</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    @if (Auth::user()->level == 0)
                                        <td>
                                            <a title="Lihat Pilihan Kriteria"
                                                href="{{ route('viewbobot', ['id' => $item->id]) }}"
                                                class="badge bg-dark text-white">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    @elseif(Auth::user()->level == 1)
                                        <td>{{ $no++ }}</td>
                                    @endif
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->sifat == 0 ? 'Benefit' : 'Cost' }}</td>
                                    <td>{{ $item->bobot }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                </tr>
                                @php
                                    $sumbobot += $item->bobot;
                                @endphp
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <h4 class="text-center">Data Pembobotan Kosong</h4>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot class="table-dark fw-bold">
                            <tr>
                                <td colspan="3" class="text-center">
                                    Jumlah Nilai Bobot
                                </td>
                                <td>
                                    {{ $sumbobot }}
                                </td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
