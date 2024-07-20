<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\Pembimbing;
use App\Models\Mahasiswa;
use App\Models\AspekPembinaan;
use App\Models\Nilai;
use App\Models\Penilaian;
use App\Models\HasilBimbingan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class showController extends Controller
{

    public function keArray($datas)
    {
        $arraynya = [];

        foreach ($datas as $data) {
            array_push($arraynya, $datas);
        }

        return $arraynya;
    }

    public function tampilFormLogin()
    {
        if (session('sudahLogin') == true) {
            return redirect('/');
        } else {
            return view('login');
        }
    }

    public function tampilDashboard()
    {
        if (session('sudahLogin') != true) {
            return redirect('login');
        }
        $aspek_pembinaans = AspekPembinaan::all();
        if (session('statusUser') == "Mahasiswa") {
            $nilai = Nilai::where('id_mahasiswa', session('idUser'))->get();
            $mahasiswas = Mahasiswa::where('id', session('idUser'))->get();
            return view('dashboardM', compact('aspek_pembinaans', 'mahasiswas', 'nilai'));
        } else {
            $mahasiswanyas = Mahasiswa::where('id_pembimbing', session('idUser'))->orderBy('nama', 'asc')->orderBy('tanggal_mulai', 'asc')->simplePaginate(10);
            $nilainyas = Nilai::all();
            $belumVerif = count(HasilBimbingan::where('id_pembimbing', session('idUser'))->where('status', 'Belum Diverifikasi')->get());
            return view('dashboardP', compact('aspek_pembinaans', 'mahasiswanyas', 'nilainyas', 'belumVerif'));
        }
    }

    public function tampilHomepage()
    {
        $total_mahasiswa = Mahasiswa::count();
        $total_pembimbing = Pembimbing::count();
        $total_bimbingan = Bimbingan::count();
        $aspek_pembinaans = AspekPembinaan::all();

        return view('homepage', compact('total_bimbingan', 'total_mahasiswa', 'total_pembimbing', 'aspek_pembinaans'));
    }

    public function tampilSettingAkun()
    {
        if (session('sudahLogin') != true) {
            return redirect('/');
        }

        if (session('statusUser') == 'Mahasiswa') {
            $data_mhs = Mahasiswa::where('id', session('idUser'))->first();
            return view('settingAkunM', compact('data_mhs'));
        } else {
            $belumVerif = count(HasilBimbingan::where('id_pembimbing', session('idUser'))->where('status', 'Belum Diverifikasi')->get());
            $data_pmb = Pembimbing::where('id', session('idUser'))->first();
            return view('settingAkunP', compact('data_pmb', 'belumVerif'));
        }
    }

    public function tampilUbahPass()
    {
        if (session('sudahLogin') != true) {
            return redirect('/');
        }
        if (session('statusUser') == 'Pembimbing') {
            $belumVerif = count(HasilBimbingan::where('id_pembimbing', session('idUser'))->where('status', 'Belum Diverifikasi')->get());
            return view('ubahPassword', compact('belumVerif'));
        }
        return view('ubahPassword');
    }

    public function tampilRincian()
    {
        if (session('sudahLogin') != true) {
            return redirect('/');
        }
        $aspek_pembinaan = AspekPembinaan::all();
        $aspek_pembinaan = showController::keArray($aspek_pembinaan);
        $penilaians = Penilaian::all();
        if (session('statusUser') == 'Pembimbing') {
            $belumVerif = count(HasilBimbingan::where('id_pembimbing', session('idUser'))->where('status', 'Belum Diverifikasi')->get());
            return view('rincian', compact('penilaians', 'aspek_pembinaan', 'belumVerif'));
        }
        return view('rincian', compact('penilaians', 'aspek_pembinaan'));
    }

    public function tampilInformasi($id)
    {
        if (session('sudahLogin') != true) {
            return redirect('/');
        }
        $aspek_pembinaans = AspekPembinaan::all();
        $id_mhs = decrypt($id);

        $nilai1 = Nilai::where('id_mahasiswa', $id_mhs)->first();
        $nilai = showController::keArray($nilai1);

        $namanyas = Mahasiswa::where('id', $id_mhs)->first();
        $namanya = showController::keArray($namanyas);
        $nama_mhs = $namanya[0]['nama'];

        session(['lihatInfo' => true]);
        session(['namaMhs' => $nama_mhs]);
        session(['idMhs' => $id_mhs]);
        if (session('statusUser') == 'Pembimbing') {
            $belumVerif = count(HasilBimbingan::where('id_pembimbing', session('idUser'))->where('status', 'Belum Diverifikasi')->get());
            return view('dashboardM', compact('aspek_pembinaans', 'nilai', 'belumVerif'));
        }
        return view('dashboardM', compact('aspek_pembinaans', 'nilai'));
    }

    public function tampilInputMahasiswa()
    {
        if (session('sudahLogin') != true) {
            return redirect('/');
        }
        $belumVerif = count(HasilBimbingan::where('id_pembimbing', session('idUser'))->where('status', 'Belum Diverifikasi')->get());
        return view('inputMahasiswa', compact('belumVerif'));
    }

    public function tampilLihatLaporan()
    {
        if (session('sudahLogin') != true) {
            return redirect('/');
        }
        if (session('statusUser' == 'Mahasiswa')) {
            return redirect('/');
        }
        date_default_timezone_set('Asia/Jakarta');
        $hasil_bimbingans = HasilBimbingan::where('id_pembimbing', session('idUser'))->where('tanggal', date('Y-m-d'))->get();

        $mahasiswa = Mahasiswa::where('id_pembimbing', session('idUser'))->get();
        $mahasiswas = $this->keArray($mahasiswa);
        $belumVerif = count(HasilBimbingan::where('id_pembimbing', session('idUser'))->where('status', 'Belum Diverifikasi')->get());
        return view('lihatLaporan', compact('hasil_bimbingans', 'mahasiswas', 'belumVerif'));
    }

    public function tampilLihatLaporanDay($tanggal)
    {
        if (session('sudahLogin') != true) {
            return redirect('/');
        }
        if (session('statusUser' == 'Mahasiswa')) {
            return redirect('/');
        }
        date_default_timezone_set('Asia/Jakarta');
        $hasil_bimbingans = HasilBimbingan::where('id_pembimbing', session('idUser'))->where('tanggal', $tanggal)->get();

        $mahasiswa = Mahasiswa::where('id_pembimbing', session('idUser'))->get();
        $mahasiswas = $this->keArray($mahasiswa);
        $belumVerif = count(HasilBimbingan::where('id_pembimbing', session('idUser'))->where('status', 'Belum Diverifikasi')->get());
        return view('lihatLaporan', compact('hasil_bimbingans', 'mahasiswas', 'belumVerif'));
    }

    public function tampilRincianLaporan($id)
    {
        if (session('sudahLogin') != true) {
            return redirect('/');
        }
        if (session('statusUser' == 'Mahasiswa')) {
            return redirect('/');
        }

        $hasil_bimbingan = HasilBimbingan::where('id', decrypt($id))->firstOrFail();
        if ($hasil_bimbingan['id_pembimbing'] != session('idUser') && session('statusUser') == 'Pembimbing') {
            return redirect('/');
        }
        if ($hasil_bimbingan['id_mahasiswa'] != session('idUser') && session('statusUser') == 'Mahasiswa') {
            return redirect('/');
        }
        $id_aspek = $hasil_bimbingan->id_aspek;
        $id_array = array_map('intval', explode(',', $id_aspek));
        $bimbingans = Bimbingan::whereIn('id', $id_array)->get();
        $mahasiswas = Mahasiswa::get();
        $id_laporan = decrypt($id);

        $belumVerif = count(HasilBimbingan::where('id_pembimbing', session('idUser'))->where('status', 'Belum Diverifikasi')->get());
        return view('rincianLaporan', compact('hasil_bimbingan', 'mahasiswas', 'bimbingans', 'id_laporan', 'belumVerif'));
    }

    public function tampilInputLaporan()
    {
        if (session('sudahLogin') != true) {
            return redirect('/');
        }

        $idnya = session('idUser');
        $hasil_bimbingans = HasilBimbingan::where('id_mahasiswa', $idnya)->get();

        $mahasiswa = Mahasiswa::where('id', $idnya)->get();
        $tanggal_mulai = $mahasiswa[0]['tanggal_mulai'];
        $tanggal_akhir = $mahasiswa[0]['tanggal_akhir'];
        $namanya = $mahasiswa[0]['nama'];
        return view('inputLaporan', compact('hasil_bimbingans', 'tanggal_mulai', 'tanggal_akhir', 'namanya'));
    }
    public function tampilInputLaporan1($id)
    {
        if (session('sudahLogin') != true) {
            return redirect('/');
        }

        $idnya = decrypt($id);
        $mahasiswa = Mahasiswa::where('id', $idnya)->get();
        if ($mahasiswa[0]['id_pembimbing'] != session('idUser') && session('statusUser') != 'Pembimbing') {
            return redirect('/');
        }
        $hasil_bimbingans = HasilBimbingan::where('id_mahasiswa', $idnya)->where('status', 'Sudah Terverifikasi')->orWhere('id_mahasiswa', $idnya)->where('status', 'Belum Diverifikasi')->get();
        $tanggal_mulai = $mahasiswa[0]['tanggal_mulai'];
        $tanggal_akhir = $mahasiswa[0]['tanggal_akhir'];
        $namanya = $mahasiswa[0]['nama'];
        $belumVerif = count(HasilBimbingan::where('id_pembimbing', session('idUser'))->where('status', 'Belum Diverifikasi')->get());
        return view('inputLaporan', compact('hasil_bimbingans', 'tanggal_mulai', 'tanggal_akhir', 'namanya', 'belumVerif'));
    }

    public function tampilBuatLaporan($tanggal)
    {
        if (session('sudahLogin') != true) {
            return redirect('/');
        }
        if (session('statusUser' != 'Mahasiswa')) {
            return redirect('/');
        }
        if (!strtotime($tanggal)) {
            return redirect('/');
        }

        $hasil_bimbingan = HasilBimbingan::where('id_mahasiswa', session('idUser'))->where('tanggal', $tanggal)->get();
        if (count($hasil_bimbingan) == 0) {
            $mahasiswa = Mahasiswa::where('id', session('idUser'))->get();
            $tanggal_awal = $mahasiswa[0]['tanggal_mulai'];
            $selisih_tanggal = (strtotime($tanggal) - strtotime($tanggal_awal)) / (60 * 60 * 24);
            if ($selisih_tanggal > 29) {
                return redirect('/');
            }

            return view('buatLaporan', compact('tanggal'));
        } else {
            $id_array = array_map('intval', explode(',', $hasil_bimbingan[0]['id_aspek']));
            $bimbingans = Bimbingan::whereIn('id', $id_array)->get();
            $id_laporan = $hasil_bimbingan[0]['id'];
            $mahasiswa = Mahasiswa::where('id', session('idUser'))->get();
            $tanggal_awal = $mahasiswa[0]['tanggal_mulai'];
            $selisih_tanggal = (strtotime($tanggal) - strtotime($tanggal_awal)) / (60 * 60 * 24);
            if ($selisih_tanggal > 29) {
                return redirect('/');
            }

            return view('lanjutLaporan', compact('tanggal', 'hasil_bimbingan', 'bimbingans', 'id_laporan'));
        }
    }

    public function tampilLoginAdmin()
    {
        return view('LoginAdmin');
    }

    public function tampilAdminPage()
    {
        if (session('adminLogin') != true) {
            return redirect('/');
        }
        return view('AdminPage');
    }

    public function tampilGetMahasiswa()
    {
        if (session('adminLogin') != true) {
            return redirect('/');
        }
        $mahasiswas = Mahasiswa::get();
        $pembimbings = Pembimbing::get();

        return view('AdminMahasiswa', compact('mahasiswas', 'pembimbings'));
    }

    public function tampilAdminUbahMahasiswa($id)
    {
        if (session('adminLogin') != true) {
            return redirect('/');
        }
        $id = decrypt($id);
        $mahasiswa = Mahasiswa::where('id', $id)->get();
        return view('AdminUbahM', compact('mahasiswa'));
    }

    public function tampilGetPembimbing()
    {
        if (session('adminLogin') != true) {
            return redirect('/');
        }
        $pembimbings = Pembimbing::get();

        return view('AdminPembimbing', compact('pembimbings'));
    }

    public function tampilAdminUbahPembimbing($id)
    {
        if (session('adminLogin') != true) {
            return redirect('/');
        }
        $id = decrypt($id);
        $pembimbing = Pembimbing::where('id', $id)->get();
        return view('AdminUbahP', compact('pembimbing'));
    }

    public function tampilAddPembimbing()
    {
        if (session('adminLogin') != true) {
            return redirect('/');
        }

        return view('AdminAddPembimbing');
    }
}
