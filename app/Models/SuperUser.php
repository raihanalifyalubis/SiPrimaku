<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperUser extends Model
{
    use HasFactory;

    protected $table = 'super_users';
    protected $primarykey = 'id';
    protected $fillable = ['username', 'password', 'nama'];
}
