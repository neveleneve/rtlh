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
        <div class="col-12 col-lg-3 mb-3">
            <input type="text" class="form-control form-control-sm" placeholder="Pencarian...">
        </div>
        @if (Auth::user()->level == 1)
        <div class="col-0 col-lg-6">

        </div>
        <div class="col-12 col-lg-3 d-grid gap-2">
            <a class="btn btn-xs btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modaltambah">
                <i class="fa fa-plus d-lg-none d-inline"></i>
                <span class="d-none d-lg-inline">
                    Tambah
                </span>
            </a>
        </div>
        {{-- @else --}}
        @endif
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
                <table class="table border table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Status</th>
                            <th>Nomor KK</th>
                            <th>NIK Kepala Keluarga</th>
                            <th>Nama Kepala Keluarga</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @forelse($data as $item)
                        <tr>
                            <td>
                                @if ($item->status == 0)
                                <span class="badge bg-danger" title="Belum Verifikasi">
                                    <i class="fa fa-times"></i>
                                </span>
                                @elseif ($item->status == 1)
                                <span class="badge bg-success" title="Sudah Verifikasi">
                                    <i class="fa fa-check"></i>
                                </span>
                                @endif
                            </td>
                            <td>{{$item->no_kk}}</td>
                            <td>{{$item->nik}}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                <a href="{{route('viewdatakk', ['id'=>$item->no_kk])}}" class="badge badge-sm bg-info text-white">View</a>
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
@if (Auth::user()->level == 1)

<div class="modal fade" id="modaltambah">
    <div class="modal-dialog modal-dialog-centered modal-xl">
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
                    <label for="nokk">Nomor KK<span class="text-danger">*</span></label>
                    <input class="form-control mb-2" type="text" name="nokk" id="nokk" required>
                    <label for="gambarkk">Gambar KK<span class="text-danger">*</span></label>
                    <input class="form-control mb-2" type="file" name="gambarkk" id="gambarkk" required>
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center mb-2">
                            <img id="preview-image-kk" src="{{ asset('images/template/not-found.png') }}" style="max-height: 250px;">
                            <br>
                            <label for="preview-img-kk">Preview Gambar KK</label>
                        </div>
                    </div>
                    <label for="nik">NIK Kepala Keluarga<span class="text-danger">*</span></label>
                    <input class="form-control mb-2" type="text" name="nik" id="nik" required>
                    <label for="gambarnik">Gambar KTP Kepala Keluarga<span class="text-danger">*</span></label>
                    <input class="form-control mb-2" type="file" name="gambarnik" id="gambarnik" required>
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center mb-2">
                            <img id="preview-image-ktp" src="{{ asset('images/template/not-found.png') }}" style="max-height: 250px;">
                            <br>
                            <label for="preview-img-ktp">Preview Gambar KTP</label>
                        </div>
                    </div>
                    <label for="nama">Nama Kepala Keluarga<span class="text-danger">*</span></label>
                    <input class="form-control mb-2" type="text" name="nama" id="nama" required>
                    <label for="alamat">Alamat (Sesuai Kartu Keluarga)<span class="text-danger">*</span></label>
                    <textarea name="alamat" id="alamat" rows="5" class="form-control mb-2" required></textarea>
                    <label for="kecamatan">Kecamatan<span class="text-danger">*</span></label>
                    <select name="kecamatan" id="kecamatan" class="form-control">
                        <option value="" selected disabled hidden>Pilih Kecamatan</option>
                        @forelse ($data_daerah as $item)
                        <option value="{{ $item->id }}">{{ ucwords(strtolower($item->name)) }}</option>
                        @empty
                        @endforelse
                    </select>
                    <label for="kelurahan">Kelurahan<span class="text-danger">*</span></label>
                    <select name="kelurahan" id="kelurahan" class="form-control">
                        <option value="" selected disabled hidden>Pilih Kelurahan</option>
                    </select>
                    <hr class="dropdown-divider mt-3">
                    <h3 class="text-center">Penilaian Kondisi Pengaju</h3>
                    <hr class="dropdown-divider">
                    @forelse ($pembobotan as $item)
                    <div class="col-12 mb-3">
                        <label for="{{ $item->id_nama }}">{{ ucwords($item->nama) }}</label>
                        <select name="nilai[{{ $item->id }}]" id="{{ $item->id_nama }}" class="form-control" required>
                            <option value="" disabled selected hidden>Pilih {{ ucwords($item->nama) }}</option>
                            @forelse ($nilai_pembobotan[$item->id - 1] as $dataitem)
                            <option value="{{ $dataitem->value }}">{{ ucwords($dataitem->nama) }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    @empty
                    @endforelse
                    <div class="row">
                        <div class="col-12 col-lg-6 d-grid gap-2">
                            <button type="submit" class="btn btn-block btn-dark">Tambah</button>
                        </div>
                        <div class="col-12 col-lg-6 d-grid gap-2">
                            <a class="btn btn-block btn-light border" data-bs-dismiss="modal">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- @else --}}
@endif
@endsection
@section('customjs')
<script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
<script type="text/javascript">
    $(function() {
        var previewImages = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                $("div.images-preview-div").empty();
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr({
                            'src': event.target.result,
                            'class': 'img-thumbnail col-3'
                        }).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#fotorumah').on('change', function() {
            previewImages(this, 'div.images-preview-div');
        });
    });
    $(document).ready(function (e) {
       $('#gambarkk').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => { 
          $('#preview-image-kk').attr({
              'src': e.target.result,
              'class': 'img-thumbnail'
            }); 
        }
        reader.readAsDataURL(this.files[0]); 
       });
       $('#gambarnik').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => { 
          $('#preview-image-ktp').attr({
              'src': e.target.result,
              'class': 'img-thumbnail'
            }); 
        }
        reader.readAsDataURL(this.files[0]); 
       });
    });
</script>
@endsection