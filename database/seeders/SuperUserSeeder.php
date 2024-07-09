<?php

namespace Database\Seeders;

use App\Models\SuperUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuperUSerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super_user = [
            [
                'username' => 'raihanalifyalubis',
                'password' => md5('raihan20022003'),
                'nama' => 'Raihan Alifya Lubis'
            ],
            [
                'username' => 'muhammadsyahbagus',
                'password' => md5('bagus0601'),
                'nama' => 'Muhammad Syah Bagus'
            ],
            [
                'username' => 'dikyanantasembiring',
                'password' => md5('diky2406'),
                'nama' => 'Diky Ananta Sembiring'
            ]
        ];
        DB::table('super_users')->delete();
        DB::table('super_users')->insert($super_user);
    }
}
