<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';
    protected $primarykey = 'id';
    protected $fillable = ['username', 'password', 'nama', 'jenis_kelamin', 'program_studi', 'semester', 'status', 'tanggal_mulai', 'tanggal_akhir', 'id_pembimbing'];
}
