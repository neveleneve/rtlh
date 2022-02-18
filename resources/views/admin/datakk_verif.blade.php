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
                    <a href="https://image.cermati.com/c_fill,fl_progressive,g_north_east,h_800,q_80,w_1200/vnqow2e6z2mbfmiob7w4.jpg"
                        data-toggle="lightbox">
                        <img src="https://image.cermati.com/c_fill,fl_progressive,g_north_east,h_800,q_80,w_1200/vnqow2e6z2mbfmiob7w4.jpg"
                            class="img-fluid img-thumbnail">
                    </a>
                </div>
                <div class="col-12 col-lg-6 mb-3">
                    <label for="fotonik">Gambar NIK Kepala Keluarga</label>
                    <a href="https://kta.partaiummat.id/assets/front/images/contoh-scanktp.png" id="fotonik"
                        data-toggle="lightbox">
                        <img src="https://kta.partaiummat.id/assets/front/images/contoh-scanktp.png"
                            class="img-fluid img-thumbnail">
                    </a>
                </div>
                <div class="col-12 mb-3">
                    <label for="fotonik">Gambar Rumah</label>
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6 mb-3">
                            <a href="https://kta.partaiummat.id/assets/front/images/contoh-scanktp.png" id="fotonik"
                                data-toggle="lightbox">
                                <img src="https://kta.partaiummat.id/assets/front/images/contoh-scanktp.png"
                                    class="img-fluid img-thumbnail">
                            </a>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <a href="https://kta.partaiummat.id/assets/front/images/contoh-scanktp.png" id="fotonik"
                                data-toggle="lightbox">
                                <img src="https://kta.partaiummat.id/assets/front/images/contoh-scanktp.png"
                                    class="img-fluid img-thumbnail">
                            </a>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <a href="https://kta.partaiummat.id/assets/front/images/contoh-scanktp.png" id="fotonik"
                                data-toggle="lightbox">
                                <img src="https://kta.partaiummat.id/assets/front/images/contoh-scanktp.png"
                                    class="img-fluid img-thumbnail">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection