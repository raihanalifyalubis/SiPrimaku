<?php

namespace Database\Seeders;


use App\Models\Mahasiswa;
use App\Models\Pembimbing;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        $pembimbing =
            [
                [
                    'id' => '1',
                    'username' => '201402059',
                    'password' => md5('raihan20'),
                    'nama' => 'Raihan Alifya PMB',
                    'email' => 'raihan.alifya22@gmail.com',
                    'status' => 'Aktif',
                    'nomor_induk' => '21021020',
                    'created_at' => $date,
                    'updated_at' => $date
                ],
                [
                    'id' => '2',
                    'username' => '201402044',
                    'password' => md5('raihan20'),
                    'nama' => 'Raihan Alifya PMB 2',
                    'email' => 'raihan.alifya22@gmail.com',
                    'status' => 'Aktif',
                    'nomor_induk' => '21021020',
                    'created_at' => $date,
                    'updated_at' => $date
                ]
            ];
        DB::table('pembimbings')->delete();
        DB::table('pembimbings')->insert($pembimbing);

        $mahasiswa = [
            [
                'id' => '1',
                'username' => '201402062',
                'password' => md5('raihan20'),
                'nama' => 'Raihan Alifya Lubis',
                'jenis_kelamin' => 'L',
                'program_studi' => 'Teknologi Informasi',
                'semester' => '8',
                'status' => 'aktif',
                'tanggal_mulai' => '2024-06-26',
                'tanggal_akhir' => '2024-07-26',
                'id_pembimbing' => '1',
                'created_at' => $date,
                'updated_at' => $date
            ]
        ];
        DB::table('mahasiswas')->delete();
        DB::table('mahasiswas')->insert($mahasiswa);
    }
}
