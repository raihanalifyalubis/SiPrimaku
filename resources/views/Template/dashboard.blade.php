<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SiPrimaku</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" href="{{url('/images/logo-siprimaku.png')}}" type="image/x-icon">

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

<style>
    .clock {
        color: #000000;
        font-size: 130%;
        font-family: Orbitron;
        letter-spacing: 7px;
    }

    h1 {
        color: #00dfc0;
    }

    .btn-primary {
        background-color: #00dfc0;
        border-color: #00dfc0;
    }
</style>

<body class="index-page">
    @if (session('berhasilLogin'))
    {{ session()->forget('berhasilLogin') }}
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Anda Berhasil Login",
            showConfirmButton: false,
            showClass: {
                popup: `
                        animate__animated
                        animate__fadeInDown
                        animate__faster
                        `
            },
            hideClass: {
                popup: `
                        animate__animated
                        animate__fadeOutUp
                        animate__faster
                        `
            },
            timer: 1500
        });
    </script>
    @endif
    @if (session('berhasilUbah'))
    {{ session()->forget('berhasilUbah') }}
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Akun berhasil diubah!",
            showConfirmButton: false,
            showClass: {
                popup: `
                        animate__animated
                        animate__fadeInDown
                        animate__faster
                        `
            },
            hideClass: {
                popup: `
                        animate__animated
                        animate__fadeOutUp
                        animate__faster
                        `
            },
            timer: 1500
        });
    </script>
    @endif
    @if (session('berhasilInsert'))
    {{ session()->forget('berhasilInsert') }}
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Data Mahasiswa Berhasil Dimasukkan!",
            showConfirmButton: false,
            showClass: {
                popup: `
                        animate__animated
                        animate__fadeInDown
                        animate__faster
                        `
            },
            hideClass: {
                popup: `
                        animate__animated
                        animate__fadeOutUp
                        animate__faster
                        `
            },
            timer: 1500
        });
    </script>
    @endif
    @if (session('berhasilHapus'))
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Data Berhasil Dihapus!",
            showConfirmButton: false,
            showClass: {
                popup: `
                        animate__animated
                        animate__fadeInDown
                        animate__faster
                        `
            },
            hideClass: {
                popup: `
                        animate__animated
                        animate__fadeOutUp
                        animate__faster
                        `
            },
            timer: 1500
        });
    </script>
    @endif
    @if (session('berhasilMasukkan'))
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Data Berhasil Dimasukkan!",
            showConfirmButton: false,
            showClass: {
                popup: `
                        animate__animated
                        animate__fadeInDown
                        animate__faster
                        `
            },
            hideClass: {
                popup: `
                        animate__animated
                        animate__fadeOutUp
                        animate__faster
                        `
            },
            timer: 1500
        });
    </script>
    @endif
    @if (session('berhasilVerif'))
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Laporan Berhasil Diverifikasi",
            showConfirmButton: false,
            showClass: {
                popup: `
                        animate__animated
                        animate__fadeInDown
                        animate__faster
                        `
            },
            hideClass: {
                popup: `
                        animate__animated
                        animate__fadeOutUp
                        animate__faster
                        `
            },
            timer: 1500
        });
    </script>
    @endif
    @if (session('berhasilInput'))
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Laporan Berhasil Diinput",
            showConfirmButton: false,
            showClass: {
                popup: `
                        animate__animated
                        animate__fadeInDown
                        animate__faster
                        `
            },
            hideClass: {
                popup: `
                        animate__animated
                        animate__fadeOutUp
                        animate__faster
                        `
            },
            timer: 1500
        });
    </script>
    @endif
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="{{ route('/') }}" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ url('/images/logo-siprimaku.png') }}" alt="">
                <h1 class="sitename" style="color:#00dfc0;">SiPrimaku</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('dashboard') }}" style="color:#00dfc0;">Home<br></a></li>
                    <li><a href="{{ route('rincian') }}" style="color:#00dfc0;">Rincian<br></a></li>
                    @if(session('statusUser') == 'Mahasiswa')
                    <li><a href="{{ route('inputLaporan') }}" style="color:#00dfc0;">Laporan Harian<br></a></li>
                    @else
                    <li><a href="{{ route('inputMahasiswa') }}" style="color:#00dfc0;">Tambah Mahasiswa<br></a></li>
                    <li><a href="{{ route('lihatLaporan') }}" style="color:#00dfc0;">Verifikasi Laporan
                            @if($belumVerif > 0)
                            <span class="top-0 start-0 translate-middle p-2 bg-danger border border-light rounded-circle"></span>
                            @endif
                            <br></a>
                    </li>
                    @endif
                    <li class="dropdown"><a href="#" style="color:#00dfc0;"><span>{{ session('namaUser') }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i>@if(session('gantiPass'))<span class="top-0 start-0 translate-middle p-2 bg-danger border border-light rounded-circle"></span>@endif</a>
                        <ul>
                            <li><a href="{{ route('akunSet') }}">Pengaturan Akun</a></li>
                            <li><a href="{{ route('ubahPass') }}">Ganti Password @if(session('gantiPass'))<span class="top-0 start-0 translate-middle p-2 bg-danger border border-light rounded-circle"></span>@endif</a></li>
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="mobile-nav-toggle d-xl-none">
                    <button type="button" class="btn btn-primary">
                        <i class="d-xl-none bi bi-list"></i>
                    </button>
                </div>
            </nav>
        </div>
    </header>

    <main class="main">
        @yield('content')
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

    <script>
        function showTime() {
            var date = new Date();
            var h = date.getHours(); // 0 - 23
            var m = date.getMinutes(); // 0 - 59
            var s = date.getSeconds(); // 0 - 59

            if (h == 0) {
                h = 12;
            }

            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
            s = (s < 10) ? "0" + s : s;

            var time = h + ":" + m + ":" + s;
            document.getElementById("MyClockDisplay").innerText = time;
            document.getElementById("MyClockDisplay").textContent = time;

            setTimeout(showTime, 1000);

        }

        function showDate() {
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth();
            var year = date.getFullYear();
            var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var tanggal = day + "  " + bulan[month] + "  " + year;
            document.getElementById("MyClockDisplay").innerText = tanggal;
        }

        showDate();
    </script>

</body>


</html>