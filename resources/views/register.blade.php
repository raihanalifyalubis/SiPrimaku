<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiPrimaku - Register</title>
    <link rel="icon" href="{{url('/images/Logo UIN.png')}}" type="image/x-icon">
</head>
<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
    <!-- Login 8 - Bootstrap Brain Component -->
    <section class="bg-light p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xxl-11">
                    <div class="card border-light-subtle shadow-sm">
                        <div class="row g-0">
                            <div class="col-12 col-md-6">
                                <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="{{url('/images/register_image.jpg')}}" alt="Login untuk melanjutkan">
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
                                                    <h4 class="text-center">Sign Up</h4>
                                                    @if (session('error'))
                                                    <div class="alert alert-danger" role="alert" align="center">{{ session('error') }}
                                                    </div>
                                                    {{session()->forget('error'); }}
                                                    @endif
                                                    @if (session('telahLogout'))
                                                    <div class="alert alert-success" role="alert" align="center">{{ session('telahLogout') }}
                                                    </div>
                                                    {{session()->forget('telahLogout'); }}
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
                                        <form method="POST" action="{{ route('SiPrimaku.login') }}">
                                            @csrf
                                            <div class="row gy-3 overflow-hidden">
                                                <div class="col-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="username" id="username" placeholder="NIM" required>
                                                        <label for="username" class="form-label">Username</label>
                                                    </div>
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
                                            <div class="col-12">
                                                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-5">
                                                    <a href="{{ route('register') }}" class="link-secondary text-decoration-none">Already have account?</a>
                                                </div>
                                            </div>
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
    @include('copyright')
</body>
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

</html>