<?php

namespace App\Http\Controllers;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index(){
        $jadwals = Jadwal::where('mitra_id',Auth::user()->mitra_id)->get();
        return view('jadwals.index',[
            'jadwals'  =>  $jadwals
        ]);
    }

    public function create(){
        return view('jadwals.create');
    }

    public function post(Request $request){
        $attributes = [
            'nama_layanan'      =>  'Nama Jadwal',
        ];
        $this->validate($request, [
            'nama_layanan'      =>  'required',
        ],$attributes);

        Jadwal::create([
            'mitra_id'      =>  Auth::user()->id,
            'nama_layanan'  =>  $request->nama_layanan,
        ]);

        $notification = array(
            'message' => 'Berhasil, data layanan berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('jadwals')->with($notification);
    }

    public function edit(Jadwal $jadwal){
        return view('jadwals.edit',[
            'layanan'  =>  $jadwal,
        ]);
    }

    public function update(Request $request, Jadwal $jadwal){
        $attributes = [
            'nama_layanan'      =>  'Nama Jadwal',
        ];
        $this->validate($request, [
            'nama_layanan'      =>  'required',
        ],$attributes);

        $jadwal->update([
            'nama_layanan'  =>  $request->nama_layanan,
        ]);

        $notification = array(
            'message' => 'Berhasil, data layanan berhasil diubah!',
            'alert-type' => 'success'
        );
        return redirect()->route('jadwals')->with($notification);
    }

    public function delete(Jadwal $jadwal){
        $jadwal->delete();

        $notification = array(
            'message' => 'Berhasil, data layanan berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('jadwals')->with($notification);
    }
}
