<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SiPrimaku</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" href="{{ url('/images/logo-siprimaku.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('homepage/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('homepage/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('homepage/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ url('homepage/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ url('homepage/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ url('homepage/css/main.css') }}" rel="stylesheet">

</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<body class="index-page">
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="{{ route('/') }}" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ url('/images/logo-siprimaku.png') }}" alt="">
                <h1 class="sitename" style="color:#00dfc0;">SiPrimaku</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active" style="color:#00dfc0;">Home<br></a></li>
                    <li><a href="#tujuan" style="color:#00dfc0;">Tujuan</a></li>
                    <li><a href="#stat" style="color:#00dfc0;">Statistik</a></li>
                    <li class="dropdown"><a href='#' style="color:#00dfc0;"><span>Penilaian</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#nilai">Klasifikasi Karakter Mahasiswa</a></li>
                            <li><a href="#rincian-nilai">Tabel Aspek Penilaian</a></li>
                        </ul>
                    </li>
                    <li><a href="https://www.instagram.com/raihanalifyalubis_" style="color:#00dfc0;">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            @if (!session('sudahLogin'))
            <a class="btn-getstarted flex-md-shrink-0" href="{{ route('login') }}" style="background-color:#00dfc0;color:black;">Log in</a>
            @endif
        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up" style="color:#00dfc0;">Perkembangan Islam Mahasiswa Berkarakter UINSU Medan</h1>
                        <p data-aos="fade-up" data-aos-delay="100">Aplikasi ini membantu program pembinaan karakter mahasiswa di Universitas Islam Negeri Sumatera Utara</p>
                        <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                            <a href="{{ route('dashboard') }}" class="btn-get-started" style="background-color:#00dfc0;color:black;">Mulai <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                        <img src="{{ url('homepage/img/hero-img.png') }}" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- Tujuan Section -->
        <section id="tujuan" class="values section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2 style="color:#00dfc0;">Tujuan</h2>
                <p style="color:#00dfc0;">Capaian Akhir Pengembangan Karakter Mahasiswa<br></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <img src="{{ url('homepage/img/values-3.png') }}" class="img-fluid" alt="">
                            <h3 style="color:#00dfc0;">Kegiatan Keagamaan</h3>
                            <p>Memperkuat pemahaman nilai nilai keagamaan, meningkatkan praktik ibadah yang bermakna, mengajarkan toleransi antar umat beragama dan membentuk akhlak yang mulia sesuai dengan ajaran islam serta tatacara yang baik dan benar</p>
                        </div>
                    </div><!-- End Card Item -->

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card">
                            <img src="{{ url('homepage/img/values-2.png') }}" class="img-fluid" alt="">
                            <h3 style="color:#00dfc0;">Kegiatan Sosial</h3>
                            <p>Memperkuat empati sosial, meningkatkan kesadaran akan tanggung jawab sosial, mengajarkan kolaborasi yang inklusif dan mengembangkan kepemimpinan yang bertanggung jawab dalam masyarakat serta sadar akan tugas dan fungsinya sebagai mahasiswa sesuai di bidangnya masing masing</p>
                        </div>
                    </div><!-- End Card Item -->

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card">
                            <img src="{{ url('homepage/img/values-1.png') }}" class="img-fluid" alt="">
                            <h3 style="color:#00dfc0;">Literasi Digital</h3>
                            <p>Membentuk pemahaman etika digital, mengajarkan keberagaman perspektif umum, mendorong tanggung jawab dalam penggunaan teknologi dan memupuk keterampilan kritis dalam menilai informasi digital serta dapat mengikuti perubahan atau perkembangan zaman</p>
                        </div>
                    </div><!-- End Card Item -->

                </div>

            </div>

        </section><!-- /Tujuan Section -->

        <!-- Stats Section -->
        <section id="stat" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="bi bi-mortarboard color-blue flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $total_mahasiswa }}" data-purecounter-duration="1" class="purecounter" style="color:#00dfc0;"></span>
                                <p>Jumlah Mahasiswa</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="bi bi-person color-orange flex-shrink-0" style="color: #ee6c20;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $total_pembimbing }}" data-purecounter-duration="1" class="purecounter" style="color:#00dfc0;"></span>
                                <p>Jumlah Dosen</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-6 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="bi bi-calendar-check color-pink flex-shrink-0" style="color: #bb0852;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $total_bimbingan }}" data-purecounter-duration="1" class="purecounter" style="color:#00dfc0;"></span>
                                <p>Laporan Pembinaan Karakter</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->

        <!-- Penilaian Section -->
        <section id="nilai" class="features section">

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
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check" data-toggle="collapse" style="color:#00dfc0;"></i>
                                    <a data-bs-toggle="collapse" href="#penilaian1" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <h3 style="color:#00dfc0;">Berkarakter Baik</h3><!-- 340 - 680 -->
                                    </a>
                                </div>
                                <div class="collapse" id="penilaian1">
                                    <div class="card card-body">
                                        Total Penilaian : 340 - 680
                                    </div>
                                </div>
                            </div><!-- End Feature Item -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check" style="color:#00dfc0;"></i>
                                    <a data-bs-toggle="collapse" href="#penilaian2" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <h3 style="color:#00dfc0;">Berkarakter Maju</h3> <!-- 681 - 1020 -->
                                    </a>
                                </div>
                                <div class="collapse" id="penilaian2">
                                    <div class="card card-body">
                                        Total Penilaian : 681 - 1020
                                    </div>
                                </div>
                            </div><!-- End Feature Item -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check" style="color:#00dfc0;"></i>
                                    <a data-bs-toggle="collapse" href="#penilaian3" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <h3 style="color:#00dfc0;">Berkarakter Unggul</h3> <!-- 1021 - 1360 -->
                                    </a>
                                </div>
                                <div class="collapse" id="penilaian3">
                                    <div class="card card-body">
                                        Total Penilaian : 1021 - 1360
                                    </div>
                                </div>
                            </div><!-- End Feature Item -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check" style="color:#00dfc0;"></i>
                                    <a data-bs-toggle="collapse" href="#penilaian4" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <h3 style="color:#00dfc0;">Berkarakter Juara</h3> <!-- 1361 - 1700 -->
                                    </a>
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

        <!-- Rincian Penilaian Section -->
        <section id="rincian-nilai" class="alt-features section">

            <div class="container">

                <div class="row gy-5">

                    <div class="col-xl-7 d-flex order-2 order-xl-1" data-aos="fade-up" data-aos-delay="200">

                        <div class="row align-self-center gy-5">

                            <table width="50%" class="table table-light table-sm table-responsive-sm table-hover table-bordered">
                                <thead width="50%">
                                    <td>No</td>
                                    <td>Aspek Pembinaan Karakter</td>
                                    <td colspan='5' align='center'>Skor</td>
                                </thead>
                                <?php $i = 1 ?>
                                <tbody class="table-group-divider">
                                    @foreach($aspek_pembinaans as $aspek_pembinaan)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $aspek_pembinaan->penjelasan }}</td>
                                        <td>20</td>
                                        <td>40</td>
                                        <td>60</td>
                                        <td>80</td>
                                        <td>100</td>
                                    </tr>
                                    <?php $i++ ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="col-xl-5 d-flex align-items-center order-1 order-xl-2" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ url('homepage/img/alt-features.png') }}" class="img-fluid" alt="">
                    </div>

                </div>

            </div>

        </section><!-- /Rincian Penilaian Section -->

    </main>

    <footer id="footer" class="footer">
        @include ('copyright')
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ url('homepage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('homepage/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ url('homepage/vendor/aos/aos.js') }}"></script>
    <script src="{{ url('homepage/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ url('homepage/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ url('homepage/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ url('homepage/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('homepage/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ url('homepage/js/main.js') }}"></script>

</body>


</html>