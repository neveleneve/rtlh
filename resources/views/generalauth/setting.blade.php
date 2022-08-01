@extends('layouts.master')

@section('title')
    <title>Setting</title>
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
        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('updatesetting') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <label for="username">Nama Pengguna</label>
                                    <input type="text" class="form-control mb-3" id="username"
                                        value="{{ Auth::user()->username }}" readonly>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control mb-3" id="name"
                                        value="{{ Auth::user()->name }}" readonly>
                                </div>
                            </div>
                            <label for="oldpassword">Password Lama</label>
                            <input type="password" class="form-control mb-3" id="old_password" name="old_password">
                            <label for="new-password">Password Baru</label>
                            <input type="password" class="form-control mb-3" id="password" name="password">
                            <label for="newpasswordconfirmation">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control mb-3" id="password_confirmation"
                                name="password_confirmation">
                            <div class="row">
                                <div class="col-0 col-lg-9"></div>
                                <div class="col-12 col-lg-3 d-grid gap-2">
                                    <button class="btn btn-dark" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customjs')
    <script type="text/js" src="{{ route('scripting', ['filename' => 'setting.js']) }}"></script>
@endsection
