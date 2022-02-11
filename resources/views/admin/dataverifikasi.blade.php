@extends('layouts.master')

@section('title')
<title>Pendataan Verifikasi RLTH</title>
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
            <table class="table border table-hover text-center">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>No. Kartu Keluarga</th>
                        <th>Nama Kepala Keluarga</th>
                        <th>Alamat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <tr>
                        <td>21930293849328293</td>
                        <td>Budiman</td>
                        <td>
                            Jalan Kemangi Gang Pandan No. 4
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
                        <td>
                            Jalan Kejaksaan Gang Hakim No. 49
                        </td>
                        <td class="text-center">
                            <a href="#" class="btn btn-xs btn-success my-3" title="View">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="#" class="btn btn-xs btn-info my-3" title="Review">
                                <i class="fa fa-search"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection