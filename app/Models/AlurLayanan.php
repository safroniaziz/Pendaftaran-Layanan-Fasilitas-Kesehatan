<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlurLayanan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function detailAlurLayanans(){
        return $this->hasMany(DetailAlurLayanan::class);
    }
}
