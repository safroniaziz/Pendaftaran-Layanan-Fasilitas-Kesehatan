<?php

namespace App\Http\Controllers;
use App\Models\Sesi;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    public function index(Jadwal $jadwal){
        $sesis = $jadwal->sesis()->where('mitra_id',Auth::user()->mitra_id)->get();
        return view('sesis.index',[
            'jadwal'    =>  $jadwal,
            'sesis'     =>  $sesis,
        ]);
    }

    public function create(Jadwal $jadwal, Sesi $sesi){
        return view('sesis.create',[
            'jadwal'     =>  $jadwal,
        ]);
    }
    public function post(Request $request, Jadwal $jadwal, Sesi $sesi){
        $messages = [
            'required' => ':attribute harus diisi',
            'numeric' => ':attribute harus berisi angka',
        ];
        $attributes = [
            'jadwal_id'        =>  'Nama Hari',
            'nama_hari'         =>  'Nama Hari',
        ];
        $this->validate($request, [

        ],$messages,$attributes);

        Sesi::create([
            'mitra_id'          =>  Auth::user()->id,
            'jadwal_id'         =>  $jadwal->id,
            'nama_sesi'         =>  $request->nama_sesi,
            'jam_mulai'         =>  $request->jam_mulai,
            'jam_selesai'         =>  $request->jam_selesai,


        ]);

        $notification = array(
            'message' => 'Berhasil, jadwal pejadwal berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('sesis',[$jadwal->id])->with($notification);
    }

    public function edit(Jadwal $jadwal, Sesi $sesi){
        return view('sesis.edit',[
            'sesi'  =>  $sesi,
            'jadwal'  =>  $jadwal,
        ]);
    }

    public function update(Request $request, Jadwal $jadwal, Sesi $sesi){
        $attributes = [
            'nama_hari'      =>  'Nama Hari',
        ];
        $this->validate($request, [
            'jadwal_id'      =>  'required',
            'jam_mulai'      =>  'required',
            'jam_selesai'      =>  'required',
            'nama_sesi'      =>  'required',
        ],$attributes);

        $sesi->update([
            'mitra_id'          =>  Auth::user()->id,
            'jadwal_id'         =>  $jadwal->id,
            'nama_sesi'         =>  $request->nama_sesi,
            'jam_mulai'         =>  $request->jam_mulai,
            'jam_selesai'         =>  $request->jam_selesai,
        ]);

        $notification = array(
            'message' => 'Berhasil, data jadwal berhasil diubah!',
            'alert-type' => 'success'
        );
        return redirect()->route('sesis',[$jadwal->id])->with($notification);
    }

    public function delete(Jadwal $jadwal, Sesi $sesi){
        $sesi->delete();

        $notification = array(
            'message' => 'Berhasil, data jadwal berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('sesis',[$jadwal->id])->with($notification);
    }
}
