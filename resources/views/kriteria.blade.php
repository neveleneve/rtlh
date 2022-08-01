@extends('layouts.master')

@section('title')
    <title>Kriteria RTLH</title>
@endsection

@section('content')
    <div class="container-fluid py-5 mt-5">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center">Kriteria RTLH Menurut Beberapa Pihak</h3>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="accordion rounded" id="accordionExample">
                    <div class="accordion-item border border-3">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Kriteria RTLH Menurut Kimpraswil
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ol class="list-group-numbered">
                                    <li class="list-group-item">
                                        <strong>Ketentuan Rumah Sederhana Sehat</strong>
                                        <p>Konsepsi Rumah Sederhana Sehat (RS Sehat) termaktub didalam Keputusan Menteri
                                            Permukiman dan Prasarana Wilayah No. 403/KPTS/M/2002 tentang Pedoman Teknis
                                            Rumah Sederhana Sehat (RS Sehat). Rumah Sederhana Sehat adalah rumah yang
                                            dibangun dengan menggunakan bahan bangunan dan konstruksi sederhana akan tetapi
                                            masih memenuhi standar berikut:</p>
                                        <ul>
                                            <li>Kebutuhan minimal luas bangunan per jiwa (KLB)</li>
                                            <li>Kebutuhan kesehatan dan kenyamanan penghuni (KHP)</li>
                                            <li>Kebutuhan minimal keamanan dan keselamatan bangunan (KSB)</li>
                                        </ul>
                                        <p>Selain ketiga standar tersebut, RS Sehat juga mempertimbangkan dan memanfaatkan
                                            potensi lokal (KML) meliputi potensi fisik seperti bahan bangunan, geologis, dan
                                            iklim setempat serta potensi sosial budaya seperti arsitektur lokal, dan cara
                                            hidup. Maka berdasarkan pengertian di atas RTLH dapat digambarkan dengan rumus
                                            berikut:</p>
                                        <strong class="text-center">RTLH = KSB + KHP + KLB + KML < RLH</strong>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Kebutuhan Minimal Masa (Penampilan) dan Ruang (Luar - Dalam)</strong>
                                        <p>Kebutuhan ruang per orang dihitung berdasarkan aktivitas dasar manusia (aktivitas
                                            tidur, makan, kerja, duduk, mandi, kakus, cuci dan masak serta ruang gerak
                                            lainnya) di dalam rumah. Dari hasil kajian, kebutuhan ruang per orang adalah 9
                                            m2 dengan perhitungan ketinggian rata-rata langit-langit adalah 2.80 m. Rumah
                                            sederhana sehat memungkinkan penghuni untuk dapat hidup sehat, dan menjalankan
                                            kegiatan hidup sehari-hari secara layak.</p>
                                        <div class="table-responsive">
                                            <table class="table border text-center">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Luas Lantai</th>
                                                        <th>Luas Minimal</th>
                                                        <th>Luas Maksimal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Dewasa</td>
                                                        <td>6,4 m<sup>2</sup></td>
                                                        <td>9,6 m<sup>2</sup></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Anak - anak</td>
                                                        <td>3,2 m<sup>2</sup></td>
                                                        <td>4,8 m<sup>2</sup></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Luas Hunian</td>
                                                        <td><strong>28,28 m<sup>2</sup></strong></td>
                                                        <td><strong>43,2 m<sup>2</sup></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Luas Hunian Rerata</td>
                                                        <td></td>
                                                        <td><strong>36 m<sup>2</sup></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Luas Hunian Per Jiwa (4 Jiwa Per Rumah)</td>
                                                        <td></td>
                                                        <td><strong>9 m<sup>2</sup></strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <figcaption class="blockquote-footer mt-3 fw-bold">Sumber: (SNI 03-1733-2004)
                                        </figcaption>
                                        <img class="img-thumbnail img-fluid"
                                            src="https://perkim.id/wp-content/uploads/2021/02/Denah-Unit-Ruang-pada-Rumah-Serderhana.jpg"
                                            alt="">
                                        <figcaption class="blockquote-footer mt-3 fw-bold">Denah Unit Ruang pada Rumah
                                            Serderhana (Sumber: Puslitbang Permukiman, 2011)</figcaption>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Kebutuhan Minimal Kesehatan dan Kenyamanan</strong>
                                        <p>Rumah sebagai tempat tinggal yang memenuhi syarat kesehatan dan kenyamanan
                                            dipengaruhi oleh 3 (tiga) aspek, yaitu pencahayaan, penghawaan, serta suhu udara
                                            dan kelembaban dalam ruangan. Aspek-aspek tersebut merupakan dasar atau kaidah
                                            perencanaan rumah sehat dan nyaman.</p>
                                        <ul>
                                            <li>
                                                <p>
                                                    <strong>Pencahayaan</strong> yang dimaksud adalah penggunaan terang
                                                    langit dengan pencahayaan alami dari sinar matahari, dengan ketentuan
                                                    sebagai berikut :
                                                <ul>
                                                    <li>cuaca dalam keadaan cerah dan tidak berawan;</li>
                                                    <li>ruang kegiatan mendapatkan cukup banyak cahaya; dan</li>
                                                    <li>ruang kegiatan mendapatkan distribusi cahaya secara merata.</li>
                                                </ul>
                                                </p>
                                                <p>
                                                    Kualitas pencahayaan alami siang hari yang masuk ke dalam ruangan
                                                    ditentukan oleh:
                                                <ul>
                                                    <li>kegiatan yang membutuhkan daya penglihatan (mata); </li>
                                                    <li>lamanya waktu kegiatan yang membutuhkan daya penglihatan (mata);
                                                    </li>
                                                    <li>tingkat atau gradasi kekasaran dan kehalusan jenis pekerjaan; </li>
                                                    <li>lubang cahaya min. 1/10 dari luas lantai ruangan; </li>
                                                    <li>sinar matahari langsung dapat masuk ke ruangan min. 1 (satu) jam
                                                        setiap hari; dan </li>
                                                    <li>cahaya efektif dapat diperoleh dari jam 08.00 sampai dengan jam
                                                        16.00. </li>
                                                </ul>
                                                </p>
                                                <p>
                                                    Nilai faktor langit tersebut akan sangat ditentukan oleh kedudukan
                                                    lubang cahaya dan luas lubang cahaya pada bidang atau dinding ruangan.
                                                    Semakin lebar bidang cahaya (L), maka akan semakin besar nilai faktor
                                                    langitnya. Tinggi ambang bawah bidang bukaan (jendela) efektif antara 70
                                                    - 80 cm dari permukaan lantai ruangan.
                                                </p>
                                                <img src="https://perkim.id/wp-content/uploads/2021/02/Model-Pencahayaan-Alami.jpg"
                                                    class="img-thumbnail img-fluid" alt="">
                                                <figcaption class="blockquote-footer mt-3 fw-bold">Model Pencahayaan Alami
                                                    (Sumber Foto : Modul Rumah Sehat, Kementrian Pekerjaan Umum)
                                                </figcaption>
                                            </li>
                                            <li>
                                                <p>
                                                    <strong>Penghawaan.</strong> Kenyamanan didalam rumah diperoleh dengan
                                                    menciptakan kesegaran udara dalam ruangan dengan cara penghawaan alami,
                                                    maka dapat dilakukan dengan memberikan atau mengadakan peranginan silang
                                                    (ventilasi silang) dengan ketentuan sebagai berikut :
                                                <ul>
                                                    <li>Lubang penghawaan min. 5% (lima persen) dari luas lantai ruangan.
                                                    </li>
                                                    <li>Volume udara yang mengalir masuk = volume udara yang mengalir keluar
                                                        ruangan. </li>
                                                    <li>Udara yang masuk tidak berasal dari asap dapur atau bau kamar
                                                        mandi/WC. </li>
                                                </ul>
                                                </p>
                                                <p>
                                                    Khususnya untuk penghawaan ruangan dapur dan kamar mandi/WC, yang
                                                    memerlukan peralatan bantu elektrikal-mekanikal seperti <i>blower</i>
                                                    atau <i>exhaust fan</i>, harus memenuhi ketentuan sebagai berikut :
                                                <ul>
                                                    <li>Lubang penghawaan keluar tidak mengganggu kenyamanan bangunan
                                                        disekitarnya. </li>
                                                    <li>Lubang penghawaan keluar tidak mengganggu kenyamanan ruangan
                                                        kegiatan dalam bangunan seperti: ruangan keluarga, tidur, tamu dan
                                                        kerja. </li>
                                                </ul>
                                                </p>
                                                <img src="https://perkim.id/wp-content/uploads/2021/02/Model-Penghawaan-yang-Baik.jpg"
                                                    class="img-thumbnail img-fluid" alt="">
                                                <figcaption class="blockquote-footer mt-3 fw-bold">Model Penghawaan yang
                                                    Baik (Sumber Foto :
                                                    https://19design.wordpress.com/2011/04/23/mengenal-lebih-jauh-sistem-ventilasi/)
                                                </figcaption>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Kebutuhan Minimal Keamanan dan Keselamatan</strong>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border border-3">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Kriteria RLH Menurut Permen PRPR Tahun 2018
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the second item's accordion body.</strong> It is hidden by default, until
                                the collapse plugin adds the appropriate classes that we use to style each element. These
                                classes control the overall appearance, as well as the showing and hiding via CSS
                                transitions. You can modify any of this with custom CSS or overriding our default variables.
                                It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border border-3">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Kriteria RTLH Menurut Lembaga / Instansi / Dinas Lainnya
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                                collapse plugin adds the appropriate classes that we use to style each element. These
                                classes control the overall appearance, as well as the showing and hiding via CSS
                                transitions. You can modify any of this with custom CSS or overriding our default variables.
                                It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">

        </div>
        <div class="row mt-3">

        </div>

    </div>
@endsection
