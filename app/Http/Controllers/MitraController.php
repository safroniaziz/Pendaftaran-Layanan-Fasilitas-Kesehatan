<?php

namespace App\Http\Controllers;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MitraController extends Controller
{
    public function index(){
        $mitras=Mitra::all();
        return view('mitras.index',[
            'mitras'   =>  $mitras
        ]);
    }
    public function create(){
        return view('mitras.create');
    }

    public function post(Request $request){
        $attributes = [
            'nama_mitra'      =>  'Nama mitra',
        ];
        $this->validate($request, [
            'nama_mitra'      =>  'required',
        ],$attributes);

        Mitra::create([
            'nama_mitra'          =>  $request->nama_mitra,
            'tanggal_kerja_sama'  =>  $request->tanggal_kerja_sama,
            'status_kerja_sama'   =>  'aktif',
            'lokasi'              =>  $request->lokasi,

        ]);

        $notification = array(
            'message'    => 'Berhasil, data mitra berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('mitras')->with($notification);
    }

    public function edit(Mitra $mitra){
        return view('mitras.edit',[
            'mitra'  =>  $mitra,
        ]);
    }

    public function update(Request $request, Mitra $mitra){
        $attributes = [
            'nama_mitra'      =>  'Nama mitra',
        ];
        $this->validate($request, [
            'nama_mitra'      =>  'required',
        ],$attributes);

        $mitra->update([
            'nama_mitra'          =>  $request->nama_mitra,
            'tanggal_kerja_sama'  =>  $request->tanggal_kerja_sama,
            'lokasi'              =>  $request->lokasi,
        ]);

        $notification = array(
            'message' => 'Berhasil, data mitra berhasil diubah!',
            'alert-type' => 'success'
        );
        return redirect()->route('mitras')->with($notification);
    }

    public function delete(Mitra $mitra){
        $mitra->delete();

        $notification = array(
            'message' => 'Berhasil, data mitra berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('mitras')->with($notification);
    }
    public function nonaktifkanStatus($id){
        Mitra::where('id',$id)->update([
            'status_kerja_sama'    =>  'tidak_aktif'
        ]);

        $notification = array(
            'message' => 'Berhasil, Mitra berhasil dinonaktifkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('mitras')->with($notification);
    }

    public function aktifkanStatus($id){
        Mitra::where('id',$id)->update([
            'status_kerja_sama'    =>  'aktif'
        ]);

        $notification = array(
            'message' => 'Berhasil, Mitra berhasil diaktifkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('mitras')->with($notification);
    }
}
