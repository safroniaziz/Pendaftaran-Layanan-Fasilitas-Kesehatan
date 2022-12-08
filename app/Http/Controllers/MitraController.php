<?php

namespace App\Http\Controllers;
use App\models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index(){
        $semua_mitra=Mitra::all();
        return view('administrator/index',[
            'semua_mitra'   =>  $semua_mitra
        ]);
    }
}
