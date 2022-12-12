<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function daftar(Request $request){
        $rules = [
            'mitra_id'          =>  'required',
            'nama_lengkap'      =>  'required',
            'nik'               =>  'required|numeric',
            'alamat'            =>  'required',
            'no_hp'             =>  'required|numeric',
            'umur'              =>  'required|numeric',
            'jenis_kelamin'     =>  'required',
            'keluhan'           =>  'required',
        ];
        $text = [
            'mitra_id.required'          =>  'Tempat Pelayanan Kesehatan Harus Dipilih',
            'nama_lengkap.required'      =>  'Nama Lengkap Tidak Boleh Kosong',
            'nik.numeric'                =>  'Harap Masukan Angka Di Bagian Nomor Induk Keluarga',
            'nik.required'               =>  'Nomor Induk Keluarga Tidak Boleh Kosong',
            'alamat.required'            =>  'Alamat Lengkap Tidak Boleh Kosong',
            'no_hp.numeric'              =>  'Harap Masukan Angka Di Bagian Nomor Telephone',
            'no_hp.required'             =>  'Nomor Telephone Tidak Boleh Kosong',
            'umur.numeric'               =>  'Harap Masukan Angka Di Bagian Umur',
            'umur.required'              =>  'Umur Tidak Boleh Kosong',
            'jenis_kelamin.required'     =>  'Jenis Kelamin Harus Dipilih',
            'keluhan.required'           =>  'Keluhan Tidak Boleh Kosong',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $simpan = Pendaftar::create($request->all());
        if ($simpan) {
            return response()->json(['text' =>  'Selamat, Pendaftaran Anda Behasil']);
        }else {
            return response()->json(['text' =>  'Oopps, Pendaftaran Anda Gagal']);
        }
    }
}
