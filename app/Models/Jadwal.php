<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function layanan(){
        return $this->belongsTo(Layanan::class);
    }

    public function sesis(){
        return $this->hasMany(Sesi::class);
    }
}
