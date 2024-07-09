<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bimbingan;
use Illuminate\Support\Facades\DB;

class BimbinganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        $bimbingans = [];
        $id_array = [];
        $tambahan = 34;
        $nilai = ["S, Z, M, I", "Y", "N", "N", "Y", 4, "Y", "3", "Y", 3, 4, 2, 3, 2, 3, 2, 3];
        for ($i = 1; $i < 18; $i++) {
            if ($i < 10) {
                $aspek = "_00" . $i;
            } else {
                $aspek = "_0" . $i;
            }
            $temp = [
                "id" => $i + $tambahan,
                "id_mahasiswa" => "1",
                "aspek" => $aspek,
                "nilai" => $nilai[$i - 1],
                "tanggal" => "2024-07-04",
                "created_at" => $date,
                "updated_at" => $date
            ];
            array_push($id_array, $i + $tambahan);
            array_push($bimbingans, $temp);
        }
        $hasil_bimbingans = [
            "id" => $tambahan / 17 + 1,
            "id_mahasiswa" => "1",
            "id_pembimbing" => "1",
            "id_aspek" => implode(", ", $id_array),
            "tanggal" => "2024-07-04",
            "status" => "Belum Diverifikasi",
            "komentar" => "",
            "created_at" => $date,
            "updated_at" => $date
        ];
        DB::table('hasil_bimbingans')->insert($hasil_bimbingans);
        DB::table('bimbingans')->insert($bimbingans);
    }
}
