@extends ('Template.dashboard')

@section('content')
<section class="hero section">
    <div class="container">
        </br>
        <div class="row" data-aos="zoom-out">
            <div class="col-md-11">
                @if(session('lihatInfo'))
                <h1 data-aos="zoom-out">{{ session('namaMhs') }}</h1>
                @else
                <h1 data-aos="zoom-out">{{ session('namaUser') }}</h1>
                @endif
                </br>
                <div data-aos="zoom-out" id="MyClockDisplay" class="clock" onload="showDate()"></div>
            </div>
            @if(session('lihatInfo'))
            <div class="col-md-1">
                <a href="{{ url('inputLaporan/'.encrypt(session('idMhs'))) }}"><button class="btn btn-primary">Lihat Laporan</button></a>
            </div>
            @else
            @if(intval($nilai[0]['total_hari']) >= 30)
            <div class="col-md-1">
                <button type="submit" form="unduhSurat" class="btn btn-success">Download Surat</button>
            </div>
            @endif
            @endif
        </div>
        </br>
        <div class="table-responsive-sm">
            <table data-aos="fade-up" class="table table-light table-sm table-hover table-bordered">
                <thead>
                    <td align='center' style="vertical-align:middle">No</td>
                    <td align='center' style="vertical-align:middle">Aspek Pembinaan Karakter</td>
                    <td colspan='5' align='center' style="vertical-align:middle">Nilai</td>
                </thead>
                <?php
                $i = 1;
                $count = 0;
                function cekNilai($nilai, $pembagi, $aspek)
                {
                    if ($aspek != "_003") {
                        if ($pembagi != 0) {
                            if ($nilai * 30 / $pembagi == 0) {
                                return 20;
                            } else if ($nilai * 30 / $pembagi < 25) {
                                return 40;
                            } else if ($nilai * 30 / $pembagi < 50) {
                                return 60;
                            } else if ($nilai * 30 / $pembagi < 75) {
                                return 80;
                            } else {
                                return 100;
                            }
                        } else {
                            return 0;
                        }
                    } else {
                        if ($pembagi != 0) {
                            if ($nilai > 99) {
                                return 100;
                            } else if ($nilai == 0) {
                                return 20;
                            } else if ($nilai < 4) {
                                return 40;
                            } else if ($nilai < 7) {
                                return 60;
                            } else {
                                return 80;
                            }
                        } else {
                            return 0;
                        }
                    }
                }
                ?>
                <tbody class="table-group-divider">

                    @foreach($aspek_pembinaans as $aspek_pembinaan)
                    <tr>
                        <?php

                        ?>
                        <td align="center">{{ $i }}</td>
                        <td>{{ $aspek_pembinaan->penjelasan }}</td>
                        <?php
                        if ($i < 10) {
                            $indx = "_00" . $i;
                            echo "<td align='center'>" . cekNilai($nilai[0][$indx], $nilai[0]['total_hari'], $indx) . "</td>";
                        } else {
                            $indx = "_0" . $i;
                            echo "<td align='center'>" . $nilai[0][$indx] . "</td>";
                        }
                        ?>
                    </tr>
                    <?php
                    if ($i < 10) {
                        $indx = "_00" . $i;
                        $count += cekNilai($nilai[0][$indx], $nilai[0]['total_hari'], $indx);
                    } else {
                        $indx = "_0" . $i;
                        $count += $nilai[0][$indx];
                    }

                    $i++;
                    ?>
                    @endforeach
                    <tr>
                        <td colspan="2" align="center">Total</td>
                        <td align="center">{{ $count }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php
if ($count > 340 && $count <= 680) {
    $karakter = "Berkarakter Baik";
} else if ($count > 681 && $count <= 1020) {
    $karakter = "Berkarakter Maju";
} else if ($count > 1021 && $count <= 1360) {
    $karakter = "Berkarakter Unggul";
} else if ($count > 1361 && $count <= 1700) {
    $karakter = "Berkarakter Juara";
} else {
    $karakter = "-";
}
?>
@if(!session('lihatInfo'))
<form action="{{ route('unduhSurat') }}" id="unduhSurat" method="POST">
    @csrf
    <input type="text" name="namaMhs" value="{{ $mahasiswas[0]['nama'] }}" hidden>
    <input type="text" name="nimMhs" value="{{ $mahasiswas[0]['nim'] }}" hidden>
    <input type="text" name="programStudiMhs" value="{{ $mahasiswas[0]['program_studi'] }}" hidden>
    <input type="text" name="nilaiMhs" value="{{ $count }}" hidden>
    <input type="text" name="karakterMhs" value="{{ $karakter }}" hidden>
    <input type="text" name="semesterMhs" value="{{ $mahasiswas[0]['semester'] }}" hidden>
</form>
@endif
@if($karakter != "-")
<section class="features section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2 style="color:#00dfc0;">Penilaian</h2>
        <p style="color:#00dfc0;">Klasifikasi Karakter Mahasiswa<br></p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-5">

            <div class="col-xl-6" data-aos="zoom-out" data-aos-delay="100">
                <img src="{{ url('homepage/img/features.png') }}" class="img-fluid" alt="">
            </div>

            <div class="col-xl-6 d-flex">
                <div class="row align-self-center gy-4">
                    <div class="col-md-30" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-check" style="color:#00dfc0;"></i>
                            <a class="d-inline-flex gap-1">
                                <h3 style="color:#00dfc0;">{{ $karakter }}</h3>
                            </a>
                        </div>
                    </div><!-- End Feature Item -->
                </div>
            </div>
        </div>

    </div>
</section>
@endif

<!-- Tujuan Section -->
<section id="tujuan" class="values section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2 style="color:#00dfc0;">Rincian</h2>
        <p style="color:#00dfc0;">Aspek Capaian Pengembangan Karakter Mahasiswa<br></p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card">
                    <img src="{{ url('homepage/img/values-3.png') }}" class="img-fluid" alt="">
                    <h3 style="color:#00dfc0;">Kegiatan Keagamaan</h3>
                    <p>Memperkuat pemahaman nilai nilai keagamaan, meningkatkan praktik ibadah yang bermakna, mengajarkan toleransi antar umat beragama dan membentuk akhlak yang mulia sesuai dengan ajaran islam serta tatacara yang baik dan benar</p>

                    <h3 style="color:#00dfc0;">{{
                        round($nilai_agama = 
                            (cekNilai($nilai[0]['_001'], $nilai[0]['total_hari'], '_001') + cekNilai($nilai[0]['_002'], $nilai[0]['total_hari'], '_002') + cekNilai($nilai[0]['_003'], $nilai[0]['total_hari'], '_003') + cekNilai($nilai[0]['_004'], $nilai[0]['total_hari'], '_004') + cekNilai($nilai[0]['_005'], $nilai[0]['total_hari'], '_005') + cekNilai($nilai[0]['_006'], $nilai[0]['total_hari'], '_006') + cekNilai($nilai[0]['_007'], $nilai[0]['total_hari'], '_007') + cekNilai($nilai[0]['_008'], $nilai[0]['total_hari'], '_008') + cekNilai($nilai[0]['_009'], $nilai[0]['total_hari'], '_009') )/900*100, 2)
                    }} %</h3>
                </div>
            </div><!-- End Card Item -->

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card">
                    <img src="{{ url('homepage/img/values-2.png') }}" class="img-fluid" alt="">
                    <h3 style="color:#00dfc0;">Kegiatan Sosial</h3>
                    <p>Memperkuat empati sosial, meningkatkan kesadaran akan tanggung jawab sosial, mengajarkan kolaborasi yang inklusif dan mengembangkan kepemimpinan yang bertanggung jawab dalam masyarakat serta sadar akan tugas dan fungsinya sebagai mahasiswa sesuai di bidangnya masing masing</p>
                    <h3 style="color:#00dfc0;">{{
                        round($nilai_sosial = 
                           ($nilai[0]['_012'] + $nilai[0]['_013'] + $nilai[0]['_014'] + $nilai[0]['_015'] + $nilai[0]['_016'] + $nilai[0]['_017'])/600 * 100, 2)
                    }} %</h3>
                </div>
            </div><!-- End Card Item -->

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card">
                    <img src="{{ url('homepage/img/values-1.png') }}" class="img-fluid" alt="">
                    <h3 style="color:#00dfc0;">Literasi Digital</h3>
                    <p>Membentuk pemahaman etika digital, mengajarkan keberagaman perspektif umum, mendorong tanggung jawab dalam penggunaan teknologi dan memupuk keterampilan kritis dalam menilai informasi digital serta dapat mengikuti perubahan atau perkembangan zaman</p>
                    <h3 style="color:#00dfc0;">{{
                        round($nilai_digital = 
                            ($nilai[0]['_010'] + $nilai[0]['_011']) /200*100, 2)
                    }} %</h3>
                </div>
            </div><!-- End Card Item -->

        </div>

    </div>

</section><!-- /Tujuan Section -->

@endsection