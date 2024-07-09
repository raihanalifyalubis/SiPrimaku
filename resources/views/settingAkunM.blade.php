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
                            <input type="username" name="usernameLama" readonly hidden class="form-control-plaintext" id="usernameLama" aria-describedby="emailHelp" value="{{ session('usernameLogin') }}" placeholder="Username" required>
                            @if(session('usernameTadi') == '')
                            <input type="username" name="username" class="form-control" id="username" aria-describedby="emailHelp" value="{{ session('usernameLogin') }}" placeholder="Username" required>
                            @else
                            <input type="username" name="username" class="form-control" id="username" aria-describedby="emailHelp" value="{{ session('usernameTadi') }}" placeholder="Username" required>
                            @endif
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
                        <div class="row g-2">
                            <div class="form-group col-md">
                                <label for="pstd">Program Studi</label>
                                <div class="input-group mb-3">
                                    @if(session('progstudTadi') == '')
                                    <input type="text" class="form-control" name="program_studi" id="pstd" value="{{ $data_mhs->program_studi }}" placeholder="Program Studi" required>
                                    @else
                                    <input type="text" class="form-control" name="program_studi" id="pstd" value="{{ session('progstudTadi') }}" placeholder="Program Studi" required>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md">
                                <label for="sem">Semester</label>
                                @if(session('semTadi') != '')
                                <?php $data_mhs->semester =  session('semTadi') ?>
                                @endif
                                <select value="{{ $data_mhs->semester }}" name="semester" class="form-select" id="sem" aria-label="Default select example" required>
                                    <option value="1" <?php if ($data_mhs->semester == 1) {
                                                            echo "selected";
                                                        } ?>>1</option>
                                    <option value="2" <?php if ($data_mhs->semester == 2) {
                                                            echo "selected";
                                                        } ?>>2</option>
                                    <option value="3" <?php if ($data_mhs->semester == 3) {
                                                            echo "selected";
                                                        } ?>>3</option>
                                    <option value="4" <?php if ($data_mhs->semester == 4) {
                                                            echo "selected";
                                                        } ?>>4</option>
                                    <option value="5" <?php if ($data_mhs->semester == 5) {
                                                            echo "selected";
                                                        } ?>>5</option>
                                    <option value="6" <?php if ($data_mhs->semester == 6) {
                                                            echo "selected";
                                                        } ?>>6</option>
                                    <option value="7" <?php if ($data_mhs->semester == 7) {
                                                            echo "selected";
                                                        } ?>>7</option>
                                    <option value="8" <?php if ($data_mhs->semester == 8) {
                                                            echo "selected";
                                                        } ?>>8</option>
                                    <option value="9" <?php if ($data_mhs->semester == 9) {
                                                            echo "selected";
                                                        } ?>>9</option>
                                    <option value="9" <?php if ($data_mhs->semester == 10) {
                                                            echo "selected";
                                                        } ?>>10</option>
                                </select>
                            </div>
                        </div>
                        </br>
                        <div style="display:none;">
                            <div class="row g-3">
                                <div class="form-group col-md">
                                    <label for="tgl_1">Tanggal Awal</label>
                                    <div class="input-group mb-3">
                                        @if(session('tgl1Tadi') == '')
                                        <input type="date" class="form-control" name="tanggal_mulai" id="tgl_1" value="{{ $data_mhs->tanggal_mulai }}" placeholder="Tanggal Awal" required>
                                        @else
                                        <input type="date" class="form-control" name="tanggal_mulai" id="tgl_1" value="{{ session('tgl1Tadi') }}" placeholder="Tanggal Awal" required>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md">
                                    <label for="tgl_2">Tanggal Akhir</label>
                                    <div class="input-group mb-3">
                                        @if(session('tgl2Tadi') == '')
                                        <input type="date" class="form-control" name="tanggal_akhir" id="tgl_2" value="{{ $data_mhs->tanggal_akhir }}" placeholder="Tanggal Akhir" required>
                                        @else
                                        <input type="date" class="form-control" name="tanggal_akhir" id="tgl_2" value="{{ session('tgl2Tadi') }}" placeholder="Tanggal Akhir" required>
                                        @endif
                                    </div>
                                </div>
                            </div>
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