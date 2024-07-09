@extends('Template.admin')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<h1>Setting Akun - {{ $mahasiswa[0]['nama'] }}</h1>
<div class="container">
    @if (session('error'))
    <div class="alert alert-danger" role="alert" align="center">{{ session('error') }}
    </div>
    @endif
    <form action=" {{ url('AdminUbahMhs') }}" method="post">
        @csrf
        <div class="col-md-12 row g-3 input-group">
            <div class="col-md-6">
                <label for="username">Username</label>
                <input type="username" name="usernameLama" readonly hidden class="form-control-plaintext" id="usernameLama" aria-describedby="emailHelp" value="{{ $mahasiswa[0]['username'] }}" placeholder="Username" required>
                @if(session('usernameTadi') == '')
                <input type="username" name="username" class="form-control" id="username" aria-describedby="emailHelp" value="{{ $mahasiswa[0]['username'] }}" placeholder="Username" required>
                @else
                <input type="username" name="username" class="form-control" id="username" aria-describedby="emailHelp" value="{{ session('usernameTadi') }}" placeholder="Username" required>
                @endif
            </div>
            <div class="col-md-6">
                <label for="password">Password</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <span class="input-group-text"><i id="icon" class="fa fa-eye-slash" style="cursor:pointer" onclick="showPassword()"></i></span>
                </div>
            </div>
        </div>
        </br>
        <div class="col-md-12">
            <label for="nama">Nama Lengkap</label>
            @if(session('namaTadi') == '')
            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" value="{{ $mahasiswa[0]['nama'] }}" placeholder="Nama Lengkap" required>
            @else
            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" value="{{ session('namaTadi') }}" placeholder="Nama Lengkap" required>
            @endif
        </div>
        </br>
        <div class="col-md-12 row g-3 input-group">
            <div class="col-md-6">
                <label for="pstd">Program Studi</label>
                @if(session('progstudTadi') == '')
                <input type="text" class="form-control" name="program_studi" id="pstd" value="{{ $mahasiswa[0]['program_studi'] }}" placeholder="Program Studi" required>
                @else
                <input type="text" class="form-control" name="program_studi" id="pstd" value="{{ session('progstudTadi') }}" placeholder="Program Studi" required>
                @endif
            </div>
            <div class="col-md-6">
                <label for="sem">Semester</label>
                @if(session('semTadi') == '')
                <input type="text" class="form-control" name="semester" id="sem" value="{{ $mahasiswa[0]['semester'] }}" placeholder="Semester" required>
                @else
                <input type="text" class="form-control" name="semester" id="sem" value="{{ session('semTadi') }}" placeholder="Semester" required>
                @endif
            </div>
        </div>
        </br>
        <div class="col-md-12 row g-3 input-group">
            <div class="col-md-6">
                <label for="tgl_1">Tanggal Awal</label>
                <div class="input-group mb-3">
                    @if(session('tgl1Tadi') == '')
                    <input type="date" class="form-control" name="tanggal_mulai" id="tgl_1" value="{{ $mahasiswa[0]['tanggal_mulai'] }}" placeholder="Tanggal Awal" required>
                    @else
                    <input type="date" class="form-control" name="tanggal_mulai" id="tgl_1" value="{{ session('tgl1Tadi') }}" placeholder="Tanggal Awal" required>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <label for="tgl_2">Tanggal Akhir</label>
                <div class="input-group mb-3">
                    @if(session('tgl2Tadi') == '')
                    <input type="date" class="form-control" name="tanggal_akhir" id="tgl_2" value="{{ $mahasiswa[0]['tanggal_akhir'] }}" placeholder="Tanggal Akhir" required>
                    @else
                    <input type="date" class="form-control" name="tanggal_akhir" id="tgl_2" value="{{ session('tgl2Tadi') }}" placeholder="Tanggal Akhir" required>
                    @endif
                </div>
            </div>
        </div></br>
        <div class="form-group col-md">
            <label for="kode">Kode Admin</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="kode" id="kode" placeholder="Kode Admin" required>
                <span class="input-group-text"><i id="iconKode" class="fa fa-eye-slash" style="cursor:pointer" onclick="showKode()"></i></span>
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
    <script>
        window.onload = function() {
            document.getElementById("tgl_1").onchange = validasiTanggal;
            document.getElementById("tgl_2").onchange = validasiTanggal;
        }

        function validasiTanggal() {
            var tgl_2 = document.getElementById("tgl_2").value;
            var tgl_1 = document.getElementById("tgl_1").value;
            if (numDaysBetween(tgl_2, tgl_1) != 29) {
                document.getElementById("tgl_2").setCustomValidity("Waktu Pembinaan adalah 1 Bulan (30 Hari)");
            } else
                document.getElementById("tgl_2").setCustomValidity('');
        }

        var numDaysBetween = function(d1, d2) {
            var d1 = new Date(d1);
            var d2 = new Date(d2);
            var diff = Math.abs(d1.getTime() - d2.getTime());
            return diff / (1000 * 60 * 60 * 24);
        };

        function showPassword() {
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