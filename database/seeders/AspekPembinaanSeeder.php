<?php

namespace Database\Seeders;

use App\Models\AspekPembinaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AspekPembinaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aspek = [
            [
                'kode' => 'PK001',
                'penjelasan' => 'Shalat 5 Waktu (Berjamaah di Masjid Dianjurkan Khusus Mahasiswa Pria'
            ],
            [
                'kode' => 'PK002',
                'penjelasan' => "Membaca/Menghafal Al-Qur'an"
            ],
            [
                'kode' => 'PK003',
                'penjelasan' => "Mendo'akan/Berkomunikasi dengan Ibu/Ayahnya"
            ],
            [
                'kode' => 'PK004',
                'penjelasan' => "Shalat Tahajjud"
            ],
            [
                'kode' => 'PK005',
                'penjelasan' => "Shalat Dhuha"
            ],
            [
                'kode' => 'PK006',
                'penjelasan' => "Shalat Rawatib Lengkap"
            ],
            [
                'kode' => 'PK007',
                'penjelasan' => "Puasa 1213 (Senin Kamis)"
            ],
            [
                'kode' => 'PK008',
                'penjelasan' => "Shalat di Tiga Puluh Masjid"
            ],
            [
                'kode' => 'PK009',
                'penjelasan' => "Infaq Lima Belas Hari dalam Sebulan"
            ],
            [
                'kode' => 'PK010',
                'penjelasan' => "Email dan Blog"
            ],
            [
                'kode' => 'PK011',
                'penjelasan' => "Memiliki Google Drive"
            ],
            [
                'kode' => 'PK012',
                'penjelasan' => "Keterlibatan di Organisasi Sosial/Keagamaan"
            ],
            [
                'kode' => 'PK013',
                'penjelasan' => "Mengabdi Sesuai Tujuan Prodi"
            ],
            [
                'kode' => 'PK014',
                'penjelasan' => "Membina Sekelompok Masyarakat"
            ],
            [
                'kode' => 'PK015',
                'penjelasan' => "Menulis di Jurnal"
            ],
            [
                'kode' => 'PK016',
                'penjelasan' => "Menulis di Harian Surat Kabar"
            ],
            [
                'kode' => 'PK017',
                'penjelasan' => "Menulis Buku"
            ]
        ];
        DB::table('aspek_pembinaans')->delete();
        DB::table('aspek_pembinaans')->insert($aspek);
    }
}
