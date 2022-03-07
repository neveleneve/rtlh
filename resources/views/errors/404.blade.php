@extends('layouts.master')

@section('title')
<title>404 Not Found</title>
@endsection

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-body text-center">
                    <img class="img-fluid mb-3" src="{{ asset('/images/template/404.jpg') }}" alt="">
                    <a href="{{ route('landing') }}" class="text-dark">Kembali ke landing page</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection