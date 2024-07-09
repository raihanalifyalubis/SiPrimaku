<!doctype html>
<html lang="en">

<head>
    <title>Admin Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{url('/images/logo.png')}}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('css/admin.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>

<body>
    @if (session('berhasilLogin'))
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Berhasil Login",
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
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                <a href="{{ route('AdminPage') }}" class="img logo rounded-circle mb-5" style="background-image: url('images/admin.jpg');"></a>
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pangkalan Data</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <a href="{{ route('getMahasiswa') }}">Mahasiswa</a>
                            </li>
                            <li>
                                <a href="{{ route('getPembimbing') }}">Pembimbing</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('addPembimbing') }}">Tambah Pembimbing</a>
                    </li>
                    <li>
                        <a href="#pengaturanAkun" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">{{ session('namaAdmin') }}</a>
                        <ul class="collapse list-unstyled" id="pengaturanAkun">
                            <li>
                                <a href="{{ route('logoutAdmin') }}">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                </div>
            </nav>
            <div>
                @yield('content')
            </div>

        </div>
    </div>

    <script src="{{ url('admin/jquery.min.js') }}"></script>
    <script src="{{ url('admin/popper.js') }}"></script>
    <script src="{{ url('admin/bootstrap.min.js') }}"></script>
    <script src="{{ url('admin/main.js') }}"></script>
</body>

</html>