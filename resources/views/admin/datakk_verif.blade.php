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
        <div class="col-12 col-md-3 d-grid gap-2">
            <a class="btn btn-danger" href="{{route('datakk')}}">
                <i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Kembali
            </a>
        </div>
    </div>
</div>
@endsection