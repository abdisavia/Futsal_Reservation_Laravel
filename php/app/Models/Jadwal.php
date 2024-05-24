<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function menyewa() {
        return $this->hasMany(Menyewa::class,'kode_jadwal');
    }

    function lapangan() {
        return $this->hasMany(Lapangan::class,'kode_jadwal');
    }
}

