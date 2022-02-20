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
            <div class="alert bg-{{session('warna')}} alert-dismissable text-center text-light font-weight-bold" role="alert">
                {{ session('pemberitahuan') }}
                <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-hidden="true"></button>
            </div>
        </div>
    </div>
    @endif
    <div class="row mb-3">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table border table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            @if (Auth::user()-> level == 0)
                            <th>Aksi</th>
                            @endif
                            <th>No</th>
                            <th>Nama Bobot</th>
                            <th>Kategori Bobot</th>
                            <th>Nilai Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                        <tr>
                            @if (Auth::user()-> level == 0)
                            <td>
                                <a href="{{ route('viewbobot', ['id'=> $item->id]) }}" class="btn btn-xs btn-dark">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                            @endif
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->sifat == 0 ? 'Biaya' : 'Keuntungan' }}</td>
                            <td>{{ $item->bobot }}</td>
                        </tr>
                        @php
                        $sumbobot += $item->bobot;
                        @endphp
                        @empty
                        <tr>
                            <td colspan="{{ Auth::user()->level == 0 ? '5' : '4' }}">
                                <h4 class="text-center">Data Pembobotan Kosong</h4>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot class="table-dark fw-bold">
                        <tr>
                            <td colspan="{{ Auth::user()->level == 0 ? '4' : '3' }}" class="text-center">
                                Jumlah Nilai Bobot
                            </td>
                            <td>
                                {{ $sumbobot }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection