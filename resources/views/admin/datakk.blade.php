@extends('layouts.master')

@section('title')
<title>Pendataan Kartu Keluarga</title>
@endsection

@section('content')
<div class="container mt-5 pt-5">
    <div class="row mb-3">
        <div class="col-12">
            @include('layouts.nav')
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-3 mb-3">
            <input type="text" class="form-control form-control-sm" placeholder="Pencarian...">
        </div>
        <div class="col-0 col-md-6">

        </div>
        <div class="col-12 col-md-3 d-grid gap-2">
            <a class="btn btn-xs btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modaltambah">
                <i class="fa fa-plus d-lg-none d-inline"></i>
                <span class="d-none d-lg-inline">
                    Tambah
                </span>
            </a>
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
    @if (Session::has('pemberitahuan'))
    <div class="row mb-3">
        <div class="col-12">
            <div class="alert bg-{{session('warna')}} alert-dismissable text-center text-light font-weight-bold"
                role="alert">
                {{ session('pemberitahuan') }}
                <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-hidden="true"></button>
            </div>
        </div>
    </div>
    @endif
    <div class="row mb-3">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table border table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Nomor KK</th>
                            <th>NIK Kepala Keluarga</th>
                            <th>Nama Kepala Keluarga</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @forelse($data as $item)
                        <tr>
                            <td>{{$item->no_kk}}</td>
                            <td>{{$item->nik}}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                <a href="{{route('viewdatakk', ['id'=>$item->no_kk])}}"
                                    class="badge badge-sm bg-info text-white ">View</a>
                            </td>
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
</div>
<div class="modal fade" id="modaltambah">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">Tambah Data Penerima RTLH</h4>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('adddatakk')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input class="form-control mb-3" type="text" name="nokk" id="nokk"
                        placeholder="Nomor Kartu Keluarga" required>
                    <input class="form-control mb-3" type="text" name="nik" id="nik"
                        placeholder="Nomor Induk Kependudukan Kepala Keluarga" required>
                    <input class="form-control mb-3" type="text" name="nama" id="nama"
                        placeholder="Nama Kepala Keluarga" required>
                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control mb-3"
                        placeholder="Alamat (Sesuai KK)"></textarea>
                    <button type="submit" class="btn btn-block btn-dark">Tambah</button>
                    <a class="btn btn-block btn-light border" data-bs-dismiss="modal">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection