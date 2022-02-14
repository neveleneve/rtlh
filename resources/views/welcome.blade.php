@extends('layouts.master')

@section('title')
<title>Welcome</title>
@endsection

@section('content')
<div class="container-fluid py-5 mt-5">
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
    <div class="row">
        <div id="carouselExampleControls" class="carousel slide" data-bs-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="page-header min-vh-75 m-3 border-radius-xl" style="background-image: url('http://datartlh.perumahan.pu.go.id/_lib/prod/third/assets/images/ertlh-bg-1280x717.jpg');">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="page-header min-vh-75 m-3 border-radius-xl" style="background-image: url('https://www.pu.go.id/assets/front/img/blogs/menteri-basuki-dampingi-presiden-jokowi-resmikan-penataan-kawasan-pantai-bebas-sebagai-ikon-baru-parapat-WhatsApp%20Image%202022-02-02%20at%204.28.23%20PM.jpeg');">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="page-header min-vh-75 m-3 border-radius-xl" style="background-image: url('https://www.pu.go.id/assets/front/img/blogs/kinerja-sekretariat-jenderal-kementerian-pupr-lebih-baik-dari-tahun-sebelumnya-f52894c7-0083-4939-ba41-38164887a6fd.jpg');">

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="page-header min-vh-75 m-3 border-radius-xl" style="background-image: url('https://www.pu.go.id/assets/front/img/blogs/tingkatkan-efisiensi-dan-kualitas-produk-sambut-industri-40-kementerian-pupr-terus-berinovasi-manfaatkan-teknologi-informasi-dan-komunikasi-4d4df0f2-b00b-4be6-a3ea-ee799cdc2f40.jpg');">

                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="row mt-4">

    </div>
    <div class="row mt-4">

    </div>

</div>
@endsection