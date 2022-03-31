@extends('layouts.master')

@section('title')
<title>Verifikasi Data Pengaju</title>
@endsection

@section('content')
<div class="container mt-5 pt-5">
    {{-- <div class="row mb-3">
        <div class="col-12">
            @include('layouts.nav')
        </div>
    </div> --}}
    <div class="card">
        <div class="card-header border-bottom bg-dark">
            <h3 class="h2 text-center text-white">
                Verifikasi Pengaju RTLH
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <label for="nokk">Nomor Kartu Keluarga</label>
                    <p class="form-control">{{$data[0]['no_kk']}}</p>
                    <input type="hidden" name="nokk" value="{{$data[0]['no_kk']}}">
                </div>
                <div class="col-12 col-lg-6">
                    <label for="nik">NIK Kepala Keluarga</label>
                    <p class="form-control">{{$data[0]['nik']}}</p>
                </div>
                <div class="col-12 col-lg-6">
                    <label for="nama">Nama Kepala Keluarga</label>
                    <p class="form-control">{{$data[0]['nama']}}</p>
                </div>
                <div class="col-12">
                    <label for="alamat">Alamat (Sesuai KK)</label>
                    <p class="form-control">{{$data[0]['alamat']}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <label for="fotonik">Gambar Kartu Keluarga</label>
                    <a href="{{ asset('images/kk/'.$data[0]['no_kk'].'.jpg') }}" data-toggle="lightbox">
                        <img src="{{ asset('images/kk/'.$data[0]['no_kk'].'.jpg') }}" class="img-fluid img-thumbnail">
                    </a>
                </div>
                <div class="col-12 col-lg-6 mb-3">
                    <label for="fotonik">Gambar NIK Kepala Keluarga</label>
                    <a href="{{ asset('images/ktp/' . $data[0]['nik'] . '.jpg') }}" id="fotonik" data-toggle="lightbox">
                        <img src="{{ asset('images/ktp/' . $data[0]['nik'] . '.jpg') }}" class="img-fluid img-thumbnail">
                    </a>
                </div>
                <div class="col-12 mb-3 border-bottom">
                    <h3 class="text-center fw-bold">
                        Hasil Penilaian Sistem
                    </h3>
                </div>
                <form action="{{ route('verifikasi') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="no_kk" value="{{ $data[0]['no_kk'] }}">
                    @forelse ($nilai_pembobotan as $item)
                    <div class="col-12 mb-3">
                        <label for="{{ $item->id_nama }}">{{ ucwords($item->nama_kriteria) }} (Bobot : {{ $item->bobot }} Poin)</label>
                        <input class="form-control" type="text" name="{{ $item->id_nama }}" id="{{ $item->id_nama }}" value="{{ ucwords(strtolower($item->nama_nilai)) }} (Nilai : {{ $item->nilai }} poin)" readonly>
                    </div>
                    @empty

                    @endforelse
                    <div class="col-12 mb-3">
                        <label for="hasil">Hasil Penilaian</label>
                        <input class="form-control" type="text" name="hasil" id="hasil" value="{{ $hasil_pembobotan }}" readonly>
                    </div>
                    <div class="col-12 d-grid gap-2">
                        <button class="btn btn-dark" type="submit" onclick="return confirm('Verifikasi data pengaju dengan nomor KK : '+ {{ $data[0]['no_kk'] }})">
                            <i class="fa fa-user-check"></i>&nbsp;&nbsp;Verifikasi Pengaju
                        </button>
                    </div>
                </form>
                <div class="col-12 d-grid gap-2 mb-3">
                    <a class="btn btn-danger" href="{{ route('viewdatakk', ['id' => $data[0]['no_kk']]) }}">
                        <i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Kembali Ke Data Pengaju
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection