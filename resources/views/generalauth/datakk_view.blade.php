@extends('layouts.master')

@section('title')
<title>Lihat Data Pengaju</title>
@endsection

@section('content')
<div class="container mt-5 pt-5">
    {{-- <div class="row mb-3">
        <div class="col-12">
            @include('layouts.nav')
        </div>
    </div> --}}
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
    <div class="card">
        <div class="card-header border-bottom bg-dark">
            <h3 class="h2 text-center text-white">
                Data Pengaju RTLH
            </h3>
        </div>
        <div class="card-body">
            <form action="{{route('updatedatakk')}}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-12 col-lg-6 mb-3">
                        <label for="nokk">Nomor Kartu Keluarga</label>
                        <p class="form-control">{{$data[0]['no_kk']}}</p>
                        <input type="hidden" name="nokk" value="{{$data[0]['no_kk']}}">
                    </div>
                    <div class="col-12 col-lg-6 mb-3">
                        <label for="fotonik">Gambar Kartu Keluarga</label>
                        <a href="https://image.cermati.com/c_fill,fl_progressive,g_north_east,h_800,q_80,w_1200/vnqow2e6z2mbfmiob7w4.jpg" data-toggle="lightbox">
                            <img src="https://image.cermati.com/c_fill,fl_progressive,g_north_east,h_800,q_80,w_1200/vnqow2e6z2mbfmiob7w4.jpg" class="img-fluid img-thumbnail">
                        </a>
                    </div>
                    <div class="col-12 col-lg-6 mb-3">
                        <label for="nik">NIK Kepala Keluarga</label>
                        <input class="form-control" type="text" id="nik" name="nik" value="{{$data[0]['nik']}}">
                    </div>
                    <div class="col-12 col-lg-6 mb-3">
                        <label for="fotonik">Gambar NIK Kepala Keluarga</label>
                        <a href="https://kta.partaiummat.id/assets/front/images/contoh-scanktp.png" id="fotonik" data-toggle="lightbox">
                            <img src="https://kta.partaiummat.id/assets/front/images/contoh-scanktp.png" class="img-fluid img-thumbnail">
                        </a>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="nama">Nama Kepala Keluarga</label>
                        <input class="form-control" type="text" id="nama" name="nama" value="{{$data[0]['nama']}}">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="alamat">Alamat (Sesuai KK)</label>
                        <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="5">{{$data[0]['alamat']}}</textarea>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="status">Status</label>
                        <p class="form-control">{{$data [0]['status'] == 0 ? 'Belum Verifikasi' : 'Sudah Verifikasi'}}
                        </p>
                    </div>
                    @if (Auth::user()->level == 1)
                    <div class="col-12 mb-3 border-bottom">
                        <h3 class="text-center fw-bold">
                            Penilaian Pengaju RTLH
                        </h3>
                    </div>
                    @forelse ($nilai_pembobotan as $item)
                    <div class="col-12 mb-3">
                        <label for="{{ $item->id_nama }}">{{ ucwords($item->nama) }} (Bobot : {{ $item->bobot }} Poin)</label>
                        <input class="form-control" type="text" name="{{ $item->id_nama }}" id="{{ $item->id_nama }}" value="{{ $item->nilai }}" readonly>
                    </div>
                    @empty

                    @endforelse
                    @endif
                    @if ($data[0]['status'] == 0)
                    @if (Auth::user()->level == 0)
                    <div class="col-12 d-grid gap-2">
                        <a class="btn btn-dark" href="{{route('verifdatakk', ['id'=>$data[0]['no_kk']])}}">
                            Verifikasi Data
                        </a>
                    </div>
                    @elseif(Auth::user()->level == 1)
                    <div class="col-12 d-grid gap-2">
                        <button class="btn btn-dark" type="submit">Update Data</button>
                    </div>
                    @endif
                    @endif
                    <div class="col-12 d-grid gap-2">
                        <a class="btn btn-danger" href="{{route('datakk')}}">
                            <i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection