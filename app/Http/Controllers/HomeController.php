<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function daftar(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
            'numeric' => ':attribute harus berisi angka',
        ];
        $attributes = [
            'nama_lengkap'      =>  'Nama Lengkap',
            'nik'               =>  'Nomor Induk Keluarga',
            'alamat'            =>  'Alamat Lengkap',
            'no_hp'             =>  'Nomor Telephone',
            'umur'              =>  'Umur',
            'jenis_kelamin'     =>  'Jenis Kelamin',
            'keluhan'           =>  'Keluhan',
        ];
        $this->validate($request, [
            'nama_lengkap'      =>  'required',
            'nik'               =>  'required',
            'alamat'            =>  'required',
            'no_hp'             =>  'required',
            'umur'              =>  'required',
            'jenis_kelamin'     =>  'required',
            'keluhan'           =>  'required',
        ],$messages,$attributes);

        Pendaftar::create([
            'nama_lengkap'      =>  $request->nama_lengkap,
            'nik'               =>  $request->nik,
            'alamat'            =>  $request->alamat,
            'no_hp'             =>  $request->no_hp,
            'umur'              =>  $request->umur,
            'jenis_kelamin'     =>  $request->jenis_kelamin,
            'keluhan'           =>  $request->keluhan,
        ]);
    }
}
