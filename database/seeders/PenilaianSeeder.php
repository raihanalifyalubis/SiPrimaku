<?php

namespace Database\Seeders;

use App\Models\Penilaian;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nilai_nilai = [
            "Tidak pernah melaksanakan sama sekali selama pembinaan", "Melaksanakan tidak lebih dari 25% selama pembinaan", "Melaksanakan tidak lebih dari 50% selama pembinaan", "Melaksanakan paling sedikit 75% selama pembinaan", "Melaksanakan sebelum pembinaan, sedang dan pernah menjadi imam shalat subuh berjamaah",
            "Tidak pernah membaca/menghafal Al Qur'an selama pembinaan", "Melaksanakan tidak lebih dari 25% membaca/menghafal Al Qur'an selama pembinaan", "Melaksanakan tidak lebih dari 50% membaca/menghafal Al Qur'an selama pembinaan", "Membaca dan hafal Al Qur`an 1 juz", "Membaca dan hafal Al Qur`an lebih atau 3 juz",
            "Hanya mengingat dan tidak berkomunikasi/mendoakan orang tuanya", "Berkomunikasi/mendoakan orang tuanya satu kali dalam selama pembinaan", "Berkomunikasi/mendo`akan orang tua sekali dalam setengah bulan", "Berkomunikasi/mendo`akan orang tua setiap pekan", "Berkomunikasi/mendo`akan orang tua rutin setiap hari",
            "Tidak pernah shalat tahajjud", "Shalat tahajjud tidak lebih dari 25% selama pembinaan", "Shalat tahajjud tidak lebih dari 50% selama pembinaan", "Shalat tahajjud paling sedikit 75% selama pembinaan", "Tidak pernah meninggalkan shalat tahajjud",
            "Tidak pernah shalat dhuha", "Shalat dhuha tidak lebih dari 25% selama pembinaan", "Shalat dhuha tidak lebih dari 50% selama pembinaan", "Shalat dhuha paling sedikit 75% selama pembinaan", "Tidak pernah meninggalkan shalat dhuha",
            "Tidak pernah shalat rawatib sama sekali", "Shalat rawatib tidak lebih dari 25% selama pembinaan", "Shalat rawatib tidak lebih dari 50% selama pembinaann", "Shalat rawatib tidak lebih dari 75% selama pembinaan", "Tidak pernah meninggalkan shalat rawatib sekalipun",
            "Tidak pernah puasa 1213 sama sekali", "Puasa 1213 tidak lebih dari 25% selama pembinaan", "Puasa 1213 tidak lebih dari 50% selama pembinaan", "Puasa 1213 paling sedikit 75% selama pembinaan", "Tidak pernah meninggalkan puasa 1213 selama ini",
            "Tidak pernah pernah shalat di masjid", "Shalat di masjid berbeda tidak lebih dari 25% selama pembinaan", "Shalat di masjid berbeda tidak lebih dari 50% selama pembinaan", "Shalat di masjid berbeda paling sedikit 75% selama pembinaan", "Shalat di tiga puluh masjid berbeda",
            "Tidak pernah infaq sama sekali", "Infaq tidak lebih dari 25% selama pembinaan", "Infaq tidak lebih dari 50% selama pembinaan", "Infaq paling sedikit 75% selama pembinaan", "Infaq setiap hari",
            "Memiliki email dan blog tidak standart/tidak sama sekali", "Memiliki email dan blog dari perguruan tinggi", "Memiliki email dan blog aktif minimal satu pekan sekali update", "Memiliki email dan blog aktif setiap hari", "Menjadikan email dan blog dalam kehidupan akademik",
            "Memiliki google drive pribadi", "Memiliki google drive dimanfaatkan satu pekan sekali", "Mendayagunakan google drive setiap hari", "Memfungsikan google dirive untuk kegiatan pembelajaran ", "Mendayagunakan google drive untuk mendapatkan pendapatan tambahan",
            "Tidak pernah terlibat di organisasi sosial/keagamaan", "Terlibat/tercatat di satu organisasi sosial/keagamaan", "Aktif menjadi pengurus pada organisasi sosial/keagamaan", "Menjadi pengurus organisasi sosial/keagamaan tingkat kabupaten", "Menjadi pengurus inti pada organisasi sosial/keagamaan tingkat provinsi",
            "Tidak pernah mengabdi", "Mengajar/mengabdikan diri pada orang lain", "Mengabdi beberapa pekan selama pembinaan", "Mengabdi secara permanen di satuan lembaga", "Menjadi pengelola di tingkat lembaga",
            "Tidak pernah membina", "Membina masyarakat dengan menggantikan orang lain", "Membina beberapa pekan selama pembinaan", "Membibina secara permanen di lembaga resmi", "Mendirikan dan menjadi pemiliki lembaga pembinaan",
            "Tidak pernah menulis jurnal", "Pernah belajar kursus menulis jurnal", "Pernah menulis tetapi tidak diterbitkan", "Pernah sekali tulisan diterbitkan jurnal", "Menjadi penulis tetap di jurnal tertentu",
            "Tidak pernah menulis surat kabar", "Pernah belajar kursus menulis surat kabar", "Pernah menulis tetapi tidak diterbitkan", "Pernah sekali tulisan diterbitkan surat kabar", "Menjadi penulis tetap di surat kabar tertentu",
            "Tidak pernah menulis buku", "Pernah belajar kursus/pelatihan menulis buku", "Pernah menulis buku tetapi tidak diterbitkan", "Pernah sekali menulis buku diterbitkan ber-ISBN", "Menjadi penulis di beberapa buku",
        ];

        $penilaian = [];

        for ($i = 0; $i < 17; $i++) {
            for ($j = 1; $j < 6; $j++) {
                $perpenilaian = [];
                if ($i < 9) {
                    $kode = 'PK00' . $i + 1;
                } else {
                    $kode = 'PK0' . $i + 1;
                }
                $perpenilaian = [
                    'id' => $i * 5 + $j,
                    'kode_aspek_pembinaan' => $kode,
                    'penilaian' => $nilai_nilai[$i * 5 + $j - 1],
                    'skor' => $j * 20
                ];
                array_push($penilaian, $perpenilaian);
            }
        }

        DB::table('penilaians')->delete();
        DB::table('penilaians')->insert($penilaian);
    }
}
