@extends('layouts.master')

@section('title')
    <title>Dashboard</title>
    @php
    function namabulan($id)
    {
        switch ($id) {
            case 1:
                return 'Januari';
                break;
            case 2:
                return 'Februari';
                break;
            case 3:
                return 'Maret';
                break;
            case 4:
                return 'April';
                break;
            case 5:
                return 'Mei';
                break;
            case 6:
                return 'Juni';
                break;
            case 7:
                return 'Juli';
                break;
            case 8:
                return 'Agustus';
                break;
            case 9:
                return 'September';
                break;
            case 10:
                return 'Oktober';
                break;
            case 11:
                return 'November';
                break;
            case 12:
                return 'Desember';
                break;
            default:
                break;
        }
    }
    @endphp
@endsection
@section('content')
    <div class="container mt-5 pt-5">
        <div class="row mb-3">
            <div class="col-12">
                @include('layouts.nav')
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="mb-0">
                    Update Terakhir :
                    <span class="text-success text-sm font-weight-bolder">
                        {{ date('d') }} {{ namabulan(date('m')) }} {{ date('Y') }}, {{ date('H:i:s') }}
                    </span>
                </p>
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
                                        {{ $terdaftar }} Kartu Keluarga
                                    </h5>
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
                                        {{ $terverifikasi }} Kartu Keluarga
                                    </h5>
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
        </div>
    </div>
@endsection
