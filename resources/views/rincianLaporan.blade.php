@extends('Template.dashboard')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
for ($i = 0; $i < count($mahasiswas); $i++) {
    if ($mahasiswas[$i]['id'] == $hasil_bimbingan['id_mahasiswa']) {
        $nama_mahasiswa = $mahasiswas[$i]['nama'];
    }
}
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
        <h1 data-aos="zoom-out">Laporan - {{ $nama_mahasiswa }}</h1>
        <h5 data-aos="zoom-out">{{ ubahTanggal($hasil_bimbingan['tanggal']) }}</h5>
        </br>
        </br>
        <div class="row" data-aos="fade-up">
            <div class="w-75 p-3">
                <div id="001" style="display:block;">
                    <h5>1. Shalat 5 Waktu (Berjamaah di Masjid Dianjurkan Khusus Mahasiswa Pria)</h5>
                    </br></br>
                    <?php
                    $sholat = explode(", ", $_001);
                    ?>
                    <div class="row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" <?php
                                                                                                            if (in_array("N", $sholat)) {
                                                                                                                echo "checked";
                                                                                                            } ?> disabled>
                            <label class="form-check-label" for="flexCheckDisabled">
                                Tidak Sholat
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" <?php
                                                                                                            if (in_array("S", $sholat)) {
                                                                                                                echo "checked";
                                                                                                            } ?> disabled>
                            <label class="form-check-label" for="flexCheckDisabled">
                                Shubuh
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" <?php
                                                                                                                    if (in_array("Z", $sholat)) {
                                                                                                                        echo "checked";
                                                                                                                    } ?> disabled>
                            <label class="form-check-label" for="flexCheckCheckedDisabled">
                                Dzuhur
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" <?php
                                                                                                                    if (in_array("A", $sholat)) {
                                                                                                                        echo "checked";
                                                                                                                    } ?> disabled>
                            <label class="form-check-label" for="flexCheckCheckedDisabled">
                                Ashar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" <?php
                                                                                                                    if (in_array("M", $sholat)) {
                                                                                                                        echo "checked";
                                                                                                                    } ?> disabled>
                            <label class="form-check-label" for="flexCheckCheckedDisabled">
                                Maghrib
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" <?php
                                                                                                                    if (in_array("I", $sholat)) {
                                                                                                                        echo "checked";
                                                                                                                    } ?> disabled>
                            <label class="form-check-label" for="flexCheckCheckedDisabled">
                                Isya
                            </label>
                        </div>
                        </br>
                    </div>
                </div>
                <div id="002" style="display:none;">
                    <h5>2. Membaca/Menghafal Al-Qur'an Hari Ini</h5>
                    </br></br>
                    <div class="row">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="002" id="flexRadioDisabled" <?php
                                                                                                            if ($_002 == "Y") {
                                                                                                                echo "checked";
                                                                                                            }
                                                                                                            ?> disabled>
                            <label class="form-check-label" for="flexRadioDisabled">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="002" id="flexRadioCheckedDisabled" <?php
                                                                                                                    if ($_002 == "N") {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?> disabled>
                            <label class="form-check-label" for="flexRadioCheckedDisabled">
                                Tidak
                            </label>
                        </div>
                        </br>
                    </div>
                </div>
                <div id="003" style="display:none;">
                    <h5>3. Mendo'akan/Berkomunikasi dengan Ibu dan Ayah Hari Ini</h5>
                    </br></br>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="003" id="flexRadioDisabled" <?php
                                                                                                                if ($_003 == "Y") {
                                                                                                                    echo "checked";
                                                                                                                }
                                                                                                                ?> disabled>
                                <label class="form-check-label" for="flexRadioDisabled">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="003" id="flexRadioCheckedDisabled" <?php
                                                                                                                        if ($_003 == "N") {
                                                                                                                            echo "checked";
                                                                                                                        }
                                                                                                                        ?> disabled>
                                <label class="form-check-label" for="flexRadioCheckedDisabled">
                                    Tidak
                                </label>
                            </div>
                            </br>
                        </div>
                    </div>
                </div>
                <div id="004" style="display:none;">
                    <h5>4. Sholat Tahajjud Malam Ini</h5>
                    </br></br>
                    <div class="row">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="004" id="flexRadioDisabled" <?php
                                                                                                            if ($_004 == "Y") {
                                                                                                                echo "checked";
                                                                                                            }
                                                                                                            ?> disabled>
                            <label class="form-check-label" for="flexRadioDisabled">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="004" id="flexRadioCheckedDisabled" <?php
                                                                                                                    if ($_004 == "N") {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?> disabled>
                            <label class="form-check-label" for="flexRadioCheckedDisabled">
                                Tidak
                            </label>
                        </div>
                        </br>
                    </div>
                </div>
                <div id="005" style="display:none;">
                    <h5>5. Sholat Dhuha Hari Ini</h5>
                    </br></br>
                    <div class="row">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="005" id="flexRadioDisabled" <?php
                                                                                                            if ($_005 == "Y") {
                                                                                                                echo "checked";
                                                                                                            }
                                                                                                            ?> disabled>
                            <label class="form-check-label" for="flexRadioDisabled">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="005" id="flexRadioCheckedDisabled" <?php
                                                                                                                    if ($_005 == "N") {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?> disabled>
                            <label class="form-check-label" for="flexRadioCheckedDisabled">
                                Tidak
                            </label>
                        </div>
                        </br>
                    </div>
                </div>
                <div id="006" style="display:none;">
                    <h5>6. Sholat Rawatib Hari Ini</h5>
                    </br></br>
                    <div class="row">
                        <input type="text" id="input_006" class="form-control-plaintext" value="{{ $_006 }} Rakaat" disabled>
                        <div class="input-group mb-10">
                            <button class="btn btn-outline-secondary" id="006_0" onclick="rawatib('0')" type="button" disabled>0</button>
                            <button class="btn btn-outline-secondary" id="006_1" onclick="rawatib('1')" type="button" disabled>2</button>
                            <button class="btn btn-outline-secondary" id="006_2" onclick="rawatib('2')" type="button" disabled>4</button>
                            <button class="btn btn-outline-secondary" id="006_3" onclick="rawatib('3')" type="button" disabled>6</button>
                            <button class="btn btn-outline-secondary" id="006_4" onclick="rawatib('4')" type="button" disabled>8</button>
                            <button class="btn btn-outline-secondary" id="006_5" onclick="rawatib('5')" type="button" disabled>10</button>
                            <button class="btn btn-outline-secondary" id="006_6" onclick="rawatib('6')" type="button" disabled>12</button>
                        </div>
                        </br>
                    </div>
                </div>
                <div id="007" style="display:none;">
                    <h5>7. Puasa 1213 (Senin Kamis)</h5>
                    </br></br>
                    <div class="row">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="007" id="flexRadioDisabled" <?php
                                                                                                            if ($_007 == "Y") {
                                                                                                                echo "checked";
                                                                                                            }
                                                                                                            ?> disabled>
                            <label class="form-check-label" for="flexRadioDisabled">
                                Ya
                            </label>
                        </div>
                        <?php
                        $tanggal = strtotime($bimbingans[0]['tanggal']);
                        ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="007" id="flexRadioCheckedDisabled" <?php
                                                                                                                    if ($_007 == "N") {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?> disabled>
                            <label class="form-check-label" for="flexRadioCheckedDisabled">
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
                    </br>
                    <div class="row">
                        <input type="text" id="input_008" class="form-control-plaintext" value="" disabled>
                        <input type="text" id="banyak_008" name="banyak_008" hidden>
                        <div class="input-group mb-10">
                            <button class="btn btn-outline-secondary" id="008_0" onclick="masjidBeda('0')" type="button" disabled>0</button>
                            <button class="btn btn-outline-secondary" id="008_1" onclick="masjidBeda('1')" type="button" disabled>1</button>
                            <button class="btn btn-outline-secondary" id="008_2" onclick="masjidBeda('2')" type="button" disabled>2</button>
                            <button class="btn btn-outline-secondary" id="008_3" onclick="masjidBeda('3')" type="button" disabled>3</button>
                            <button class="btn btn-outline-secondary" id="008_4" onclick="masjidBeda('4')" type="button" disabled>4</button>
                            <button class="btn btn-outline-secondary" id="008_5" onclick="masjidBeda('5')" type="button" disabled>5</button>
                        </div>
                        </br>
                    </div>
                    </br>
                    <div id="masjid1" style="display:none;">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">1</span>
                            @if(count($_008_arr)>0)
                            <input type="text" class="form-control" placeholder="E.g: Masjid Al Ihsan" name="_008[]" id="_008_1" value="{{ $_008_arr[0] }}" aria-label="Username" aria-describedby="basic-addon1" disabled>
                            @else
                            <input type="text" class="form-control" placeholder="E.g: Masjid Al Ihsan" name="_008[]" id="_008_1" aria-label="Username" aria-describedby="basic-addon1">
                            @endif
                        </div>
                    </div>
                    <div id="masjid2" style="display:none;">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">2</span>
                            @if(count($_008_arr)>1)
                            <input type="text" class="form-control" placeholder="E.g: Masjid Al Ihsan" name="_008[]" id="_008_2" value="{{ $_008_arr[1] }}" aria-label="Username" aria-describedby="basic-addon1" disabled>
                            @else
                            <input type="text" class="form-control" placeholder="E.g: Masjid Al Ihsan" name="_008[]" id="_008_2" aria-label="Username" aria-describedby="basic-addon1" disabled>
                            @endif
                        </div>
                    </div>
                    <div id="masjid3" style="display:none;">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">3</span>
                            @if(count($_008_arr)>2)
                            <input type="text" class="form-control" placeholder="E.g: Masjid Al Ihsan" name="_008[]" id="_008_3" value="{{ $_008_arr[2] }}" aria-label="Username" aria-describedby="basic-addon1" disabled>
                            @else
                            <input type="text" class="form-control" placeholder="E.g: Masjid Al Ihsan" name="_008[]" id="_008_3" aria-label="Username" aria-describedby="basic-addon1" disabled>
                            @endif
                        </div>
                    </div>
                    <div id="masjid4" style="display:none;">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">4</span>
                            @if(count($_008_arr)>3)
                            <input type="text" class="form-control" placeholder="E.g: Masjid Al Ihsan" name="_008[]" id="_008_4" value="{{ $_008_arr[3] }}" aria-label="Username" aria-describedby="basic-addon1" disabled>
                            @else
                            <input type="text" class="form-control" placeholder="E.g: Masjid Al Ihsan" name="_008[]" id="_008_4" aria-label="Username" aria-describedby="basic-addon1" disabled>
                            @endif
                        </div>
                    </div>
                    <div id="masjid5" style="display:none;">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">5</span>
                            @if(count($_008_arr)>4)
                            <input type="text" class="form-control" placeholder="E.g: Masjid Al Ihsan" name="_008[]" id="_008_5" value="{{ $_008_arr[4] }}" aria-label="Username" aria-describedby="basic-addon1" disabled>
                            @else
                            <input type="text" class="form-control" placeholder="E.g: Masjid Al Ihsan" name="_008[]" id="_008_5" aria-label="Username" aria-describedby="basic-addon1" disabled>
                            @endif
                        </div>
                    </div>
                    </br>
                </div>
                <div id="009" style="display:none;">
                    <h5>9. Infaq Hari Ini</h5>
                    </br></br>
                    <div class="row">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="009" id="flexRadioDisabled" <?php
                                                                                                            if ($_009 == "Y") {
                                                                                                                echo "checked";
                                                                                                            }
                                                                                                            ?> disabled>
                            <label class="form-check-label" for="flexRadioDisabled">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="009" id="flexRadioCheckedDisabled" <?php
                                                                                                                    if ($_009 == "N") {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?> disabled>
                            <label class="form-check-label" for="flexRadioCheckedDisabled">
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
                        <textarea class="form-control" disabled id="floatingTextarea"><?php
                                                                                        $hasil1 = [
                                                                                            "Memiliki email dan blog tidak standard (20 point)",
                                                                                            "Memiliki email dan blog dari perguruan tinggi (40 point)",
                                                                                            "Memiliki email dan blog aktif minimal satu pekan sekali update (60 point)",
                                                                                            "Memiliki email dan blog aktif setiap hari (80 point)",
                                                                                            "Menjadikan email dan blog dalam kehidupan akademik (100 point)"
                                                                                        ];
                                                                                        echo $hasil1[$_010 - 1];
                                                                                        ?></textarea>
                        </br>
                    </div>
                </div>
                <div id="011" style="display:none;">
                    <h5>11. Memiliki Google Drive</h5>
                    </br></br>
                    <div class="row">
                        <textarea class="form-control" disabled id="floatingTextarea"><?php
                                                                                        $hasil2 = [
                                                                                            "Memiliki google drive pribadi (20 point)",
                                                                                            "Memiliki google drive dimanfaatkan satu pekan sekali (40 point)",
                                                                                            "Mendayagunakan google drive setiap hari (60 point)",
                                                                                            "Memfungsikan google dirive untuk kegiatan pembelajaran  (80 point)",
                                                                                            "Mendayagunakan google drive untuk mendapatkan pendapatan tambahan (100 point)"
                                                                                        ];
                                                                                        echo $hasil2[$_011 - 1];
                                                                                        ?></textarea>
                        </br>
                    </div>
                </div>
                <div id="012" style="display:none;">
                    <h5>12. Keterlibatan Dalam Organisasi Sosial dan Keagamaan</h5>
                    </br></br>
                    <div class="row">
                        <textarea class="form-control" disabled id="floatingTextarea"><?php
                                                                                        $hasil3 = [
                                                                                            "Tidak pernah terlibat di organisasi sosial/keagamaan (20 point)",
                                                                                            "Terlibat/tercatat di satu organisasi sosial/keagamaan (40 point)",
                                                                                            "Aktif menjadi pengurus pada organisasi sosial/keagamaan (60 point)",
                                                                                            "Menjadi pengurus organisasi sosial/keagamaan tingkat kabupaten (80 point)",
                                                                                            "Menjadi pengurus inti pada organisasi sosial/keagamaan tingkat provinsi (100 point)"
                                                                                        ];
                                                                                        echo $hasil3[$_012 - 1];
                                                                                        ?></textarea>
                        </br>
                    </div>
                </div>
                <div id="013" style="display:none;">
                    <h5>13. Mengabdi Sesuai Tujuan Prodi</h5>
                    </br></br>
                    <div class="row">
                        <textarea class="form-control" disabled id="floatingTextarea"><?php
                                                                                        $hasil4 = [
                                                                                            "Tidak pernah mengabdi (20 point)",
                                                                                            "Mengajar/mengabdikan diri pada orang lain (40 point)",
                                                                                            "Mengabdi beberapa pekan selama pembinaan (60 point)",
                                                                                            "Mengabdi secara permanen di satuan lembaga (80 point)",
                                                                                            "Menjadi pengelola di tingkat lembaga (100 point)"
                                                                                        ];
                                                                                        echo $hasil4[$_013 - 1];
                                                                                        ?></textarea>
                        </br>
                    </div>
                </div>
                <div id="014" style="display:none;">
                    <h5>14. Membina Sekelompok Masyarakat</h5>
                    </br></br>
                    <div class="row">
                        <textarea class="form-control" disabled id="floatingTextarea"><?php
                                                                                        $hasil5 = [
                                                                                            "Tidak pernah membina (20 point)",
                                                                                            "Membina masyarakat dengan menggantikan orang lain (40 point)",
                                                                                            "Membina beberapa pekan selama pembinaan (60 point)",
                                                                                            "Membina secara permanen di lembaga resmi (80 point)",
                                                                                            "Mendirikan dan menjadi pemilik lembaga pembinaan (100 point)"
                                                                                        ];
                                                                                        echo $hasil5[$_014 - 1];
                                                                                        ?></textarea>
                        </br>
                    </div>
                </div>
                <div id="015" style="display:none;">
                    <h5>15. Menulis di Jurnal</h5>
                    </br></br>
                    <div class="row">
                        <textarea class="form-control" disabled id="floatingTextarea"><?php
                                                                                        $hasil6 = [
                                                                                            "Tidak pernah menulis jurnal (20 point)",
                                                                                            "Pernah belajar kursus menulis jurnal (40 point)",
                                                                                            "Pernah menulis tetapi tidak diterbitkan (60 point)",
                                                                                            "Pernah sekali tulisan diterbitkan jurnal (80 point)",
                                                                                            "Menjadi penulis tetap di jurnal tertentu (100 point)"
                                                                                        ];
                                                                                        echo $hasil6[$_015 - 1];
                                                                                        ?></textarea>
                        </br>
                    </div>
                </div>
                <div id="016" style="display:none;">
                    <h5>16. Menulis di Harian Surat Kabar</h5>
                    </br></br>
                    <div class="row">
                        <textarea class="form-control" disabled id="floatingTextarea"><?php
                                                                                        $hasil7 = [
                                                                                            "Tidak pernah menulis surat kabar (20 point)",
                                                                                            "Pernah belajar kursus menulis surat kabar (40 point)",
                                                                                            "Pernah menulis tetapi tidak diterbitkan (60 point)",
                                                                                            "Pernah sekali tulisan diterbitkan surat kabar (80 point)",
                                                                                            "Menjadi penulis tetap di surat kabar tertentu (100 point)"
                                                                                        ];
                                                                                        echo $hasil7[$_016 - 1];
                                                                                        ?></textarea>
                        </br>
                    </div>
                </div>
                <div id="017" style="display:none;">
                    <h5>17. Menulis Buku</h5>
                    </br></br>
                    <div class="row">
                        <textarea class="form-control" disabled id="floatingTextarea"><?php
                                                                                        $hasil8 = [
                                                                                            "Tidak pernah menulis buku (20 point)",
                                                                                            "Pernah belajar kursus/pelatihan menulis buku (40 point)",
                                                                                            "Pernah menulis buku tetapi tidak diterbitkan (60 point)",
                                                                                            "Pernah sekali menulis buku diterbitkan ber-ISBN (80 point)",
                                                                                            "Menjadi penulis di beberapa buku (100 point)"
                                                                                        ];
                                                                                        echo $hasil8[$_017 - 1];
                                                                                        ?></textarea>
                        </br>
                    </div>
                </div>
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
                <button class="btn btn-success" id="btn-submit" style="display:none;" data-bs-toggle="modal" data-bs-target="#modalVerif">Verifikasi</button>
                <!-- Modal -->
                <div class="modal fade" id="modalVerif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Verifikasi Laporan Bimbingan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            @if($hasil_bimbingan['id_pembimbing'] == session('idUser') && session('statusUser') == 'Pembimbing')
                            @if($hasil_bimbingan['status'] == 'Belum Diverifikasi')
                            <form action="{{ url('verifikasiLaporan/'.encrypt($id_laporan)) }}" method="POST" id="form-verif">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="komentar" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>
                                        <label for="floatingTextarea2">Komentar</label>
                                    </div>
                                </div>
                            </form>
                            @else
                            <div class="form-floating">
                                <textarea class="form-control" name="komentar" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" disabled>{{ $hasil_bimbingan['komentar'] }}</textarea>
                                <label for="floatingTextarea2">Komentar</label>
                            </div>
                            @endif
                            <div class="modal-footer">
                                @if($hasil_bimbingan['status'] == 'Belum Diverifikasi')
                                <button type="submit" form="form-verif" class="btn btn-primary">Submit</button>
                                @else
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                @endif
                            </div>
                            @elseif($hasil_bimbingan['id_mahasiswa'] == session('idUser') && session('statusUser') == 'Mahasiswa')
                            <div class="form-floating">
                                <textarea class="form-control" name="komentar" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" disabled><?php if ($hasil_bimbingan['komentar'] == '') {
                                                                                                                                                                            echo 'Belum Ada Komentar';
                                                                                                                                                                        } else {
                                                                                                                                                                            echo $hasil_bimbingan['komentar'];
                                                                                                                                                                        } ?></textarea>
                                <label for="floatingTextarea2">Komentar</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    var tampilNow = "001";
    var btnNext = document.getElementById("btn-next");
    var btnPrev = document.getElementById("btn-prev");
    var jumlahRwt = "1";
    var jumlahMsjd = "0";

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
        var tombol = document.getElementById("006_" + jumlah);
        var tombolNow = document.getElementById("006_" + jumlahRwt);

        tombol.classList.remove("btn-outline-secondary");
        tombol.classList.add("btn-secondary");

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
            submitButton.style.display = "inline";
        } else {
            btnNext.style.display = "inline";
            submitButton.style.display = "none";
        }

        now.style.display = "none";
        ubah.style.display = "block";

        nowButton.classList.remove("btn-hidup");
        ubahButton.classList.add("btn-hidup");

        tampilNow = id;
    }
</script>
<?php
echo "<script> rawatib('" . ($_006 / 2) . "'); </script>";
if ($_008 != "0") {
    echo "<script> masjidBeda('" . (count(explode(", ", $_008))) . "'); </script>";
} else {
    echo "<script> masjidBeda('0'); </script>";
}
?>


@endsection