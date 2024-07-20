<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <!-- Favicons -->
    <link rel="icon" href="{{url('/images/logo-siprimaku.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    @if (session('telahLogout') == 'Silahkan Melakukan Login Ulang')
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Anda telah keluar dari akun",
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
    <!-- Login 2 - Bootstrap Brain Component -->
    <div class="bg-light py-3 py-md-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-11 col-lg-8 col-xl-7 col-xxl-6">
                    <div class="bg-white p-4 p-md-5 rounded shadow-sm">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-5">
                                    <h3>Log in</h3>
                                </div>
                            </div>
                        </div>
                        @if (session('error'))
                        <div class="alert alert-danger" role="alert" align="center">{{ session('error') }}
                        </div>
                        @endif
                        <form action="{{ route('LoginAdmin') }}" method="POST">
                            @csrf
                            <div class="row gy-3 gy-md-4 overflow-hidden">
                                <div class="col-12">

                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Type ur username" <?php if (session('usernameTadi')) {
                                                                                                                                                    echo "value='" . session('usernameTadi') . "'";
                                                                                                                                                } ?> required>
                                        <label for="username">Username</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                        <label for="password">Password</label>
                                    </div>
                                    <input type="checkbox" onclick="showPassword()" id="cek"> <label for="cek"> Show Password</label>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn btn-lg btn-primary" type="submit">Masuk</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function showPassword() {
        var pw = document.getElementById("password");

        if (pw.type == "password") {
            pw.type = "text";
        } else {
            pw.type = "password";
        }
    }
</script>

</html>