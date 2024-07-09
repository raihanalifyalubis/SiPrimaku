@extends('Template.admin')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<h1>Setting Akun - {{ $pembimbing[0]['nama'] }}</h1>
<div class="container">
    @if (session('error'))
    <div class="alert alert-danger" role="alert" align="center">{{ session('error') }}
    </div>
    @endif
    <form action=" {{ url('AdminUbahPmb') }}" method="post">
        @csrf
        <div class="col-md-12 row g-3 input-group">
            <div class="col-md-6">
                <label for="username">Username</label>
                <input type="username" name="usernameLama" readonly hidden class="form-control-plaintext" id="usernameLama" aria-describedby="emailHelp" value="{{ $pembimbing[0]['username'] }}" placeholder="Username" required>
                @if(session('usernameTadi') == '')
                <input type="username" name="username" class="form-control" id="username" aria-describedby="emailHelp" value="{{ $pembimbing[0]['username'] }}" placeholder="Username" required>
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
            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" value="{{ $pembimbing[0]['nama'] }}" placeholder="Nama Lengkap" required>
            @else
            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" value="{{ session('namaTadi') }}" placeholder="Nama Lengkap" required>
            @endif
        </div>
        </br>
        <div class="col-md-12 row g-3 input-group">
            <div class="col-md-6">
                <label for="email">Email</label>
                @if(session('emailTadi') == '')
                <input type="email" class="form-control" name="email" id="email" value="{{ $pembimbing[0]['email'] }}" placeholder="mail@example.com" required>
                @else
                <input type="email" class="form-control" name="email" id="email" value="{{ session('emailTadi') }}" placeholder="mail@example.com" required>
                @endif
            </div>
            <div class="col-md-6">
                <label for="induk">Nomor Induk</label>
                @if(session('indukTadi') == '')
                <input type="text" class="form-control" name="nomor_induk" id="induk" value="{{ $pembimbing[0]['nomor_induk'] }}" placeholder="Nomor Induk" required>
                @else
                <input type="text" class="form-control" name="nomor_induk" id="induk" value="{{ session('indukTadi') }}" placeholder="Nomor Induk" required>
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