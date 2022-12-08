<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAlurLayanan extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function alurLayanan(){
        return $this->belongsTo(AlurLayanan::class);
    }
}
