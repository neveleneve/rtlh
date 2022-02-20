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
    <div class="row mb-3">
        <div class="col-12 col-lg-3 d-grid gap-2">
            <a class="btn btn-danger" href="{{route('viewdatakk', ['id'=>$data[0]['no_kk']])}}">
                <i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Kembali
            </a>
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
                @forelse ($pembobotan as $item)
                <div class="col-12 mb-3">
                    <label for="{{ $item->id_nama }}">{{ $item->nama }}</label>
                    <select name="{{ $item->id_nama }}" id="{{ $item->id_nama }}" class="form-control">
                        <option value="" disabled selected hidden>Pilih {{ $item->nama }}</option>
                        @forelse ($nilai_pembobotan[$item->id - 1] as $dataitem)
                        <option value="{{ $dataitem->value }}">{{ $dataitem->nama }}</option>
                        @empty

                        @endforelse
                    </select>
                </div>
                @empty

                @endforelse
                {{-- <div class="col-12 mb-3">
                    <label for="atap">Kondisi Atap Rumah</label>
                    <select name="atap" id="atap" class="form-control">
                        <option value="" disabled selected hidden>Pilih Kondisi Atap Rumah</option>
                        <option value="1">Genteng</option>
                        <option value="2">Bambu</option>
                        <option value="3">Ijuk</option>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="dinding">Kondisi Dinding Rumah</label>
                    <select name="dinding" id="dinding" class="form-control">
                        <option value="" disabled selected hidden>Pilih Kondisi Dinding Rumah</option>
                        <option value="1">Papan</option>
                        <option value="2">Bambu</option>
                        <option value="3">Ilalang</option>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="kepemilikan">Status Kepemilikan Rumah</label>
                    <select name="kepemilikan" id="kepemilikan" class="form-control">
                        <option value="" disabled selected hidden>Pilih Status Kepemilikan Rumah</option>
                        <option value="1">Milik Sendiri</option>
                        <option value="2">Sewa</option>
                        <option value="3">Wakaf</option>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="lantai">Kondisi Lantai Rumah</label>
                    <select name="lantai" id="lantai" class="form-control">
                        <option value="" disabled selected hidden>Pilih Kondisi Lantai Rumah</option>
                        <option value="1">Keramik</option>
                        <option value="2">Plester</option>
                        <option value="3">Tanah</option>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="listrik">Ketersediaan Listrik</label>
                    <select name="listrik" id="listrik" class="form-control">
                        <option value="" disabled selected hidden>Pilih Ketersediaan Listrik</option>
                        <option value="1">Ada</option>
                        <option value="2">Tidak Ada</option>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="mck">Ketersediaan MCK</label>
                    <select name="mck" id="mck" class="form-control">
                        <option value="" disabled selected hidden>Pilih Ketersediaan MCK</option>
                        <option value="1">Ada</option>
                        <option value="2">Tidak Ada</option>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="aset">Aset Lainnya</label>
                    <select name="aset" id="aset" class="form-control">
                        <option value="" disabled selected hidden>Pilih Aset Lainnya</option>
                        <option value="1">Ada</option>
                        <option value="2">Tidak Ada</option>
                    </select>
                </div> --}}
                <div class="col-12 d-grid gap-2 mb-3">
                    <button class="btn btn-danger">
                        <i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Kembali
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection