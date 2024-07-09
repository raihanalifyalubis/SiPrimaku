@extends('Template.admin')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<h1>Tambah Pembimbing</h1>
<div class="container">
    @if (session('error'))
    <div class="alert alert-danger" role="alert" align="center">{{ session('error') }}
    </div>
    @endif
    <form id="addPembimbing" action="{{ url('TambahPembimbing') }}" method="post">
        @csrf
        <div class="col-md-12">
            <label for="username">Username</label>
            @if(session('usernameTadi') == '')
            <input type="username" name="username" class="form-control" id="username" aria-describedby="emailHelp" value="" placeholder="Contoh: syah_bagus1" required>
            @else
            <input type="username" name="username" class="form-control" id="username" aria-describedby="emailHelp" value="{{ session('usernameTadi') }}" placeholder="Contoh: syah_bagus1" required>
            @endif
        </div>
        </br>
        <div class="col-md-12 row g-3 input-group">
            <div class="col-md-6">
                <label for="password1">Password</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password1" id="password1" placeholder="Password" required>
                    <span class="input-group-text"><i id="icon1" class="fa fa-eye-slash" style="cursor:pointer" onclick="showPassword1()"></i></span>
                </div>
            </div>
            <div class="col-md-6">
                <label for="password2">Verifikasi Password</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Masukkan Password Sekali Lagi" required>
                    <span class="input-group-text"><i id="icon2" class="fa fa-eye-slash" style="cursor:pointer" onclick="showPassword2()"></i></span>
                </div>
            </div>
        </div>
        </br>
        <div class="col-md-12">
            <label for="nama">Nama Lengkap</label>
            @if(session('namaTadi') == '')
            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" value="" placeholder="Contoh: Muhammad Syah Bagus" required>
            @else
            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" value="{{ session('namaTadi') }}" placeholder="Contoh: Muhammad Syah Bagus" required>
            @endif
        </div>
        </br>
        <div class="col-md-12 row g-3 input-group">
            <div class="col-md-6">
                <label for="email">Email</label>
                @if(session('emailTadi') == '')
                <input type="email" class="form-control" name="email" id="email" value="" placeholder="Contoh: mail@example.com" required>
                @else
                <input type="email" class="form-control" name="email" id="email" value="{{ session('emailTadi') }}" placeholder="Contoh : mail@example.com" required>
                @endif
            </div>
            <div class="col-md-6">
                <label for="induk">Nomor Induk</label>
                @if(session('indukTadi') == '')
                <input type="text" class="form-control" name="nomor_induk" id="induk" value="" placeholder="Contoh: 19920219391391" required>
                @else
                <input type="text" class="form-control" name="nomor_induk" id="induk" value="{{ session('indukTadi') }}" placeholder="Contoh: 19920219391391" required>
                @endif
            </div>
        </div>
        </br>
        <div class="form-group col-md">
            <label for="kode">Kode Admin</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="kode" id="kode" placeholder="Kode Admin" required>
                <span class="input-group-text"><i id="iconKode" class="fa fa-eye-slash" style="cursor:pointer" onclick="showKode()"></i></span>
            </div>
        </div>
        </br>

    </form>
    <div class="row g-3">
        <div class="form-group col-md">
            <button onclick="window.location.reload();" class="btn btn-danger">Reset</button>
        </div>
        <div class="form-group col-md">
            <button form="addPembimbing" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    <script>
        window.onload = function() {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass1 = document.getElementById("password1").value;
            var pass2 = document.getElementById("password2").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Password Tidak Sama, Coba Lagi");
            else
                document.getElementById("password2").setCustomValidity('');
        }

        function showPassword1() {
            var x = document.getElementById("password1");
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
            var x = document.getElementById("password2");
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

        function showKode() {
            var x = document.getElementById("kode");
            var icon = document.getElementById("iconKode");
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