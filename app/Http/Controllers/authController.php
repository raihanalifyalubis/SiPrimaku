<?php

namespace App\Http\Controllers;

use App\Models\Pembimbing;
use App\Models\Mahasiswa;
use App\Models\HasilBimbingan;
use App\Models\Bimbingan;
use App\Models\Nilai;
use App\Models\SuperUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class authController extends Controller
{

    public function logout(Request $request)
    {
        if (session('sudahLogin')) {
            if (session('statusLogout') == 'ganti_password') {
                $request->session()->flush();
                return redirect('login')->with('telahLogout', 'Silahkan Melakukan Login Ulang');
            } else {
                $request->session()->flush();
                return redirect('login')->with('telahLogout', 'Anda telah keluar dari akun');
            }
        } else {
            return redirect()->back();
        }
    }

    public function userLogin(request $request)
    {
        $data_mhs = Mahasiswa::where('username', $request->username)->first();
        $data_pmb = Pembimbing::where('username', $request->username)->first();
        if ($data_mhs) {
            if (md5($request->password) == $data_mhs->password) {
                if ($request->password == $request->username) {
                    session(['gantiPass' => true]);
                }
                session(['sudahLogin' => true]);
                session(['idUser' => $data_mhs->id]);
                session(['namaUser' => $data_mhs->nama]);
                session(['usernameLogin' => $data_mhs->username]);
                session(['statusUser' => 'Mahasiswa']);
                session(['berhasilLogin' => true]);
                return redirect('inputLaporan');
            } else {
                return redirect('login')->with('error', 'Password Anda Salah!')->with('usernameTadi', $request->username);
            }
        } else {
            if ($data_pmb) {
                if (md5($request->password) == $data_pmb->password) {
                    session(['sudahLogin' => true]);
                    session(['idUser' => $data_pmb->id]);
                    session(['namaUser' => $data_pmb->nama]);
                    session(['usernameLogin' => $data_pmb->username]);
                    session(['statusUser' => 'Pembimbing']);
                    session(['berhasilLogin' => true]);
                    session(['inputMhs' => []]);
                    return redirect('dashboard');
                } else {
                    return redirect('login')->with('error', 'Password Anda Salah!')->with('usernameTadi', $request->username);
                }
            } else {
                return redirect('login')->with('error', 'Username Tidak Ditemukan!')->with('usernameTadi', $request->username);
            }
        }
    }

    public function ubahPassword(request $request)
    {
        if (session('statusUser') == 'Mahasiswa') {
            $data_mhs = Mahasiswa::where('username', $request->username)->first();
            if (md5($request->password_lama) == $data_mhs->password) {
                $data_mhs->update(['password' => md5($request->password_baru)]);
                return redirect('logout')->with('statusLogout', 'ganti_password');
            } else {
                return redirect('ubahPass')->with('error', 'Password Anda Salah!');
            }
        } else {
            $data_pmb = Pembimbing::where('username', $request->username)->first();
            if (md5($request->password_lama) == $data_pmb->password) {
                $data_pmb->update(['password' => md5($request->password_baru)]);
                return redirect('logout')->with('statusLogout', 'ganti_password');
            } else {
                return redirect('ubahPass')->with('error', 'Password Anda Salah!')->with('passwordTadi', $request->password_lama);
            }
        }
    }

    public function ubahSetAkun(request $request)
    {
        if (session('statusUser') == 'Mahasiswa') {
            $data_mhs = Mahasiswa::where('username', $request->usernameLama)->first();
            $cek_ada = Mahasiswa::where('username', $request->username)->first();
            if ($cek_ada && $request->usernameLama != $request->username) {
                return redirect('akunSet')->with('error', 'Username Telah Terdaftar')->with('usernameTadi', $request->username)->with('namaTadi', $request->nama)->with('progstudTadi', $request->program_studi)->with('semTadi', $request->semester)->with('tgl1Tadi', $request->tanggal_mulai)->with('tgl2Tadi', $request->tanggal_akhir);
            }
            if (md5($request->password) == $data_mhs->password) {
                if ($request->usernameLama != $request->username) {
                    $data_mhs->update(['username' => $request->username]);
                    session(['usernameLogin' => $request->username]);
                }
                $data_mhs->update(['nama' => $request->nama]);
                $data_mhs->update(['program_studi' => $request->program_studi]);
                $data_mhs->update(['semester' => $request->semester]);
                $data_mhs->update(['tanggal_mulai' => $request->tanggal_mulai]);
                $data_mhs->update(['tanggal_akhir' => $request->tanggal_akhir]);
                session(['namaUser' => $request->nama]);
                session(['berhasilUbah' => true]);
                return redirect('dashboard');
            } else {
                return redirect('akunSet')->with('error', 'Password Anda Salah!')->with('usernameTadi', $request->username)->with('namaTadi', $request->nama)->with('progstudTadi', $request->program_studi)->with('semTadi', $request->semester)->with('tgl1Tadi', $request->tanggal_mulai)->with('tgl2Tadi', $request->tanggal_akhir);
            }
        } else {
            $data_pmb = Pembimbing::where('username', $request->username)->first();
            if (md5($request->password) == $data_pmb->password) {
                $data_pmb->update(['nama' => $request->nama]);
                $data_pmb->update(['email' => $request->email]);
                $data_pmb->update(['nomor_induk' => $request->nomor_induk]);
                session(['namaUser' => $request->nama]);
                session(['berhasilUbah' => true]);
                return redirect('dashboard');
            } else {
                return redirect('akunSet')->with('error', 'Password Anda Salah!')->with('namaTadi', $request->nama)->with('emailTadi', $request->email)->with('nomorinTadi', $request->nomor_induk);
            }
        }
    }

    public function verifikasiLaporan($id, Request $request)
    {
        $laporannya = HasilBimbingan::where('id', decrypt($id));
        $laporan = $laporannya->get();
        $nilainya = Nilai::where('id_mahasiswa', $laporan[0]['id_mahasiswa']);
        $nilai_mhs = $nilainya->get();
        $id_nilai = $nilai_mhs[0]['id'];
        $id_array = array_map('intval', explode(',', $laporan[0]['id_aspek']));
        $nilai = [];
        $nilainya = 0;
        $bimbingan = Bimbingan::whereIn('id', $id_array)->get();
        $aspek = ['_001', '_002', '_003', '_004', '_005', '_006', '_007', '_008', '_009', '_010', '_011', '_012', '_013', '_014', '_015', '_016', '_017'];
        $nilai_awal = [];
        for ($i = 0; $i < count($aspek); $i++) {
            $tmp = [$aspek[$i] => $nilai_mhs[0][$aspek[$i]]];
            $nilai_awal = array_merge($nilai_awal, $tmp);
        }
        for ($i = 0; $i < count($id_array); $i++) {
            if ($bimbingan[$i]['aspek'] == '_001') {
                $tmp = ['_001' => ($nilai_awal['_001'] + count(explode(", ", $bimbingan[$i]['nilai'])) * 0.66)];
                $nilai = array_merge($nilai, $tmp);
            }
        }
        $aspek_temp = ['_002', '_003', '_004', '_005', '_006', '_007', '_008', '_009', '_010', '_011', '_012', '_013', '_014', '_015', '_016', '_017'];
        $persen_temp = [3.33, 3.33, 3.33, 3.33, 0.277, 12.5, 3.33, 6.66, 20, 20, 20, 20, 20, 20, 20, 20];
        for ($j = 0; $j < count($aspek_temp); $j++) {
            for ($i = 0; $i < count($id_array); $i++) {
                if ($bimbingan[$i]['aspek'] == $aspek_temp[$j]) {
                    if ($bimbingan[$i]['nilai'] == 'Y') {
                        $nilainya = 1;
                    } else if ($bimbingan[$i]['nilai'] == 'N') {
                        $nilainya = 0;
                    } else {
                        $nilainya = $bimbingan[$i]['nilai'];
                    }
                    if ($j < 8) {
                        if ($aspek_temp[$j] == '_008') {
                            $nilainya = count(explode(", ", $nilainya));
                            $tmp = [$aspek_temp[$j] => ($nilainya * $persen_temp[$j] + $nilai_awal[$aspek_temp[$j]])];
                        } else {
                            $tmp = [$aspek_temp[$j] => ($nilainya * $persen_temp[$j] + $nilai_awal[$aspek_temp[$j]])];
                        }
                    } else {
                        if ($nilai_awal[$aspek_temp[$j]] < $nilainya * $persen_temp[$j]) {
                            $tmp = [$aspek_temp[$j] => $nilainya * $persen_temp[$j]];
                        } else {
                            $tmp = [$aspek_temp[$j] => $nilai_awal[$aspek_temp[$j]]];
                        }
                    }
                    $nilai = array_merge($nilai, $tmp);
                }
            }
        }
        $total_hari = count(HasilBimbingan::where('id_mahasiswa', $laporan[0]['id_mahasiswa'])->where('status', 'Sudah Terverifikasi')->get());
        $hari_sekarang = $total_hari + 1;
        $nilai = array_merge($nilai, ['total_hari' => $hari_sekarang]);
        Nilai::where('id', $id_nilai)->update($nilai);
        $laporannya->update(['komentar' => $request->komentar, 'status' => 'Sudah Terverifikasi']);
        return redirect('lihatLaporan')->with('berhasilVerif', true);
    }

    public function nullOrNo($aspek)
    {
        if ($aspek == "") {
            return "";
        } else {
            return $aspek;
        }
    }

    public function cekEmpty($aspek)
    {
        if ($aspek == "") {
            return true;
        } else {
            return false;
        }
    }

    public function masukkanLaporan(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        $cekMasjid = HasilBimbingan::where('id_mahasiswa', session('idUser'))->get();
        $idCek = [];
        for ($i = 0; $i < count($cekMasjid); $i++) {
            $cekLagi = explode(", ", $cekMasjid[$i]['id_aspek']);
            array_push($idCek, $cekLagi[7]);
        }
        $tmp = $request->_008;
        $ubah = [];
        $masjidSudah = [];
        for ($i = 0; $i < count($idCek); $i++) {
            $bimbinganMasjid = Bimbingan::whereIn('id', $idCek)->get();
            if ($bimbinganMasjid[$i]['nilai'] != "0" && $bimbinganMasjid[$i]['tanggal'] != $request->tanggal_now) {
                $tmp1 =  explode(", ", $bimbinganMasjid[$i]['nilai']);
                $masjidSudah = array_merge($masjidSudah, $tmp1);
            }
        }
        for ($i = 0; $i < $request->banyak_008; $i++) {
            if (!in_array($tmp[$i], $masjidSudah)) {
                array_push($ubah, $tmp[$i]);
            }
        }
        $tmp_008 = implode(", ", $ubah);
        $jumlah_bimbingan = count(Bimbingan::get());
        $cek_ada = HasilBimbingan::where('tanggal', $request->tanggal_now)->where('id_mahasiswa', session('idUser'))->get();
        $mahasiswanya = Mahasiswa::where('id', session('idUser'))->get();
        $id_pembimbing = $mahasiswanya[0]['id_pembimbing'];
        $id_array = [];
        for ($i = 0; $i < 17; $i++) {
            $temp = $jumlah_bimbingan + $i + 1;
            array_push($id_array, $temp);
        }
        $id_aspek = implode(", ", $id_array);

        if ($request->_008[0] == "" || $request->_008[0] == "0" || $tmp_008 == "") {
            $tmp_008 = "0";
        }

        if ($request->_001 == '') {
            $_001 = "";
        } else if ($request->_001 == "N") {
            $_001 = "N";
        } else {
            $_001 = implode(", ", $request->_001);
        }
        $_002 = $this->nullOrNo($request->_002);
        $_003 = $this->nullOrNo($request->_003);
        $_004 = $this->nullOrNo($request->_004);
        $_005 = $this->nullOrNo($request->_005);
        $_006 = $this->nullOrNo($request->_006);
        $_007 = $this->nullOrNo($request->_007);
        $_008 = $this->nullOrNo($tmp_008);
        $_009 = $this->nullOrNo($request->_009);
        $_010 = $this->nullOrNo($request->_010);
        $_011 = $this->nullOrNo($request->_011);
        $_012 = $this->nullOrNo($request->_012);
        $_013 = $this->nullOrNo($request->_013);
        $_014 = $this->nullOrNo($request->_014);
        $_015 = $this->nullOrNo($request->_015);
        $_016 = $this->nullOrNo($request->_016);
        $_017 = $this->nullOrNo($request->_017);

        $nilai = [$_001, $_002, $_003, $_004, $_005, $_006, $_007, $_008, $_009, $_010, $_011, $_012, $_013, $_014, $_015, $_016, $_017];
        if (empty($_002) || empty($_003) || empty($_004) || empty($_005) || $this->cekEmpty($_006) || empty($_007) || $this->cekEmpty($_008) || empty($_009) || empty($_010) || empty($_011) || empty($_012) || empty($_013) || empty($_014) || empty($_015) || empty($_016) || empty($_017)) {
            $status = "Belum Selesai";
        } else {
            $status = "Belum Diverifikasi";
        }

        $aspek = ['_001', '_002', '_003', '_004', '_005', '_006', '_007', '_008', '_009', '_010', '_011', '_012', '_013', '_014', '_015', '_016', '_017'];
        if (count($cek_ada) == 0) {

            $bimbingans = [];
            for ($i = 0; $i < count($id_array); $i++) {
                $temp = [
                    'id' => $id_array[$i],
                    'id_mahasiswa' => session('idUser'),
                    'aspek' => $aspek[$i],
                    'nilai' => $nilai[$i],
                    'tanggal' => $request->tanggal_now,
                    'created_at' => $date,
                    'updated_at' => $date
                ];
                array_push($bimbingans, $temp);
            }

            $hasil_bimbingan = [
                'id_mahasiswa' => session('idUser'),
                'id_pembimbing' => $id_pembimbing,
                'id_aspek' => $id_aspek,
                'tanggal' => $request->tanggal_now,
                'status' => $status,
                'komentar' => "",
                'created_at' => $date,
                'updated_at' => $date
            ];
            Bimbingan::insert($bimbingans);
            HasilBimbingan::insert($hasil_bimbingan);
            return redirect('inputLaporan')->with('berhasilInput', true);
        } else {
            $id_hasil = $cek_ada[0]['id'];
            $bimbingans = [];
            $id_array = array_map('intval', explode(',', $cek_ada[0]['id_aspek']));
            for ($i = 0; $i < count($id_array); $i++) {
                $temp = [
                    'nilai' => $nilai[$i],
                    'updated_at' => $date
                ];
                Bimbingan::where('id', $id_array[$i])->update($temp);
                array_push($bimbingans, $temp);
            }

            $hasil_bimbingan = [
                'status' => $status,
                'updated_at' => $date
            ];
            HasilBimbingan::where('id', $id_hasil)->update($hasil_bimbingan);
            return redirect('inputLaporan')->with('berhasilInput', true);
        }
    }

    public function adminLogin(Request $request)
    {
        $super_user = SuperUser::where('username', $request->username)->first();

        if ($super_user) {
            if (md5($request->password) == $super_user->password) {
                session(['adminLogin' => true]);
                session(['idAdmin' => $super_user->id]);
                session(['namaAdmin' => $super_user->nama]);

                return redirect('AdminPage')->with('berhasilLogin', true);
            } else {
                return redirect('LoginAdmin')->with('error', 'Password salah!')->with('usernameTadi', $request->username);
            }
        } else {
            return redirect('LoginAdmin')->with('error', 'Username Tidak Ditemukan!')->with('usernameTadi', $request->username);
        }
    }

    public function logoutAdmin(Request $request)
    {
        if (session('adminLogin')) {
            $request->session()->flush();
            return redirect('LoginAdmin')->with('telahLogout', 'Silahkan Melakukan Login Ulang');
        } else {
            return redirect()->back();
        }
    }

    public function deleteMhs($id)
    {
        if (session('adminLogin') != true) {
            return redirect('/');
        }
        $mahasiswa = Mahasiswa::where('id', $id);
        $mahasiswa->delete();
        return redirect('getMahasiswa')->with('berhasilHapus', true);
    }

    public function AdminUbahMhs(Request $request)
    {
        if (session('adminLogin') != true) {
            return redirect('/');
        }
        if ($request->kode != 'SIPRIMAKU-01') {
            return redirect()->back()->with('error', 'Kode Admin Salah!')->with('usernameTadi', $request->username)->with('namaTadi', $request->nama)->with('progstudTadi', $request->program_studi)->with('semTadi', $request->semester)->with('tgl1Tadi', $request->tanggal_mulai)->with('tgl2Tadi', $request->tanggal_akhir);
        }
        $data_mhs = Mahasiswa::where('username', $request->usernameLama)->first();
        $cek_ada = Mahasiswa::where('username', $request->username)->first();
        if ($cek_ada && $request->usernameLama != $request->username) {
            return redirect()->back()->with('error', 'Username Telah Terdaftar')->with('usernameTadi', $request->username)->with('namaTadi', $request->nama)->with('progstudTadi', $request->program_studi)->with('semTadi', $request->semester)->with('tgl1Tadi', $request->tanggal_mulai)->with('tgl2Tadi', $request->tanggal_akhir);
        }
        if (!$request->password) {
            $data_mhs->update(['username' => $request->username]);
            $data_mhs->update(['nama' => $request->nama]);
            $data_mhs->update(['program_studi' => $request->program_studi]);
            $data_mhs->update(['semester' => $request->semester]);
            $data_mhs->update(['tanggal_mulai' => $request->tanggal_mulai]);
            $data_mhs->update(['tanggal_akhir' => $request->tanggal_akhir]);
            return redirect('getMahasiswa')->with('berhasilUbah', true);
        } else {
            $data_mhs->update(['username' => $request->username]);
            $data_mhs->update(['password' => md5($request->password)]);
            $data_mhs->update(['nama' => $request->nama]);
            $data_mhs->update(['program_studi' => $request->program_studi]);
            $data_mhs->update(['semester' => $request->semester]);
            $data_mhs->update(['tanggal_mulai' => $request->tanggal_mulai]);
            $data_mhs->update(['tanggal_akhir' => $request->tanggal_akhir]);
            return redirect('getMahasiswa')->with('berhasilUbah', true);
        }
    }

    public function AdminUbahPmb(Request $request)
    {
        if (session('adminLogin') != true) {
            return redirect('/');
        }
        if ($request->kode != 'SIPRIMAKU-01') {
            return redirect()->back()->with('error', 'Kode Admin Salah!')->with('usernameTadi', $request->username)->with('namaTadi', $request->nama)->with('emailTadi', $request->email)->with('indukTadi', $request->nomor_induk);
        }
        $data = Pembimbing::where('username', $request->usernameLama)->first();
        $cek_ada = Pembimbing::where('username', $request->username)->first();
        if ($cek_ada && $request->usernameLama != $request->username) {
            return redirect()->back()->with('error', 'Username Telah Terdaftar')->with('usernameTadi', $request->username)->with('namaTadi', $request->nama)->with('emailTadi', $request->email)->with('indukTadi', $request->nomor_induk);
        }
        if (!$request->password) {
            $data->update(['username' => $request->username]);
            $data->update(['nama' => $request->nama]);
            $data->update(['email' => $request->email]);
            $data->update(['nomor_induk' => $request->nomor_induk]);
            return redirect('getPembimbing')->with('berhasilUbah', true);
        } else {
            $data->update(['username' => $request->username]);
            $data->update(['nama' => $request->nama]);
            $data->update(['email' => $request->email]);
            $data->update(['nomor_induk' => $request->nomor_induk]);
            $data->update(['password' => md5($request->password)]);
            return redirect('getPembimbing')->with('berhasilUbah', true);
        }
    }

    public function AddPembimbing(Request $request)
    {

        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        if (session('adminLogin') != true) {
            return redirect('/');
        }
        if ($request->kode != 'SIPRIMAKU-01') {
            return redirect()->back()->with('error', 'Kode Admin Salah!')->with('usernameTadi', $request->username)->with('namaTadi', $request->nama)->with('emailTadi', $request->email)->with('indukTadi', $request->nomor_induk);
        }
        $cek_ada = Pembimbing::where('username', $request->username)->first();
        if ($cek_ada) {
            return redirect()->back()->with('error', 'Username Telah Terdaftar')->with('usernameTadi', $request->username)->with('namaTadi', $request->nama)->with('emailTadi', $request->email)->with('indukTadi', $request->nomor_induk);
        }
        $data = [
            'username' => $request->username,
            'password' => md5($request->password1),
            'nama' => $request->nama,
            'email' => $request->email,
            'status' => 'Aktif',
            'nomor_induk' => $request->nomor_induk,
            'created_at' => $date,
            'updated_at' => $date
        ];
        Pembimbing::insert($data);
        return redirect('getPembimbing')->with('berhasilInsert', true);
    }


    public function deletePmb($id)
    {
        if (session('adminLogin') != true) {
            return redirect('/');
        }
        $pembimbing = Pembimbing::where('id', $id);
        $cek_mahasiswa = Mahasiswa::where('id_pembimbing', $id)->get();
        if (count($cek_mahasiswa) > 0) {
            return redirect()->back()->with('gagalHapus', true);
        } else {
            $pembimbing->delete();
            return redirect('getPembimbing')->with('berhasilHapus', true);
        }
    }
}
