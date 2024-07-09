@extends ('Template.homepage')

@section ('content')
@if (session('telahLogout'))
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
<!-- Login 8 - Bootstrap Brain Component -->
<section class="bg-light p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xxl-11">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0">
                        <div class="col-12 col-md-6">
                            <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="{{url('/images/login_image.jpg')}}" alt="Login untuk melanjutkan">
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-5">
                                                <div class="text-center mb-4">
                                                    <img src=" {{url('/images/Logo UIN.png')}}" alt="BootstrapBrain Logo" width="175" height="100">
                                                </div>
                                                <h3 class="text-center">Sign In</h3>
                                                @if (session('telahLogout') == 'Silahkan Melakukan Login Ulang')
                                                <div class="alert alert-success" role="alert" align="center">{{ session('telahLogout') }}
                                                </div>
                                                @endif
                                                @if (session('error'))
                                                <div class="alert alert-danger" role="alert" align="center">{{ session('error') }}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="d-flex gap-3 flex-column">
                                            </div>
                                        </div>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="row gy-3 overflow-hidden">
                                            <div class="col-12">
                                                @if (session('error'))
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="username" id="username" value="{{ session('usernameTadi') }}" placeholder="NIM" required>
                                                    <label for="username" class="form-label">Username</label>
                                                </div>
                                                @else
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="username" id="username" placeholder="NIM" required>
                                                    <label for="username" class="form-label">Username</label>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                                                    <label for="password" class="form-label">Password</label>

                                                </div>
                                                <input type="checkbox" onclick="showPassword()" id="cek"> <label for="cek"> Show Password</label>
                                            </div>

                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-dark btn-lg" type="submit">Log in</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endsection