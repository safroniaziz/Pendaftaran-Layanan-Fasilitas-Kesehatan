<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $guarded = [];
=======

    protected $guarded = [];

    public function layanan(){
        return $this->belongsTo(Layanan::class);
    }

    public function sesis(){
        return $this->hasMany(Sesi::class);
    }
>>>>>>> 1daea963942001d0bc2c991593bf2b77c2fe2a26
}
