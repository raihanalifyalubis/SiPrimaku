@extends('Template.dashboard')

@section('content')

<section class="hero section">
    <div class="container">
        </br>
        <h1 data-aos="zoom-out">Rincian Penilaian Pengembangan Karakter</h1>
        </br>
        </br>
        <div class="table-responsive-sm">
            <table data-aos="fade-up" class="table table-light table-sm table-hover table-bordered">
                <thead>
                    <td align='center'>No</td>
                    <td align='center'>Aspek Pembinaan Karakter</td>
                    <td align='center'>Penilaian</td>
                    <td align='center'>Skor</td>
                </thead>
                <?php
                $i = 1;
                $count = 0;
                $j = 0;
                ?>
                <tbody class="table-group-divider">

                    @foreach($penilaians as $penilaian)
                    <tr>
                        <?php

                        ?>
                        <td align="center">{{ $i }}</td>
                        @if($i % 5 == 1)
                        <td width="20%" rowspan="5" align="center" style="vertical-align:middle">
                            {{ $aspek_pembinaan[0][$j]["penjelasan"] }}
                        </td>
                        <?php $j++ ?>
                        @endif
                        <td>{{ $penilaian->penilaian }}</td>
                        <td align="center">{{ $penilaian->skor }}</td>
                    </tr>
                    <?php
                    $i++;
                    ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- Penilaian Section -->
<section id="nilai" class="features section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Penilaian</h2>
        <p>Klasifikasi Karakter Mahasiswa<br></p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-5">

            <div class="col-xl-6" data-aos="zoom-out" data-aos-delay="100">
                <img src="{{ url('homepage/img/features.png') }}" class="img-fluid" alt="">
            </div>

            <div class="col-xl-6 d-flex">
                <div class="row align-self-center gy-4">
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-check" data-toggle="collapse"></i>
                            <p class="d-inline-flex gap-1">
                                <a data-bs-toggle="collapse" href="#penilaian1" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <h3>Berkarakter Baik</h3><!-- 340 - 680 -->
                                </a>
                            </p>
                        </div>
                        <div class="collapse" id="penilaian1">
                            <div class="card card-body">
                                Total Penilaian : 340 - 680
                            </div>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-check"></i>
                            <p class="d-inline-flex gap-1">
                                <a data-bs-toggle="collapse" href="#penilaian2" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <h3>Berkarakter Maju</h3> <!-- 681 - 1020 -->
                                </a>
                            </p>
                        </div>
                        <div class="collapse" id="penilaian2">
                            <div class="card card-body">
                                Total Penilaian : 681 - 1020
                            </div>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-check"></i>
                            <a data-bs-toggle="collapse" href="#penilaian3" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <h3>Berkarakter Unggul</h3> <!-- 1021 - 1360 -->
                            </a>
                            </p>
                        </div>
                        <div class="collapse" id="penilaian3">
                            <div class="card card-body">
                                Total Penilaian : 1021 - 1360
                            </div>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-check"></i>
                            <a data-bs-toggle="collapse" href="#penilaian4" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <h3>Berkarakter Juara</h3> <!-- 1361 - 1700 -->
                            </a>
                            </p>
                        </div>
                        <div class="collapse" id="penilaian4">
                            <div class="card card-body">
                                Total Penilaian :1361 - 1700
                            </div>
                        </div>
                    </div><!-- End Feature Item -->

                </div>
            </div>

        </div>

    </div>

</section><!-- /Penilaian Section -->
@endsection