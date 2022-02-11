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
    <div class="row mb-3">
        <div class="col-3">
            <input type="text" class="form-control form-control-sm" placeholder="Pencarian...">
        </div>
        <div class="col-6">

        </div>
        <div class="col-3">
            <a class="btn btn-xs btn-primary float-end">
                <i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah
            </a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <table class="table border table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No. Kartu Keluarga</th>
                        <th>Nama Kepala Keluarga</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <tr>
                        <td>21930293231428293</td>
                        <td>Andi</td>
                        <td class="text-sm">
                            <span class="badge badge-sm bg-gradient-danger">Unverified</span>
                        </td>
                        <td class="text-center">
                            <a href="#" class="btn btn-xs btn-success my-3" title="View">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="#" class="btn btn-xs btn-danger my-3" title="View">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>21930293849328293</td>
                        <td>Budiman</td>
                        <td class="text-sm">
                            <span class="badge badge-sm bg-gradient-success">Verified</span>
                        </td>
                        <td class="text-center">
                            <a href="#" class="btn btn-xs btn-success my-3" title="View">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>82930293231428293</td>
                        <td>Firmansyah</td>
                        <td class="text-sm">
                            <span class="badge badge-sm bg-gradient-success">Verified</span>
                        </td>
                        <td class="text-center">
                            <a href="#" class="btn btn-xs btn-success my-3" title="View">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection