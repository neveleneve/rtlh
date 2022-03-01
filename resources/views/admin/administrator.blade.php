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
    <div class="row mb-3">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-hover border text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nama Pengguna</th>
                            <th>Provinsi</th>
                            <th>Kota / Kabupaten</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{  ucwords(strtolower($item->nama)) }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ ucwords(strtolower($item->namaprovinsi)) }}</td>
                            <td>{{ ucwords(strtolower($item->namadaerah)) }}</td>
                            <td>
                                <a class="badge bg-info text-white" href="#">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection