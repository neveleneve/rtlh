@extends('layouts.master')

@section('title')
<title>Dashboard</title>
@endsection

@section('content')
<div class="container mt-5 pt-5">
    <div class="row mb-3">
        <div class="col-12">
            @include('layouts.nav')
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12 col-lg-6 mt-3">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Kartu Keluarga Terdaftar</p>
                                <h5 class="font-weight-bolder">
                                    3 Kartu Keluarga
                                </h5>
                                <p class="mb-0">
                                    Update Terakhir :
                                    <span class="text-success text-sm font-weight-bolder">23 Januari 2022</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="fa fa-file text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 mt-3">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Kartu Keluarga Terverifikasi</p>
                                <h5 class="font-weight-bolder">
                                    2 Kartu Keluarga
                                </h5>
                                <p class="mb-0">
                                    Update Terakhir :
                                    <span class="text-success text-sm font-weight-bolder">23 Januari 2022</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="fa fa-file-alt text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Rumah Tak Layak Huni Terverifikasi</p>
                                <h5 class="font-weight-bolder">
                                    1 Rumah
                                </h5>
                                <p class="mb-0">
                                    Update Terakhir :
                                    <span class="text-success text-sm font-weight-bolder">27 Januari 2022</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="fa fa-home text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection