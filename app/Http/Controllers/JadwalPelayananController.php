<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalPelayananController extends Controller
{
    public function index(){
        $jadwals = Jadwal::with(['layanan','sesis'])->where('mitra_id',Auth::user()->mitra_id)->get();
        return view('jadwals.index',[
            'jadwals'  =>  $jadwals
        ]);
    }

    public function create(){
        $layanans = Layanan::where('mitra_id',Auth::user()->id)->get();
        return view('jadwals.create',[
            'layanans'  =>  $layanans
        ]);
    }

    public function post(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
            'numeric' => ':attribute harus berisi angka',
        ];
        $attributes = [
            'layanan_id'        =>  'Nama Layanan',
            'nama_hari'         =>  'Nama Hari',
        ];
        $this->validate($request, [
            'layanan_id'      =>  'required',
            'nama_hari'       =>  'required',
        ],$messages,$attributes);

        Jadwal::create([
            'mitra_id'          =>  Auth::user()->id,
            'layanan_id'        =>  $request->layanan_id,
            'nama_hari'         =>  $request->nama_hari,
        ]);

        $notification = array(
            'message' => 'Berhasil, jadwal pelayanan berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('jadwals')->with($notification);
    }

    public function edit(Jadwal $jadwal, Layanan $layanan){
        $layanans = Layanan::where('mitra_id',Auth::user()->id)->get();
        return view('jadwals.edit',[
            'layanan'  =>  $layanan,
            'jadwal'  =>  $jadwal,
            'layanans' => $layanans
        ]);
    }
    public function update(Request $request, Jadwal $jadwal, Layanan $layanan){
        $attributes = [
            'nama_layanan'      =>  'Nama Layanan',
        ];
        $this->validate($request, [
            'layanan_id'      =>  'required',
            'nama_hari'      =>  'required',
        ],$attributes);

        $jadwal->update([
            'mitra_id'          =>  Auth::user()->id,
            'layanan_id'         =>  $request->layanan_id,
            'nama_hari'         =>  $request->nama_hari,
        ]);

        $notification = array(
            'message' => 'Berhasil, data layanan berhasil diubah!',
            'alert-type' => 'success'
        );
        return redirect()->route('jadwals')->with($notification);
    }
    public function delete(Jadwal $jadwal, Layanan $layanan){
        $jadwal->delete();

        $notification = array(
            'message' => 'Berhasil, data layanan berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('jadwals')->with($notification);
    }
}
