<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaTambahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        $mahasiswa = [
            [
                'username' => '201402063',
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
            ],
            [
                'username' => '201402064',
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
            ],
        ];
        DB::table('mahasiswas')->insert($mahasiswa);
    }
}
