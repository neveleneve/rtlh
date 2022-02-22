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
                        <th>No. KK</th>
                        <th>Alamat</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @forelse ($data as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->no_kk }}</td>
                        <td>{{ ucwords($item->alamat) }}</td>
                        <td>{{ $item->nilai_wp }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">
                            <h4 class="text-center">Data Kosong</h4>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection