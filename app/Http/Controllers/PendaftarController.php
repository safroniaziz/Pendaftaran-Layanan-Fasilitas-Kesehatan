<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Auth;
class PendaftarController extends Controller
{
    public function index(){
        $pendaftars = Pendaftar::where('mitra_id',Auth::user()->mitra_id)->get();
        return view('pendaftars.index',[
            'pendaftars'  =>  $pendaftars
        ]);
    }

    public function create(){
        return view('pendaftars.create');
    }

    public function post(Request $request){
        $attributes = [
            'nama_lengkap'      =>  'nama lengkap',
        ];
        $this->validate($request, [
            'nama_lengkap'       =>  'required',
            'nik'                =>  'required',
            'alamat'             =>  'required',
            'no_hp'              =>  'required',
            'umur'               =>  'required',
            'jenis_kelamin'      =>  'required',
        ],$attributes);

        Pendaftar::create([
            'mitra_id'      =>  Auth::user()->id,
            'nama_lengkap'  =>  $request->nama_lengkap,
            'nik'           =>  $request->nik,
            'alamat'        =>  $request->alamat,
            'no_hp'         =>  $request->no_hp,
            'umur'          =>  $request->umur,
            'jenis_kelamin' =>  $request->jenis_kelamin,
            'keluhan'       =>  $request->keluhan,

        ]);

        $notification = array(
            'message' => 'Berhasil, data alur layanan berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('pendaftars')->with($notification);
    }

    public function edit(Pendaftar $pendaftar){
        return view('pendaftars.edit',[
            'pendaftar'  =>  $pendaftar,
        ]);
    }

    public function update(Request $request, pendaftar $pendaftar){
        $attributes = [
            'syarat_pendaftaran'      =>  'Nama alur Layanan',
        ];
        $this->validate($request, [
            'nama_lengkap'       =>  'required',
            'nik'                =>  'required',
            'alamat'             =>  'required',
            'no_hp'              =>  'required',
            'umur'               =>  'required',
            'jenis_kelamin'      =>  'required',
        ],$attributes);

        $pendaftar->update([
            'nama_lengkap'  =>  $request->nama_lengkap,
            'nik'           =>  $request->nik,
            'alamat'        =>  $request->alamat,
            'no_hp'         =>  $request->no_hp,
            'umur'          =>  $request->umur,
            'jenis_kelamin' =>  $request->jenis_kelamin,
            'keluhan'       =>  $request->keluhan,

        ]);

        $notification = array(
            'message' => 'Berhasil, data pendaftar berhasil diubah!',
            'alert-type' => 'success'
        );
        return redirect()->route('pendaftars')->with($notification);
    }

    public function delete(Pendaftar $pendaftar){
        $pendaftar->delete();

        $notification = array(
            'message' => 'Berhasil, data pendaftar berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('pendaftars')->with($notification);
    }
}
