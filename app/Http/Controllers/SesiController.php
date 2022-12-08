<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    public function index(Jadwal $jadwal){
        $sesis = $jadwal->sesis()->get();
        return view('sesis.index',[
            'jadwal'    =>  $jadwal,
            'sesis'     =>  $sesis,
        ]);
    }

    public function create(Jadwal $jadwal){
        return view('sesis.create',[
            'jadwal'     =>  $jadwal,
        ]);
    }
}
