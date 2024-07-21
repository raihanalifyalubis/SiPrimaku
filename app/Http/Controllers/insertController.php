<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MahasiswaImport;
use App\Imports\MahasiswaImportArray;
use App\Exports\ExportExcel;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Surat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class insertController extends Controller
{
    public function import(Request $request)
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'file' => 'required|max:40'
        ]);

        if ($validator->fails()) {
            return redirect('inputMahasiswa')->with('error', 'File Ditolak! Periksa Jenis File yang Anda Masukkan! (<40 kB)');
        }

        $extensions = array("xls", "xlsx", "csv");

        $result = array($request->file('file')->getClientOriginalExtension());

        if (!in_array($result[0], $extensions)) {
            return redirect('inputMahasiswa')->with('error', 'File Ditolak! Periksa Jenis File yang Anda Masukkan! (.xlsx, .csv, .xls)');
        }

        $import = new MahasiswaImport();
        $import_array = new MahasiswaImportArray();
        $data = Excel::toArray($import, $request->file('file'));
        Excel::import($import_array, $request->file('file'));
        $excell = [];

        for ($i = 0; $i < $import_array->getRowCount() - 1; $i++) {
            $temp = [$data[0][$import_array->getNotNullRow()[$i]]['no'], $import_array->getUsername()[$i], $import_array->getUsername()[$i], $data[0][$import_array->getNotNullRow()[$i]]['nama_lengkap'], $data[0][$import_array->getNotNullRow()[$i]]['nim'], $data[0][$import_array->getNotNullRow()[$i]]['jenis_kelamin'], $data[0][$import_array->getNotNullRow()[$i]]['program_studi'], $data[0][$import_array->getNotNullRow()[$i]]['semester'], \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(intval($data[0][$import_array->getNotNullRow()[$i]]['tanggal_awal']))->format('d/m/Y'), \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(intval($data[0][$import_array->getNotNullRow()[$i]]['tanggal_awal']) + 29)->format('d/m/Y')];
            array_push($excell, $temp);
        }
        session(['inputMhs' => array_merge(session('inputMhs'), $excell)]);
        $hasil = $this->rapikanArray(session('inputMhs'));
        session(['inputMhs' => $hasil]);

        return redirect('inputMahasiswa')->with('berhasilMasukkan', true);
    }

    public function rapikanArray($arraynya)
    {
        $tmp1 = [];
        for ($j = 0; $j < count($arraynya); $j++) {
            $tmp = [$j + 1, $arraynya[$j][1], $arraynya[$j][2], $arraynya[$j][3], $arraynya[$j][4], $arraynya[$j][5], $arraynya[$j][6], $arraynya[$j][7], $arraynya[$j][8], $arraynya[$j][9]];
            array_push($tmp1, $tmp);
        }
        return $tmp1;
    }

    public function export()
    {
        return Excel::download(new ExportExcel(session('inputMhs')), 'Username dan Password.xlsx');
    }

    public function toDate($tanggal)
    {
        $tanggalnya = substr($tanggal, 0, 2);
        $bulannya = substr($tanggal, 3, 2);
        $tahunnya = substr($tanggal, 6, 4);

        return date('Y-m-d', strtotime($tanggalnya . "-" . $bulannya . "-" . $tahunnya));
    }

    public function inputTbl()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');

        for ($i = 0; $i < count(session('inputMhs')); $i++) {
            $mahasiswa = [
                'username' => session('inputMhs')[$i][1],
                'password' => md5(session('inputMhs')[$i][2]),
                'nama' => session('inputMhs')[$i][3],
                'nim' => session('inputMhs')[$i][4],
                'jenis_kelamin' => session('inputMhs')[$i][5],
                'program_studi' => session('inputMhs')[$i][6],
                'semester' => session('inputMhs')[$i][7],
                'status' => 'aktif',
                'tanggal_mulai' => $this->toDate(session('inputMhs')[$i][8]),
                'tanggal_akhir' => $this->toDate(session('inputMhs')[$i][9]),
                'id_pembimbing' => session('idUser'),
                'created_at' => $date,
                'updated_at' => $date
            ];
            DB::table('mahasiswas')->insert($mahasiswa);
            $mahasiswanya = Mahasiswa::where('username', session('inputMhs')[$i][1])->get();
            $nilai = [
                'id_mahasiswa' => $mahasiswanya[0]['id'],
                'total_hari' => 0,
                'status' => 'Aktif',
                '_001' => 0,
                '_002' => 0,
                '_003' => 0,
                '_004' => 0,
                '_005' => 0,
                '_006' => 0,
                '_007' => 0,
                '_008' => 0,
                '_009' => 0,
                '_010' => 0,
                '_011' => 0,
                '_012' => 0,
                '_013' => 0,
                '_014' => 0,
                '_015' => 0,
                '_016' => 0,
                '_017' => 0,
                'created_at' => $date,
                'updated_at' => $date
            ];
            Nilai::insert($nilai);
        }
        session(['berhasilInsert' => true]);
        session(['inputMhs' => []]);
        return redirect('dashboard');
    }

    public function deleteInputMhs($id)
    {
        $tmp = session('inputMhs');

        array_splice($tmp, $id - 1, 1);
        session(['inputMhs' => $tmp]);

        $hasil = $this->rapikanArray(session('inputMhs'));
        session(['inputMhs' => $hasil]);

        return redirect('inputMahasiswa')->with('berhasilHapus', true);
    }

    private function ubahTanggal($tanggal)
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

    private function semesternya($semester)
    {
        $bahasa = ['Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan', 'Sepuluh'];

        return $semester . " (" . $bahasa[$semester - 1] . ")";
    }

    private function nomorSurat($nomor)
    {
        if ($nomor < 10) {
            return "00" . $nomor;
        } else if ($nomor < 100) {
            return "0" . $nomor;
        } else {
            return "" . $nomor;
        }
    }

    public function unduhSurat(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        $tanggal = $this->ubahTanggal($date);
        $namaMhs = $request->namaMhs;
        $nimMhs = $request->nimMhs;
        $programMhs = $request->programStudiMhs;
        $semesterMhs = $request->semesterMhs;
        $semester = $this->semesternya($semesterMhs);
        $nilaiMhs = $request->nilaiMhs;
        $karakterMhs = $request->karakterMhs;

        $nomorSurat = Surat::where('id_mahasiswa', session('idUser'))->get();

        if (count($nomorSurat) == 0) {
            $suratnya = Surat::get();
            if (count($suratnya) == 0) {
                $nomorNext = 1;
            } else {
                $nomorNext = intval($suratnya[count($suratnya) - 1]['nomor']) + 1;
            }
            $nomor = $this->nomorSurat($nomorNext);

            // Creating the new document...
            $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('template_surat.docx');

            $phpWord->setValues([
                'nomor' => $nomor,
                'tanggal' => $tanggal,
                'nama' => $namaMhs,
                'nim' => $nimMhs,
                'program_studi' => $programMhs,
                'semester' => $semester,
                'nilai' => $nilaiMhs,
                'karakter' => $karakterMhs
            ]);

            $surat_menyurat = [
                'nomor' => $nomor,
                'id_mahasiswa' => session('idUser'),
                'created_at' => $date,
                'updated_at' => $date
            ];

            Surat::insert($surat_menyurat);

            $phpWord->saveAs('surat_mahasiswa/' . $nomor . '.docx');

            $file = public_path() . "/surat_mahasiswa/" . $nomor . ".docx";

            $headers = array(
                'Content-Type: application/msword',
            );

            return response()->download($file, '' . $namaMhs . ' - Pemberitahuan Hasil Program Pembinaan Karakter.docx', $headers);
        } else {
            $file = public_path() . "/surat_mahasiswa/" . $nomorSurat[0]['nomor'] . ".docx";

            $headers = array(
                'Content-Type: application/msword',
            );

            return response()->download($file, '' . $namaMhs . ' - Pemberitahuan Hasil Program Pembinaan Karakter.docx', $headers);
        }
    }
}
