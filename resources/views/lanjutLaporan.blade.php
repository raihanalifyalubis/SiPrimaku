@extends('Template.dashboard')

@section('content')
<?php
$_001 = $bimbingans[0]['nilai'];
$_002 = $bimbingans[1]['nilai'];
$_003 = $bimbingans[2]['nilai'];
$_004 = $bimbingans[3]['nilai'];
$_005 = $bimbingans[4]['nilai'];
$_006 = $bimbingans[5]['nilai'];
$_007 = $bimbingans[6]['nilai'];
$_008 = $bimbingans[7]['nilai'];
$_009 = $bimbingans[8]['nilai'];
$_010 = $bimbingans[9]['nilai'];
$_011 = $bimbingans[10]['nilai'];
$_012 = $bimbingans[11]['nilai'];
$_013 = $bimbingans[12]['nilai'];
$_014 = $bimbingans[13]['nilai'];
$_015 = $bimbingans[14]['nilai'];
$_016 = $bimbingans[15]['nilai'];
$_017 = $bimbingans[16]['nilai'];
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

$id_laporan = 1;
?>

<?php
$_008_arr = explode(", ", $_008);
?>
<style>
    .btn-circle {
        display: block;
        height: 100%;
        width: 100%;
        border-radius: 50%;
        border: 1px solid blue;
    }

    .btn-hidup {
        background-color: blue;
        color: white;
    }
