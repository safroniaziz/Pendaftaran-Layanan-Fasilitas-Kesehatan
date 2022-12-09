<?php

namespace App\Http\Controllers;
use App\Models\AlurLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlurLayananController extends Controller
{
    public function index(){
        $alurlayanans = AlurLayanan::where('mitra_id',Auth::user()->mitra_id)->get();
        return view('alurlayanans.index',[
            'alurlayanans'  =>  $alurlayanans
        ]);
    }

    public function create(){
        return view('alurlayanans.create');
    }

    public function post(Request $request){
        $attributes = [
            'nama_alur_layanan'      =>  'Nama alurLayanan',
        ];
        $this->validate($request, [
            'nama_alur_layanan'      =>  'required',
        ],$attributes);

        AlurLayanan::create([
            'mitra_id'      =>  Auth::user()->id,
            'nama_alur_layanan'  =>  $request->nama_alur_layanan,
        ]);

        $notification = array(
            'message' => 'Berhasil, data alur layanan berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('alurlayanans')->with($notification);
    }

    public function edit(alurLayanan $alurlayanan){
        return view('alurlayanans.edit',[
            'alurlayanan'  =>  $alurlayanan,
        ]);
    }

    public function update(Request $request, alurLayanan $alurlayanan){
        $attributes = [
            'nama_alur_layanan'      =>  'Nama alur Layanan',
        ];
        $this->validate($request, [
            'nama_alur_layanan'      =>  'required',
        ],$attributes);

        $alurlayanan->update([
            'nama_alur_layanan'  =>  $request->nama_alur_layanan,
        ]);

        $notification = array(
            'message' => 'Berhasil, data alurlayanan berhasil diubah!',
            'alert-type' => 'success'
        );
        return redirect()->route('alurlayanans')->with($notification);
    }

    public function delete(alurLayanan $alurlayanan){
        $alurlayanan->delete();

        $notification = array(
            'message' => 'Berhasil, data alurlayanan berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('alurlayanans')->with($notification);
    }
}
