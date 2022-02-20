@extends('layouts.master')

@section('title')
<title>Verifikasi Data Pengaju</title>
@endsection

@section('content')
<div class="container mt-5 pt-5">
    <div class="row mb-3">
        <div class="col-12">
            @include('layouts.nav')
        </div>
    </div>
    <div class="card">
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
                    <a href="https://image.cermati.com/c_fill,fl_progressive,g_north_east,h_800,q_80,w_1200/vnqow2e6z2mbfmiob7w4.jpg" data-toggle="lightbox">
                        <img src="https://image.cermati.com/c_fill,fl_progressive,g_north_east,h_800,q_80,w_1200/vnqow2e6z2mbfmiob7w4.jpg" class="img-fluid img-thumbnail">
                    </a>
                </div>
                <div class="col-12 col-lg-6 mb-3">
                    <label for="fotonik">Gambar NIK Kepala Keluarga</label>
                    <a href="https://kta.partaiummat.id/assets/front/images/contoh-scanktp.png" id="fotonik" data-toggle="lightbox">
                        <img src="https://kta.partaiummat.id/assets/front/images/contoh-scanktp.png" class="img-fluid img-thumbnail">
                    </a>
                </div>
                <div class="col-12 mb-3">
                    <label for="fotonik">Gambar Rumah</label>
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6 mb-3">
                            <a href="https://kta.partaiummat.id/assets/front/images/contoh-scanktp.png" id="fotonik" data-toggle="lightbox">
                                <img src="https://kta.partaiummat.id/assets/front/images/contoh-scanktp.png" class="img-fluid img-thumbnail">
                            </a>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <a href="https://kta.partaiummat.id/assets/front/images/contoh-scanktp.png" id="fotonik" data-toggle="lightbox">
                                <img src="https://kta.partaiummat.id/assets/front/images/contoh-scanktp.png" class="img-fluid img-thumbnail">
                            </a>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <a href="https://kta.partaiummat.id/assets/front/images/contoh-scanktp.png" id="fotonik" data-toggle="lightbox">
                                <img src="https://kta.partaiummat.id/assets/front/images/contoh-scanktp.png" class="img-fluid img-thumbnail">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3 border-bottom">
                    <h3 class="text-center fw-bold">
                        Form Penilaian
                    </h3>
                </div>
                <form action="{{ route('verifikasi') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="no_kk" value="{{ $data[0]['no_kk'] }}">
                    @forelse ($pembobotan as $item)
                    <div class="col-12 mb-3">
                        <label for="{{ $item->id_nama }}">{{ ucwords($item->nama) }}</label>
                        <select name="nilai[{{ $item->id }}]" id="{{ $item->id_nama }}" class="form-control" required>
                            <option value="" disabled selected hidden>Pilih {{ ucwords($item->nama) }}</option>
                            @forelse ($nilai_pembobotan[$item->id - 1] as $dataitem)
                            <option value="{{ $dataitem->value }}">{{ ucwords($dataitem->nama) }}</option>
                            @empty

                            @endforelse
                        </select>
                    </div>
                    @empty

                    @endforelse
                    <div class="col-12 d-grid gap-2">
                        <button class="btn btn-dark" type="submit">
                            <i class="fa fa-save"></i>&nbsp;&nbsp;Simpan
                        </button>
                    </div>
                </form>
                <div class="col-12 d-grid gap-2 mb-3">
                    <a class="btn btn-danger" href="{{ route('viewdatakk', ['id' => $data[0]['no_kk']]) }}">
                        <i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection