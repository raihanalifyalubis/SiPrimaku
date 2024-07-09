@extends('Template.dashboard')

@section('content')
<section class="hero section">
    <div class="container">
        <div class="container">
            </br></br>
            <h1 data-aos="fade-up">Pengaturan Akun</h1>
            </br></br>
            <div data-aos="zoom-out">
                @if (session('error'))
                <div class="alert alert-danger" role="alert" align="center">{{ session('error') }}
                </div>
                @endif
                <form action=" {{ route('akunSet') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="username" readonly name="username" class="form-control-plaintext" id="username" aria-describedby="emailHelp" value="{{ session('usernameLogin') }}" placeholder="Username" required>
                        </div>
                        </br>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            @if(session('namaTadi') == '')
                            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" value="{{ session('namaUser') }}" placeholder="Nama Lengkap" required>
                            @else
                            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" value="{{ session('namaTadi') }}" placeholder="Nama Lengkap" required>
                            @endif
                        </div>
                        </br>
                        <div class="form-group">
                            <label for="email">Email</label>
                            @if(session('emailTadi') == '')
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{ $data_pmb->email }}" placeholder="Email" required>
                            @else
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{ session('emailTadi') }}" placeholder="Email" required>
                            @endif
                        </div>
                        </br>
                        <div class="form-group">
                            <label for="nomorin">Nomor Induk</label>
                            @if(session('nomorinTadi') == '')
                            <input type="text" class="form-control" name="nomor_induk" id="nomorin" aria-describedby="emailHelp" value="{{ $data_pmb->nomor_induk }}" placeholder="Nomor Induk" required>
                            @else
                            <input type="text" class="form-control" name="nomor_induk" id="nomorin" aria-describedby="emailHelp" value="{{ session('nomorinTadi') }}" placeholder="Nomor Induk" required>
                            @endif
                        </div>
                        </br>
                        <div class="form-group col-md">
                            <label for="passwordl">Password (verifikasi)</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                <span class="input-group-text"><i id="icon" class="fa fa-eye-slash" style="cursor:pointer" onclick="showPassword()"></i></span>
                            </div>
                        </div>
                        </br>
                        <div class="row g-3">
                            <div class="form-group col-md">
                                <button onclick="window.location.reload();" class="btn btn-danger">Reset</button>
                            </div>
                            <div class="form-group col-md">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    window.onload = function() {
        document.getElementById("tgl_1").onchange = validatePassword;
        document.getElementById("tgl_2").onchange = validatePassword;
    }

    function validatePassword() {
        var tgl1 = document.getElementById("tgl_1").value;
        var tgl2 = document.getElementById("tgl_2").value;
        console.log(tgl1);
        console.log(tgl2);
        console.log(numDaysBetween(tgl1, tgl2));
        if (numDaysBetween(tgl1, tgl2) < 30)
            document.getElementById("tgl_2").setCustomValidity("Waktu Minimal Bimbingan Pengembangan Karakter adalah 1 Bulan");
        else
            document.getElementById("tgl_2").setCustomValidity('');
    }

    var numDaysBetween = function(d1, d2) {
        var d1 = new Date(d1);
        var d2 = new Date(d2);
        var diff = Math.abs(d1.getTime() - d2.getTime());
        return diff / (1000 * 60 * 60 * 24);
    };

    function showPassword1() {
        var x = document.getElementById("password");
        var icon = document.getElementById("icon");
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
</script>
@endsection