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
            <div class="accordion accordion-xs accordion-flush" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button bg-dark text-light collapsed fw-bold" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                            aria-controls="collapseOne">
                            Filter Data
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body border">
                            <form action="" method="get">
                                <div class="row">
                                    {{-- <div class="col-12 col-lg-6 mb-3">
                                        <label for="pencarian">Pencarian</label>
                                        <input id="pencarian"
                                            value="{{ isset($_GET['pencarian']) ? $_GET['pencarian'] : null }}"
                                            name="pencarian" type="text" class="form-control form-control-sm"
                                            placeholder="Pencarian...">
                                    </div> --}}
                                    <div class="col-12 mb-3">
                                        <label for="tahun">Tahun Anggaran</label>
                                        <select id="tahun" name="tahun" class="form-control form-control-sm">
                                            <option value="all"
                                                {{ isset($_GET['tahun']) ? ($_GET['tahun'] == 'all' ? 'selected' : null) : 'selected' }}>
                                                Semua</option>
                                            @for ($i = 0; $i < 10; $i++)
                                                <option value="{{ date('Y') + (5 - $i) }}"
                                                    {{ isset($_GET['tahun']) ? ($_GET['tahun'] == date('Y') + (5 - $i) ? 'selected' : null) : null }}>
                                                    {{ date('Y') + (5 - $i) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-grid gap-2">
                                        <button class="btn btn-xs btn-primary text-white" type="submit">
                                            <i class="fa fa-filter d-lg-none d-inline"></i>
                                            <span class="d-none d-lg-inline">
                                                Filter
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
        @if (count($data) > 0)
            <div class="row">
                <div class="col-12 d-grid gap-2">
                    <a class="btn btn-xs btn-dark float-end" type="button" href="#" data-bs-toggle="modal"
                        data-bs-target="#modalcetak">
                        Cetak Data RTLH
                    </a>
                </div>
            </div>
        @endif
        <div class="row mb-3">
            <div class="col-12">
                * Data 50 penerima dengan hasil penilaian tertinggi dianggap lolos
                <div class="table-responsive">
                    <table class="table table-hover border text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>No.</th>
                                <th>No. KK</th>
                                <th>Nama Kepala Keluarga</th>
                                <th>Alamat</th>
                                <th>Th. Anggaran</th>
                                <th>Nilai</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->no_kk }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ ucwords($item->alamat) }}</td>
                                    <td>{{ $item->tahun_anggaran }}</td>
                                    <td>{{ $item->nilai_wp }}</td>
                                    <td>
                                        {{ $loop->index + 1 <= 50 ? 'Lolos' : 'Tidak Lolos' }} </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
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
    @if (count($data) > 0)
        <div class="modal fade" id="modalcetak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pilih Jenis Cetak</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 d-grid gap-2">
                                <a href="{{ route('cetakdatartlhpdf', ['tahun' => isset($_GET['tahun']) ? ($_GET['tahun'] == 'all' ? 'all' : $_GET['tahun']) : date('Y')]) }}"
                                    target="__blank" class="btn btn-dark">Format
                                    PDF</a>
                            </div>
                            <div class="col-12 d-grid gap-2">
                                <a href="{{ route('cetakdatartlhexcel', ['tahun' => isset($_GET['tahun']) ? ($_GET['tahun'] == 'all' ? 'all' : $_GET['tahun']) : date('Y')]) }}"
                                    target="__blank" class="btn btn-dark">Format
                                    Excel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
