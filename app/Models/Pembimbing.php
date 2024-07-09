<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    use HasFactory;

    protected $table = 'pembimbings';
    protected $primarykey = 'id';
    protected $fillable = ['username', 'password', 'nama', 'email', 'status', 'nomor_induk'];
}
