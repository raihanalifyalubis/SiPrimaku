@extends ('Template.dashboard')
@section('content')
<section class="hero section">
    <div class="container">
        @if($mahasiswanyas->isEmpty())
        </br>
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Selamat Datang </br> {{ session('namaUser') }}</h1>
                    <p data-aos="fade-up" data-aos-delay="100">Anda belum memiliki mahasiswa yang akan dibimbing, silahkan masukkan terlebih dahulu</p>
                    <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                        <a href="{{ route('inputMahasiswa') }}" class="btn-get-started">Masukkan <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                    <img src="{{ url('homepage/img/hero-img.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>
        @else
        <h1 data-aos="zoom-out">{{ session('namaUser') }}</h1>
        <div data-aos="zoom-out" id="MyClockDisplay" class="clock" onload="showDate()"></div>
        </br>
        <div data-aos="fade-up">
            {{ $mahasiswanyas->links() }}
        </div></br>

        <div class="table-responsive-sm">
            <table data-aos="fade-up" class="table table-light table-sm table-hover table-bordered">
                <thead style="vertical-align:middle">
                    <td align="center">No</td>
                    <td align="center">Nama Mahasiswa</td>
                    <td align="center">Masa Pembinaan Karakter</td>
                    <td align="center">Status</td>
                    <td align="center">Nilai</td>
                    <td align="center">Aksi</td>
                </thead>
                <?php $i = 1 ?>
                <?php
                function ubahTanggal($tanggal)
                {
                    $tanggal = strtotime($tanggal);
                    $hari = date('d', $tanggal);
                    $bulan = date('m', $tanggal);
                    $tahun = date('Y', $tanggal);
                    if ($bulan == 1) {
                        $bulan = "Januari";
                    } else if ($bulan == 2) {
                        $bulan = "Februari";
                    } else if ($bulan == 3) {
                        $bulan = "Maret";
                    } else if ($bulan == 4) {
                        $bulan = "April";
                    } else if ($bulan == 5) {
                        $bulan = "Mei";
                    } else if ($bulan == 6) {
                        $bulan = "Juni";
                    } else if ($bulan == 7) {
                        $bulan = "Juli";
                    } else if ($bulan == 8) {
                        $bulan = "Agustus";
                    } else if ($bulan == 9) {
                        $bulan = "September";
                    } else if ($bulan == 10) {
                        $bulan = "Oktober";
                    } else if ($bulan == 11) {
                        $bulan = "November";
                    } else {
                        $bulan = "Desember";
                    }

                    return $hari . " " . $bulan . " " . $tahun;
                }
                ?>
                <?php
                $nilai_mhs = [];
                function cekNilai($nilai, $pembagi, $aspek)
                {
                    if ($aspek != "_003") {
                        if ($pembagi != 0) {
                            if ($nilai * 30 / $pembagi == 0) {
                                return 20;
                            } else if ($nilai * 30 / $pembagi < 25) {
                                return 40;
                            } else if ($nilai * 30 / $pembagi < 50) {
                                return 60;
                            } else if ($nilai * 30 / $pembagi < 75) {
                                return 80;
                            } else {
                                return 100;
                            }
                        } else {
                            return 0;
                        }
                    } else {
                        if ($pembagi != 0) {
                            if ($nilai > 99) {
                                return 100;
                            } else if ($nilai == 0) {
                                return 20;
                            } else if ($nilai < 4) {
                                return 40;
                            } else if ($nilai < 7) {
                                return 60;
                            } else {
                                return 80;
                            }
                        } else {
                            return 0;
                        }
                    }
                }
                ?>
                @foreach($nilainyas as $nilainya)
                <?php
                $count_nilai = cekNilai($nilainya->_001, $nilainya->total_hari, "_001") + cekNilai($nilainya->_002, $nilainya->total_hari, "_002") + cekNilai($nilainya->_003, $nilainya->total_hari, "_003") + cekNilai($nilainya->_004, $nilainya->total_hari, "_004") + cekNilai($nilainya->_005, $nilainya->total_hari, "_005") + cekNilai($nilainya->_006, $nilainya->total_hari, "_006") + cekNilai($nilainya->_007, $nilainya->total_hari, "_007") + cekNilai($nilainya->_008, $nilainya->total_hari, "_008") + cekNilai($nilainya->_009, $nilainya->total_hari, "_009") + $nilainya->_010 + $nilainya->_011 + $nilainya->_012 + $nilainya->_013 + $nilainya->_014 + $nilainya->_015 + $nilainya->_016 + $nilainya->_017;

                $nilai_mhs[$nilainya->id_mahasiswa] = $count_nilai;

                ?>
                @endforeach
                <tbody>
                    @foreach($mahasiswanyas as $mahasiswanya)
                    <tr style="vertical-align:middle">
                        <td align="center">{{ $i }}</td>
                        <td>{{ $mahasiswanya->nama }}</td>
                        <td align="center">{{ ubahTanggal($mahasiswanya->tanggal_mulai) }} </br>s/d</br> {{ ubahTanggal($mahasiswanya->tanggal_akhir) }}</td>
                        <td align="center">{{ $mahasiswanya->status }}</td>
                        <td align="center">{{ $nilai_mhs[$mahasiswanya->id] }}</td>
                        <td align="center"><a href="{{ url('infoMahasiswa/'.encrypt($mahasiswanya->id)) }}"><button type="button" class="btn btn-primary">Lihat</button></a></td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</section>

@endsection