@extends('layouts.master')

@section('title')
<title>Administrator Daerah</title>
@endsection

@section('content')
<div class="container mt-5 pt-5">
    <div class="row mb-3">
        <div class="col-12">
            @include('layouts.nav')
        </div>
    </div>
    <div class="row">
        <div class="col-0 col-lg-9">
        </div>
        <div class="col-12 col-lg-3 d-grid gap-2">
            <a class="btn btn-xs btn-dark float-end" data-bs-toggle="modal" data-bs-target="#modaltambah">
                <i class="fa fa-plus d-lg-none d-inline"></i>
                <span class="d-none d-lg-inline">
                    Tambah
                </span>
            </a>
        </div>
    </div>
    @if (Session::has('pemberitahuan'))
    <div class="row">
        <div class="col-12">
            <div class="alert bg-{{session('warna')}} alert-dismissable text-center text-light font-weight-bold" role="alert">
                {{ session('pemberitahuan') }}
                <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-hidden="true"></button>
            </div>
        </div>
    </div>
    @endif
    <div class="row mb-3">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-hover border text-center">
                    <thead class="table-dark">
                        <tr>
                            <th></th>
                            <th>Nama</th>
                            <th>Nama Pengguna</th>
                            <th>Provinsi</th>
                            <th>Kota / Kabupaten</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                        <tr>
                            <td>
                                <a class="badge bg-info text-white" href="#">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                            <td>{{ ucwords(strtolower($item->nama)) }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ ucwords(strtolower($item->namaprovinsi)) }}</td>
                            <td>{{ ucwords(strtolower($item->namadaerah)) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">
                                <h4 class="text-center">Data Kosong</h4>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {!! $data->links() !!}
    </div>
</div>
<div class="modal fade" id="modaltambah">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">Tambah Administrator Kota/Kabupaten</h4>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('addadministrator')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <label for="kotakabs">Kota/Kabupaten<span class="text-danger">*</span></label>
                    <select name="kotakabs" id="kotakabs" class="form-control">
                        <option value="" disabled selected hidden>Pilih Kota/Kabupaten</option>
                        @foreach ($datakotakab as $item)
                        <option value="{{ $item->id }}">{{ ucwords(strtolower($item->name)) }}</option>
                        @endforeach
                    </select>
                    <div class="row mt-3">
                        <div class="col-12 d-grid gap-2">
                            <button type="submit" class="btn btn-block btn-dark">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection