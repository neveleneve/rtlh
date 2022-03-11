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
    @if (Auth::user()->level == 1)
    <div class="row">
        <div class="col-0 col-lg-9">
        </div>
        <div class="col-12 col-lg-3 d-grid gap-2">
            <a class="btn btn-xs btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modaltambah">
                <i class="fa fa-plus d-lg-none d-inline"></i>
                <span class="d-none d-lg-inline">
                    Tambah Data
                </span>
            </a>
        </div>
    </div>
    @endif
    <div class="row mb-3">
        <div class="accordion accordion-xs accordion-flush" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button bg-dark text-light collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Filter Data
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body border">
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-12 col-lg-3 mb-3">
                                    @if (Auth::user()->level == 0)
                                    <label for="pencarian">Pencarian</label>
                                    @endif
                                    <input id="pencarian" value="{{ isset($_GET['pencarian']) ? $_GET['pencarian'] : null }}" name="pencarian" type="text" class="form-control form-control-sm" placeholder="Pencarian...">
                                </div>
                                @if(Auth::user()->level == 0)
                                <div class="col-4 col-lg-3 mb-3">
                                    <label for="kotakab">Kota/Kabupaten</label>
                                    <select id="kotakab" name="kotakab" class="form-control form-control-sm">
                                        <option value="all" {{ isset($_GET['kotakab']) ? ($_GET['kotakab']=='all' ? 'selected' : null) : 'selected' }}>Semua</option>
                                        @foreach ($datakotakab as $item)
                                        <option value="{{ $item->id }}" {{ isset($_GET['kotakab']) ? ($_GET['kotakab']==$item->id ? 'selected' : null) : null }}>{{ ucwords(strtolower($item->name)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4 col-lg-3 mb-3">
                                    <label for="kecamatan">Kecamatan</label>
                                    <select id="kecamatan" name="kecamatan" class="form-control form-control-sm">
                                        <option value="all" {{ isset($_GET['kecamatan']) ? ($_GET['kecamatan']=='all' ? 'selected' : null) : 'selected' }}>Semua</option>
                                        @foreach ($datakecamatan as $item)
                                        <option value="{{ $item->id }}" {{ isset($_GET['kecamatan']) ? ($_GET['kecamatan']==$item->id ? 'selected' : null) : null }}>{{ ucwords(strtolower($item->name)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4 col-lg-3 mb-3">
                                    <label for="kelurahan">Kelurahan</label>
                                    <select id="kelurahan" name="kelurahan" class="form-control form-control-sm">
                                        <option value="all" {{ isset($_GET['kelurahan']) ? ($_GET['kelurahan']=='all' ? 'selected' : null) : 'selected' }}>Semua</option>
                                        @foreach ($datakelurahan as $item)
                                        <option value="{{ $item->id }}" {{ isset($_GET['kelurahan']) ? ($_GET['kelurahan']==$item->id ? 'selected' : null) : null }}>{{ ucwords(strtolower($item->name)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-12 d-grid gap-2">
                                    <button class="btn btn-xs btn-primary text-white" type="submit">
                                        <i class="fa fa-search d-lg-none d-inline"></i>
                                        <span class="d-none d-lg-inline">
                                            Pencarian
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                <table class="table border table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center"></th>
                            <th>Nomor KK</th>
                            <th>Nama Kepala Keluarga</th>
                            @if (Auth::user()->level == 0)
                            <th>Kota/Kab.</th>
                            @endif
                            <th>Kec.</th>
                            <th>Kel.</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @forelse($data as $item)
                        <tr>
                            <td>
                                <a href="{{route('viewdatakk', ['id'=>$item->no_kk])}}" class="badge badge-sm bg-info text-white">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                            <td>{{$item->no_kk}}</td>
                            <td>{{$item->nama}}</td>
                            @if (Auth::user()->level == 0)
                            <td>{{ucwords(strtolower($item->kotakab))}}</td>
                            @endif
                            <td>{{ucwords(strtolower($item->kecamatan))}}</td>
                            <td>{{ucwords(strtolower($item->kelurahan))}}</td>
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
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ Auth::user()->level == 0 ? '7' : '6' }}">
                                <h4 class="text-center">Data Kosong</h4>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center" id="pagination_link">
        {{ $data->appends($_GET)->links() }}
    </div>
    @if ($data->links())
    <div class="row mb-3" id="pagination_info">
        <div class="col-12 text-center">
            @if (count($data) > 0)
            <small>Menampilkan {{ (($data->currentPage() - 1) * $data->perPage()) + 1 }} - {{ $data->currentPage() == $data->lastPage() ? $data->total() : $data->currentPage() * $data->perPage() }} dari {{ $data->total() }} data</small>
            @else
            <small>Menampilkan 0 dari {{ $data->total() }} data</small>
            @endif
        </div>
    </div>
    @endif
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
                    <label for="kecamatanmodal">Kecamatan<span class="text-danger">*</span></label>
                    <select id="kecamatanmodal" class="form-control">
                        <option value="" selected disabled hidden>Pilih Kecamatan</option>
                        @forelse ($data_daerah as $item)
                        <option value="{{ $item->id }}">{{ ucwords(strtolower($item->name)) }}</option>
                        @empty
                        @endforelse
                    </select>
                    <label for="kelurahanmodal">Kelurahan<span class="text-danger">*</span></label>
                    <select name="kelurahan" id="kelurahanmodal" class="form-control" disabled>
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
@endif
@endsection
@section('customjs')
<script type="text/javascript" src="{{ route('scripting', ['filename'=>'ajax.js']) }}"></script>
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