</style>
<section class="hero section">
    <div class="container">
        </br>
        <h1 data-aos="zoom-out">Laporan - {{ session('namaUser') }}</h1>
        <h5 data-aos="zoom-out">{{ ubahTanggal($tanggal) }}</h5>
        </br>
        </br>
        <div class="row" data-aos="fade-up">
            <div class="w-75 p-3">
                <form action="{{ route('masukLaporan') }}" method="POST" id="buatLaporan" onsubmit="return validateForm()" enctype="multipart/form-data">
                    @csrf
                    <input type="text" value="{{ $tanggal }}" hidden name="tanggal_now">
                    <div id="001" style="display:block;">
                        <h5>1. Shalat 5 Waktu (Berjamaah di Masjid Dianjurkan Khusus Mahasiswa Pria)</h5>
                        </br></br>
                        <div class="row">
                            <?php
                            $sholat = explode(", ", $_001);
                            ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" onclick="coba()" name="_001[]" value="N" id="_001_0" <?php if ($_001 == "N") {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>>
                                <label class="form-check-label" for="_001_0">
                                    Tidak Sholat
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="_001[]" value="S" id="_001_1" <?php
                                                                                                                    if (in_array("S", $sholat)) {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                                <label class="form-check-label" for="_001_1">
                                    Shubuh
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="_001[]" value="Z" id="_001_2" <?php
                                                                                                                    if (in_array("Z", $sholat)) {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                                <label class="form-check-label" for="_001_2">
                                    Dzuhur
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="_001[]" value="A" id="_001_3" <?php
                                                                                                                    if (in_array("A", $sholat)) {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                                <label class="form-check-label" for="_001_3">
                                    Ashar
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="_001[]" value="M" id="_001_4" <?php
                                                                                                                    if (in_array("M", $sholat)) {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                                <label class="form-check-label" for="_001_4">
                                    Maghrib
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="_001[]" value="I" id="_001_5" <?php
                                                                                                                    if (in_array("I", $sholat)) {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                                <label class="form-check-label" for="_001_5">
                                    Isya
                                </label>
                            </div>
                            </br>
                        </div>
                    </div>
                    <div id="002" style="display:none;">
                        <h5>2. Membaca/Menghafal Al-Qur'an Hari ini</h5>
                        </br></br>
                        <div class="row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="_002" value="Y" id="_002_1" <?php
                                                                                                                if ($_002 == "Y") {
                                                                                                                    echo "checked";
                                                                                                                }
                                                                                                                ?>>
                                <label class="form-check-label" for="_002_1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="_002" value="N" id="_002_2" <?php
                                                                                                                if ($_002 == "N") {
                                                                                                                    echo "checked";
                                                                                                                }
                                                                                                                ?>>
                                <label class="form-check-label" for="_002_2">
                                    Tidak
                                </label>
                            </div>
                            </br>
                        </div>
                    </div>
                    <div id="003" style="display:none;">
                        <h5>3. Mendo'akan/Berkomunikasi dengan Ibu dan Ayah</h5>
                        </br></br>
                        <div class="row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="_003" value="Y" id="_003_1" <?php
                                                                                                                if ($_003 == "Y") {
                                                                                                                    echo "checked";
                                                                                                                }
                                                                                                                ?>>
                                <label class="form-check-label" for="_003_1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="_003" value="N" id="_003_2" <?php
                                                                                                                if ($_003 == "N") {
                                                                                                                    echo "checked";
                                                                                                                }
                                                                                                                ?>>
                                <label class="form-check-label" for="_003_2">
                                    Tidak
                                </label>
                            </div>
                            </br>
                        </div>
                    </div>
                    <div id="004" style="display:none;">
                        <h5>4. Sholat Tahajjud Malam Ini</h5>
                        </br></br>
                        <div class="row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="_004" value="Y" id="_004_1" <?php
                                                                                                                if ($_004 == "Y") {
                                                                                                                    echo "checked";
                                                                                                                }
                                                                                                                ?>>
                                <label class="form-check-label" for="_004_1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="_004" value="N" id="_004_2" <?php
                                                                                                                if ($_004 == "N") {
                                                                                                                    echo "checked";
                                                                                                                }
                                                                                                                ?>>
                                <label class="form-check-label" for="_004_2">
                                    Tidak
                                </label>
                            </div>
                            </br>
                        </div>
                    </div>
                    <div id="005" style="display:none;">
                        <h5>5. Sholat Dhuha</h5>
                        </br></br>
                        <div class="row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="_005" value="Y" id="_005_1" <?php
                                                                                                                if ($_005 == "Y") {
                                                                                                                    echo "checked";
                                                                                                                }
                                                                                                                ?>>
                                <label class="form-check-label" for="_005_1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="_005" value="N" id="_005_2" <?php
                                                                                                                if ($_005 == "N") {
                                                                                                                    echo "checked";
                                                                                                                }
                                                                                                                ?>>
                                <label class="form-check-label" for="_005_2">
                                    Tidak
                                </label>
                            </div>
                            </br>
                        </div>
                    </div>
                    <div id="006" style="display:none;">
                        <h5>6. Sholat Rawatib Lengkap Hari Ini</h5>
                        </br></br>
                        <div class="row">
                            <input type="text" id="input_006" class="form-control-plaintext" value="" disabled>
                            <input type="text" id="hasil_006" class="form-control-plaintext" name="_006" value="" hidden>
                            <div class="input-group mb-10">
                                <button class="btn btn-outline-secondary" id="_006_0" onclick="rawatib('0')" type="button">0</button>
                                <button class="btn btn-outline-secondary" id="_006_1" onclick="rawatib('1')" type="button">2</button>
                                <button class="btn btn-outline-secondary" id="_006_2" onclick="rawatib('2')" type="button">4</button>
                                <button class="btn btn-outline-secondary" id="_006_3" onclick="rawatib('3')" type="button">6</button>
                                <button class="btn btn-outline-secondary" id="_006_4" onclick="rawatib('4')" type="button">8</button>
                                <button class="btn btn-outline-secondary" id="_006_5" onclick="rawatib('5')" type="button">10</button>
                                <button class="btn btn-outline-secondary" id="_006_6" onclick="rawatib('6')" type="button">12</button>
                            </div>
                            </br>
                        </div>
                    </div>
                    <div id="007" style="display:none;">
                        <h5>7. Puasa 1213 (Senin Kamis)</h5>
                        </br></br>
                        <div class="row">
                            <?php
                            $tanggal = strtotime($tanggal);
                            ?>
                            <?php
                            if (date('D', $tanggal) != "Mon" && date('D', $tanggal) != "Thu") {
                            } else {
                            ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="_007" value="Y" id="_007_1" <?php
                                                                                                                    if ($_007 == "Y") {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?>>
                                    <label class="form-check-label" for="_007_1">
                                        Ya
                                    </label>
                                </div>
                            <?php } ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="_007" value="N" id="_007_2" <?php
                                                                                                                if ($_007 == "N" || (date('D', $tanggal) != "Mon" && date('D', $tanggal) != "Thu")) {
                                                                                                                    echo "checked";
                                                                                                                }
                                                                                                                ?>>
                                <label class="form-check-label" for="_007_2">
                                    <?php
                                    if (date('D', $tanggal) != "Mon" && date('D', $tanggal) != "Thu") {
                                        echo "Bukan Hari Senin / Kamis";
                                    } else {
                                        echo "Tidak";
                                    }
                                    ?>
                                </label>
                            </div>
                            </br>
                        </div>
                    </div>
                    <div id="008" style="display:none;">
                        <h5>8. Shalat di Masjid Berbeda Hari Ini</h5>
                        <div class="row">
                            <input type="text" id="input_008" class="form-control-plaintext" value="" disabled>
                            <input type="text" id="banyak_008" name="banyak_008" hidden>
                            <div class="input-group mb-10">
                                <button class="btn btn-outline-secondary" id="008_0" onclick="masjidBeda('0')" type="button">0</button>
                                <button class="btn btn-outline-secondary" id="008_1" onclick="masjidBeda('1')" type="button">1</button>
                                <button class="btn btn-outline-secondary" id="008_2" onclick="masjidBeda('2')" type="button">2</button>
                                <button class="btn btn-outline-secondary" id="008_3" onclick="masjidBeda('3')" type="button">3</button>
                                <button class="btn btn-outline-secondary" id="008_4" onclick="masjidBeda('4')" type="button">4</button>
                                <button class="btn btn-outline-secondary" id="008_5" onclick="masjidBeda('5')" type="button">5</button>
                            </div>
                            </br>
                        </div>
                        </br>
                        <div id="masjid1" style="display:none;">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">1</span>
                                @if(count($_008_arr)>0)
                                <input type="text" class="form-control" placeholder="E.g: Masjid Al Ihsan" name="_008[]" id="_008_1" value="{{ $_008_arr[0] }}" aria-label="Username" aria-describedby="basic-addon1">
                                @else
                                <input type="text" class="form-control" placeholder="E.g: Masjid Al Ihsan" name="_008[]" id="_008_1" aria-label="Username" aria-describedby="basic-addon1">
                                @endif
                            </div>
                        </div>
                        <div id="masjid2" style="display:none;">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">2</span>
                                @if(count($_008_arr)>1)
                                <input type="text" class="form-control" placeholder="E.g: Masjid Al Ihsan" name="_008[]" id="_008_2" value="{{ $_008_arr[1] }}" aria-label="Username" aria-describedby="basic-addon1">
                                @else
                                <input type="text" class="form-control" placeholder="E.g: Masjid Al Ihsan" name="_008[]" id="_008_2" aria-label="Username" aria-describedby="basic-addon1">
                                @endif
                            </div>
                        </div>
                        <div id="masjid3" style="display:none;">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">3</span>
                                @if(count($_008_arr)>2)
                                <input type="text" class="form-control" placeholder="E.g: Masjid Al Ihsan" name="_008[]" id="_008_3" value="{{ $_008_arr[2] }}" aria-label="Username" aria-describedby="basic-addon1">
                                @else
                                <input type="text" class="form-control" placeholder="E.g: Masjid Al Ihsan" name="_008[]" id="_008_3" aria-label="Username" aria-describedby="basic-addon1">
                                @endif
                            </div>
                        </div>
                        <div id="masjid4" style="display:none;">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">4</span>
                                @if(count($_008_arr)>3)
                                <input type="text" class="form-control" placeholder="E.g: Masjid Al Ihsan" name="_008[]" id="_008_4" value="{{ $_008_arr[3] }}" aria-label="Username" aria-describedby="basic-addon1">
                                @else
                                <input type="text" class="form-control" placeholder="E.g: Masjid Al Ihsan" name="_008[]" id="_008_4" aria-label="Username" aria-describedby="basic-addon1">
                                @endif
                            </div>
                        </div>
                        <div id="masjid5" style="display:none;">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">5</span>
                                @if(count($_008_arr)>3)
                                <input type="text" class="form-control" placeholder="E.g: Masjid Al Ihsan" name="_008[]" id="_008_5" value="{{ $_008_arr[4] }}" aria-label="Username" aria-describedby="basic-addon1">
                                @else
                                <input type="text" class="form-control" placeholder="E.g: Masjid Al Ihsan" name="_008[]" id="_008_5" aria-label="Username" aria-describedby="basic-addon1">
                                @endif
                            </div>
                        </div>
                        </br>
                    </div>
                    <div id="009" style="display:none;">
                        <h5>9. Berinfaq Hari Ini</h5>
                        </br></br>
                        <div class="row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="_009" value="Y" id="009_1" <?php
                                                                                                                if ($_009 == "Y") {
                                                                                                                    echo "checked";
                                                                                                                }
                                                                                                                ?>>
                                <label class="form-check-label" for="009_1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="_009" value="N" id="009_2" <?php
                                                                                                                if ($_009 == "N") {
                                                                                                                    echo "checked";
                                                                                                                }
                                                                                                                ?>>
                                <label class="form-check-label" for="009_2">
                                    Tidak
                                </label>
                            </div>
                            </br>
                        </div>
                    </div>
                    <div id="010" style="display:none;">
                        <h5>10. Memiliki Email dan Blog</h5>
                        </br></br>
                        <div class="row">
                            <?php
                            $hasil1 = [
                                "Memiliki email dan blog tidak standard",
                                "Memiliki email dan blog dari perguruan tinggi",
                                "Memiliki email dan blog aktif minimal satu pekan sekali update",
                                "Memiliki email dan blog aktif setiap hari",
                                "Menjadikan email dan blog dalam kehidupan akademik"
                            ];
                            ?>
                            <select class="form-select" name="_010" aria-label="Default select example" id="010">
                                <option value="" hidden selected>Open this select menu</option>
                                @for($i = 0; $i < count($hasil1); $i++) <option <?php if ($_010 == $i + 1) {
                                                                                    echo "selected";
                                                                                } ?> value="{{ ($i+1) }}">{{ $hasil1[$i] }}</option>
                                    @endfor
                            </select>
                            </br>
                        </div>
                    </div>
                    <div id="011" style="display:none;">
                        <h5>11. Memiliki Google Drive</h5>
                        </br></br>
                        <div class="row">
                            <?php
                            $hasil2 = [
                                "Memiliki google drive pribadi",
                                "Memiliki google drive dimanfaatkan satu pekan sekali",
                                "Mendayagunakan google drive setiap hari",
                                "Memfungsikan google dirive untuk kegiatan pembelajaran",
                                "Mendayagunakan google drive untuk mendapatkan pendapatan tambahan"
                            ];
                            ?>
                            <select class="form-select" name="_011" aria-label="Default select example" id="011">
                                <option value="" hidden selected>Open this select menu</option>
                                @for($i = 0; $i < count($hasil2); $i++) <option <?php if ($_011 == $i + 1) {
                                                                                    echo "selected";
                                                                                } ?> value="{{ ($i+1) }}">{{ $hasil2[$i] }}</option>
                                    @endfor
                            </select>
                            </br>
                        </div>
                    </div>
                    <div id="012" style="display:none;">
                        <h5>12. Keterlibatan Dalam Organisasi Sosial dan Keagamaan</h5>
                        </br></br>
                        <div class="row">
                            <?php
                            $hasil3 = [
                                "Tidak pernah terlibat di organisasi sosial/keagamaan",
                                "Terlibat/tercatat di satu organisasi sosial/keagamaan",
                                "Aktif menjadi pengurus pada organisasi sosial/keagamaan",
                                "Menjadi pengurus organisasi sosial/keagamaan tingkat kabupaten",
                                "Menjadi pengurus inti pada organisasi sosial/keagamaan tingkat provinsi"
                            ];
                            ?>
                            <select class="form-select" name="_012" aria-label="Default select example" id="012">
                                <option value="" hidden selected>Open this select menu</option>
                                @for($i = 0; $i < count($hasil3); $i++) <option <?php if ($_012 == $i + 1) {
                                                                                    echo "selected";
                                                                                } ?> value="{{ ($i+1) }}">{{ $hasil3[$i] }}</option>
                                    @endfor
                            </select>
                            </br>
                        </div>
                    </div>
                    <div id="013" style="display:none;">
                        <h5>13. Mengabdi Sesuai Tujuan Prodi</h5>
                        </br></br>
                        <div class="row">
                            <?php
                            $hasil4 = [
                                "Tidak pernah mengabdi",
                                "Mengajar/mengabdikan diri pada orang lain",
                                "Mengabdi beberapa pekan selama pembinaan",
                                "Mengabdi secara permanen di satuan lembaga",
                                "Menjadi pengelola di tingkat lembaga"
                            ];
                            ?>
                            <select class="form-select" name="_013" aria-label="Default select example" id="013">
                                <option value="" hidden selected>Open this select menu</option>
                                @for($i = 0; $i < count($hasil4); $i++) <option <?php if ($_013 == $i + 1) {
                                                                                    echo "selected";
                                                                                } ?> value="{{ ($i+1) }}">{{ $hasil4[$i] }}</option>
                                    @endfor
                            </select>
                            </br>
                        </div>
                    </div>
                    <div id="014" style="display:none;">
                        <h5>14. Membina Sekelompok Masyarakat</h5>
                        </br></br>
                        <div class="row">
                            <?php
                            $hasil5 = [
                                "Tidak pernah membina",
                                "Membina masyarakat dengan menggantikan orang lain",
                                "Membina beberapa pekan selama pembinaan",
                                "Membina secara permanen di lembaga resmi",
                                "Mendirikan dan menjadi pemilik lembaga pembinaan"
                            ];
                            ?>
                            <select class="form-select" name="_014" aria-label="Default select example" id="014">
                                <option value="" hidden selected>Open this select menu</option>
                                @for($i = 0; $i < count($hasil5); $i++) <option <?php if ($_014 == $i + 1) {
                                                                                    echo "selected";
                                                                                } ?> value="{{ ($i+1) }}">{{ $hasil5[$i] }}</option>
                                    @endfor
                            </select>
                            </br>
                        </div>
                    </div>
                    <div id="015" style="display:none;">
                        <h5>15. Menulis di Jurnal</h5>
                        </br></br>
                        <div class="row">
                            <?php
                            $hasil6 = [
                                "Tidak pernah menulis jurnal",
                                "Pernah belajar kursus menulis jurnal",
                                "Pernah menulis tetapi tidak diterbitkan",
                                "Pernah sekali tulisan diterbitkan jurnal",
                                "Menjadi penulis tetap di jurnal tertentu"
                            ];
                            ?>
                            <select class="form-select" name="_015" aria-label="Default select example" id="015">
                                <option value="" hidden selected>Open this select menu</option>
                                @for($i = 0; $i < count($hasil6); $i++) <option <?php if ($_015 == $i + 1) {
                                                                                    echo "selected";
                                                                                } ?> value="{{ ($i+1) }}">{{ $hasil6[$i] }}</option>
                                    @endfor
                            </select>
                            </br>
                        </div>
                    </div>
                    <div id="016" style="display:none;">
                        <h5>16. Menulis di Harian Surat Kabar</h5>
                        </br></br>
                        <div class="row">
                            <?php
                            $hasil7 = [
                                "Tidak pernah menulis surat kabar",
                                "Pernah belajar kursus menulis surat kabar",
                                "Pernah menulis tetapi tidak diterbitkan",
                                "Pernah sekali tulisan diterbitkan surat kabar",
                                "Menjadi penulis tetap di surat kabar tertentu"
                            ];
                            ?>
                            <select class="form-select" name="_016" aria-label="Default select example" id="016">
                                <option value="" hidden selected>Open this select menu</option>
                                @for($i = 0; $i < count($hasil7); $i++) <option <?php if ($_016 == $i + 1) {
                                                                                    echo "selected";
                                                                                } ?> value="{{ ($i+1) }}">{{ $hasil7[$i] }}</option>
                                    @endfor
                            </select>
                            </br>
                        </div>
                    </div>
                    <div id="017" style="display:none;">
                        <h5>17. Menulis Buku</h5>
                        </br></br>
                        <div class="row">
                            <?php
                            $hasil8 = [
                                "Tidak pernah menulis buku",
                                "Pernah belajar kursus/pelatihan menulis buku",
                                "Pernah menulis buku tetapi tidak diterbitkan",
                                "Pernah sekali menulis buku diterbitkan ber-ISBN",
                                "Menjadi penulis di beberapa buku"
                            ];
                            ?>
                            <select class="form-select" name="_017" aria-label="Default select example" id="017">
                                <option value="" hidden selected>Open this select menu</option>
                                @for($i = 0; $i < count($hasil8); $i++) <option <?php if ($_017 == $i + 1) {
                                                                                    echo "selected";
                                                                                } ?> value="{{ ($i+1) }}">{{ $hasil8[$i] }}</option>
                                    @endfor
                            </select>
                            </br>
                        </div>
                    </div>
                </form>
            </div>
            <div class="w-25 p-3" align="center">
                <button class="btn btn-primary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive"><i class="fa fa-list"></i></button>

                <div class="offcanvas-lg offcanvas-top" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
                    <div class="offcanvas-body">
                        <div class="container">
                            <div class="row">
                                <div class="w-25 p-3"><button onclick="tampilkan('001')" id="btn_001" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close" class="btn-hidup btn-circle">1</button></div>
                                <div class="w-25 p-3"><button onclick="tampilkan('002')" id="btn_002" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close" class="btn-circle">2</button></div>
                                <div class="w-25 p-3"><button onclick="tampilkan('003')" id="btn_003" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close" class="btn-circle">3</button></div>
                                <div class="w-25 p-3"><button onclick="tampilkan('004')" id="btn_004" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close" class="btn-circle">4</button></div>
                            </div>
                            <div class="w-100 d-none d-md-block"></div>
                            <div class="row">
                                <div class="w-25 p-3"><button onclick="tampilkan('005')" id="btn_005" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close" class="btn-circle">5</button></div>
                                <div class="w-25 p-3"><button onclick="tampilkan('006')" id="btn_006" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close" class="btn-circle">6</button></div>
                                <div class="w-25 p-3"><button onclick="tampilkan('007')" id="btn_007" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close" class="btn-circle">7</button></div>
                                <div class="w-25 p-3"><button onclick="tampilkan('008')" id="btn_008" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close" class="btn-circle">8</button></div>
                            </div>
                            <div class="w-100 d-none d-md-block"></div>
                            <div class="row">
                                <div class="w-25 p-3"><button onclick="tampilkan('009')" id="btn_009" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close" class="btn-circle">9</button></div>
                                <div class="w-25 p-3"><button onclick="tampilkan('010')" id="btn_010" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close" class="btn-circle">10</button></div>
                                <div class="w-25 p-3"><button onclick="tampilkan('011')" id="btn_011" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close" class="btn-circle">11</button></div>
                                <div class="w-25 p-3"><button onclick="tampilkan('012')" id="btn_012" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close" class="btn-circle">12</button></div>
                            </div>
                            <div class="w-100 d-none d-md-block"></div>
                            <div class="row">
                                <div class="w-25 p-3"><button onclick="tampilkan('013')" id="btn_013" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close" class="btn-circle">13</button></div>
                                <div class="w-25 p-3"><button onclick="tampilkan('014')" id="btn_014" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close" class="btn-circle">14</button></div>
                                <div class="w-25 p-3"><button onclick="tampilkan('015')" id="btn_015" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close" class="btn-circle">15</button></div>
                                <div class="w-25 p-3"><button onclick="tampilkan('016')" id="btn_016" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close" class="btn-circle">16</button></div>
                            </div>
                            <div class="w-100 d-none d-md-block"></div>
                            <div class="row">
                                <div class="w-25 p-3"><button onclick="tampilkan('017')" id="btn_017" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close" class="btn-circle">17</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button class="btn btn-secondary" onclick="prev()" style="display:none;" id="btn-prev">Previous</button>
                <button class="btn btn-primary" onclick="next()" style="display:inline;" id="btn-next">Next</button>
            </div>
            </br></br></br>
            <div>
                <button class="btn btn-success" form="buatLaporan" id="btn-submit">Save Changes</button>
            </div>
        </div>
    </div>
</section>


<script>
    var tampilNow = "001";
    var btnNext = document.getElementById("btn-next");
    var btnPrev = document.getElementById("btn-prev");
    var jumlahRwt = "1";
    var jumlahMsjd = "1";

    function next() {

        var next = parseInt(tampilNow) + 1;

        if (next < 10) {
            tampilkan("00" + next);
        } else {
            tampilkan("0" + next);
        }
    }

    function prev() {

        var next = parseInt(tampilNow) - 1;

        if (next < 10) {
            tampilkan("00" + next);
        } else {
            tampilkan("0" + next);
        }
    }

    function rawatib(jumlah) {
        var input = document.getElementById("input_006");
        var hasil = document.getElementById("hasil_006");
        var tombol = document.getElementById("_006_" + jumlah);
        var tombolNow = document.getElementById("_006_" + jumlahRwt);

        tombol.classList.remove("btn-outline-secondary");
        tombol.classList.add("btn-secondary");

        if (jumlah != jumlahRwt) {
            tombolNow.classList.add("btn-outline-secondary");
            tombolNow.classList.remove("btn-secondary");
        }

        hasil.value = parseInt(jumlah) * 2;

        input.value = (parseInt(jumlah) * 2) + " Rakaat";

        jumlahRwt = jumlah;
    }

    function masjidBeda(jumlah) {
        var input = document.getElementById("input_008");
        var banyak = document.getElementById("banyak_008");
        var tombol = document.getElementById("008_" + jumlah);
        var tombolNow = document.getElementById("008_" + jumlahMsjd);

        tombol.classList.remove("btn-outline-secondary");
        tombol.classList.add("btn-secondary");

        if (jumlah != jumlahMsjd) {
            tombolNow.classList.add("btn-outline-secondary");
            tombolNow.classList.remove("btn-secondary");
        }

        for (i = 0; i < 5; i++) {
            var div = document.getElementById("masjid" + (i + 1));
            div.style.display = "none";
        }

        for (i = 0; i < parseInt(jumlah); i++) {
            let div1 = document.getElementById("masjid" + (i + 1));
            div1.style.display = "block";
        }

        banyak.value = parseInt(jumlah);
        input.value = parseInt(jumlah) + " Masjid Berbeda";

        jumlahMsjd = jumlah;
    }

    function tampilkan(id) {
        var ubah = document.getElementById(id);
        var now = document.getElementById(tampilNow);
        var ubahButton = document.getElementById("btn_" + id);
        var nowButton = document.getElementById("btn_" + tampilNow);
        var submitButton = document.getElementById("btn-submit");

        if (id == "001") {
            btnPrev.style.display = "none";
        } else {
            btnPrev.style.display = "inline";
        }
        if (id == "017") {
            btnNext.style.display = "none";

        } else {
            btnNext.style.display = "inline";
        }
        now.style.display = "none";
        ubah.style.display = "block";

        nowButton.classList.remove("btn-hidup");
        ubahButton.classList.add("btn-hidup");

        tampilNow = id;
    }

    function coba() {
        var cek = document.getElementById("_001_0");
        var shubuh = document.getElementById("_001_1");
        var dzuhur = document.getElementById("_001_2");
        var ashar = document.getElementById("_001_3");
        var maghrib = document.getElementById("_001_4");
        var isya = document.getElementById("_001_5");

        if (cek.checked) {
            shubuh.disabled = true;
            shubuh.checked = false;
            dzuhur.disabled = true;
            dzuhur.checked = false;
            ashar.disabled = true;
            ashar.checked = false;
            maghrib.disabled = true;
            maghrib.checked = false;
            isya.disabled = true;
            isya.checked = false;
        } else {
            shubuh.disabled = false;
            dzuhur.disabled = false;
            ashar.disabled = false;
            maghrib.disabled = false;
            isya.disabled = false;
        }
    }

    function validateForm() {
        var banyak_008 = document.getElementById('banyak_008');
        if (parseInt(banyak_008.value) > 0) {
            for (var i = 0; i < parseInt(banyak_008.value); i++) {
                var cek = document.getElementById('_008_' + (i + 1))
                if (cek.value == '') {
                    tampilkan('008');
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: "Data Tidak Boleh Kosong",
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
                    return false;
                }
            }
        }
    };
</script>
<?php
if ($_006 != "") {
    echo "<script> rawatib('" . ($_006 / 2) . "'); </script>";
}
if ($_008 != "" && $_008 != "0") {
    echo "<script> masjidBeda('" . (count(explode(", ", $_008))) . "'); </script>";
} else if ($_008 == "0") {
    echo "<script> masjidBeda(0); </script>";
}
if ($_001 == "N") {
    echo "<script> coba(); </script>";
}
?>
@endsection