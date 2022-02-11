@extends('layouts.master')

@section('title')
<title>Pendataan RTLH</title>
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
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <table class="table table-hover border text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <tr>
                        <td>1</td>
                        <td>Budiman</td>
                        <td class="align-middle text-sm">
                            Jalan Kemangi Gang Pandan No. 4
                        </td>
                        <td>
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