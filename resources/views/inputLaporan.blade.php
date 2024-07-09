@extends('Template.dashboard')

@section('content')
<section class="hero section">
    <div class="container">
        <h1 data-aos="zoom-out">Laporan - {{ $namanya }}</h1>
        <div data-aos="zoom-out" id="MyClockDisplay" class="clock" onload="showDate()"></div>
        <?php
        date_default_timezone_set('Asia/Jakarta');
        $dateNow = strtotime(date('Y-m-d'));
        $tanggalAwal = strtotime($tanggal_mulai);
        $tanggalAkhir = strtotime($tanggal_akhir);
        ?>
        </br></br>
        <div data-aos="fade-up">
            <?php if ($tanggalAkhir < $dateNow) {
                $tanggalnya = $tanggalAkhir;
            } else {
                $tanggalnya = $dateNow;
            }  ?>
            @for($i = 0; $i <= ($tanggalnya - $tanggalAwal) / (60 * 60 * 24); $i++) <?php $tanggal = date('d-m-Y', strtotime($tanggal_mulai . "+" . $i . " days"));
                                                                                    $ada = false;
                                                                                    for ($j = 0; $j < count($hasil_bimbingans); $j++) {
                                                                                        if ($hasil_bimbingans[$j]['tanggal'] == date('Y-m-d', strtotime($tanggal_mulai . "+" . $i . " days")) && $hasil_bimbingans[$j]['status'] == "Sudah Terverifikasi") {

                                                                                    ?> <div class="card border-success mb-3">
                <div class="card-header">{{ $tanggal }}</div>
                <div class="card-body text-success">
                    <h5 class="card-title">Laporan Telah Diverifikasi</h5>
                    <p class="card-text">Laporan anda telah diverifikasi oleh pembimbing</p>
                    <a href="{{ url('rincianLaporan/'.encrypt($hasil_bimbingans[$j]['id'])) }}"><button class="btn btn-primary">Rincian</button></a>
                </div>
        </div>
        <?php
                                                                                            $ada = true;
                                                                                            break;
                                                                                        } else if ($hasil_bimbingans[$j]['tanggal'] == date('Y-m-d', strtotime($tanggal_mulai . "+" . $i . " days")) && $hasil_bimbingans[$j]['status'] == "Belum Selesai") {
                                                                                            if (!session('lihatInfo')) {
        ?>
            <div class="card border-warning mb-3">
                <div class="card-header">{{ $tanggal }}</div>
                <div class="card-body text-warning">
                    <h5 class="card-title">Laporan Belum Selesai</h5>
                    <p class="card-text">Anda belum menyelesaikan laporan anda</p>
                    <a href="{{ url('buatLaporan/'.date('Y-m-d', strtotime($tanggal_mulai . '+' . $i . ' days'))) }}"><button class="btn btn-primary">Lengkapi Laporan</button></a>
                </div>
            </div>
        <?php
                                                                                                $ada = true;
                                                                                                break;
                                                                                            }
                                                                                        } else if ($hasil_bimbingans[$j]['tanggal'] == date('Y-m-d', strtotime($tanggal_mulai . "+" . $i . " days")) && $hasil_bimbingans[$j]['status'] == "Belum Diverifikasi") {


        ?>
        <div class="card border-primary mb-3">
            <div class="card-header">{{ $tanggal }}</div>
            <div class="card-body text-primary">
                <h5 class="card-title">Laporan Belum Diverifikasi</h5>
                <p class="card-text">Laporan telah diterima, silahkan menunggu verifikasi dari pembimbing anda</p>
                <a href="{{ url('rincianLaporan/'.encrypt($hasil_bimbingans[$j]['id'])) }}"><button class="btn btn-primary">Rincian</button></a>
            </div>
        </div>
    <?php
                                                                                            $ada = true;
                                                                                            break;
                                                                                        } else {
                                                                                            $ada = false;
                                                                                        }
                                                                                    }
                                                                                    if (!$ada) {
                                                                                        if (!session('lihatInfo')) {
    ?>
        <div class="card border-danger mb-3">
            <div class="card-header">{{ $tanggal }}</div>
            <div class="card-body text-danger">
                <h5 class="card-title">Laporan Belum Dibuat</h5>
                <p class="card-text">Anda belum membuat laporan hari ini!</p>
                <a href="{{ url('buatLaporan/'.date('Y-m-d', strtotime($tanggal_mulai . '+' . $i . ' days'))) }}"><button class="btn btn-primary">Buat Laporan</button></a>
            </div>
        </div>
<?php
                                                                                        }
                                                                                    }
?>
<br />
@endfor
    </div>
    </div>
</section>
@endsection