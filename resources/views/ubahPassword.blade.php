@extends('Template.dashboard')

@section('content')

<section class="hero section">
    <div class="container">
        <div class="container">
            </br></br>
            <h1 data-aos="fade-up">Ubah Password</h1>
            </br></br>
            <div data-aos="zoom-out">
                @if (session('error'))
                <div class="alert alert-danger" role="alert" align="center">{{ session('error') }}
                </div>
                @endif
                <form action=" {{ route('ubahPass') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input readonly type="username" name="username" class="form-control-plaintext" id="username" aria-describedby="emailHelp" value="{{ session('usernameLogin') }}" placeholder="Username" required>
                        </div>
                        </br>
                        <div class="form-group col-md">
                            <label for="passwordl">Password Lama</label>
                            <div class="input-group mb-3">
                                @if(session('passwordTadi') == '')
                                <input type="password" name="password_lama" class="form-control" id="passwordl" placeholder="Password" required>
                                @else
                                <input type="password" name="password_lama" class="form-control" id="passwordl" placeholder="Password" required value="{{ session('passwordTadi') }}">
                                @endif
                                <span class="input-group-text"><i id="icon" class="fa fa-eye-slash" style="cursor:pointer" onclick="showPassword()"></i></span>
                            </div>
                        </div>
                        </br>
                        <div class="row g-2">
                            <div class="form-group col-md">
                                <label for="password">Password Baru</label>
                                <div class="input-group mb-3">
                                    <input type="password" name="password_baru" class="form-control" id="password" placeholder="New Password" required>
                                    <span class="input-group-text"><i id="icon1" class="fa fa-eye-slash" style="cursor:pointer" onclick="showPassword1()"></i></span>
                                </div>
                            </div>
                            <div class="form-group col-md">
                                <label for="vpassword">Verifikasi Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" name="password_verif" class="form-control" id="vpassword" placeholder="Verifikasi Password">
                                    <span class="input-group-text"><i id="icon2" class="fa fa-eye-slash" style="cursor:pointer" onclick="showPassword2()"></i></span>
                                </div>
                            </div>
                        </div>
                        </br>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    window.onload = function() {
        document.getElementById("password").onchange = validatePassword;
        document.getElementById("vpassword").onchange = validatePassword;
    }

    function validatePassword() {
        var pass2 = document.getElementById("vpassword").value;
        var pass1 = document.getElementById("password").value;
        if (pass1 != pass2)
            document.getElementById("vpassword").setCustomValidity("Password Tidak Sama, Coba Lagi");
        else
            document.getElementById("vpassword").setCustomValidity('');
    }

    function showPassword1() {
        var x = document.getElementById("password");
        var icon = document.getElementById("icon1");
        if (icon.classList.contains("fa-eye-slash")) {
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        } else {
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        }
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function showPassword2() {
        var x = document.getElementById("vpassword");
        var icon = document.getElementById("icon2");
        if (icon.classList.contains("fa-eye-slash")) {
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        } else {
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        }
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function showPassword() {
        var x = document.getElementById("passwordl");
        var icon = document.getElementById("icon");
        if (icon.classList.contains("fa-eye-slash")) {
            console.log("11");
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        } else {
            console.log("22");
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        }
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endsection