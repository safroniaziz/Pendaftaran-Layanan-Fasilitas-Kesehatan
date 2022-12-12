<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SyaratPendaftaran;
use Illuminate\Support\Facades\Auth;
class SyaratPendaftaranController extends Controller
{
    public function index(){
        $syaratpendaftarans = SyaratPendaftaran::where('mitra_id',Auth::user()->mitra_id)->get();
        return view('syaratpendaftarans.index',[
            'syaratpendaftarans'  =>  $syaratpendaftarans
        ]);
    }

    public function create(){
        return view('syaratpendaftarans.create');
    }

    public function post(Request $request){
        $attributes = [
            'syarat_pendaftaran'      =>  'syarat pendaftaran',
        ];
        $this->validate($request, [
            'syarat_pendaftaran'      =>  'required',
        ],$attributes);

        SyaratPendaftaran::create([
            'mitra_id'      =>  Auth::user()->id,
            'syarat_pendaftaran'  =>  $request->syarat_pendaftaran,
        ]);

        $notification = array(
            'message' => 'Berhasil, data alur layanan berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('syaratpendaftarans')->with($notification);
    }

    public function edit(SyaratPendaftaran $syaratpendaftaran){
        return view('syaratpendaftarans.edit',[
            'syaratpendaftaran'  =>  $syaratpendaftaran,
        ]);
    }

    public function update(Request $request, SyaratPendaftaran $syaratpendaftaran){
        $attributes = [
            'syarat_pendaftaran'      =>  'Nama alur Layanan',
        ];
        $this->validate($request, [
            'syarat_pendaftaran'      =>  'required',
        ],$attributes);

        $syaratpendaftaran->update([
            'syarat_pendaftaran'  =>  $request->syarat_pendaftaran,
        ]);

        $notification = array(
            'message' => 'Berhasil, data syaratpendaftaran berhasil diubah!',
            'alert-type' => 'success'
        );
        return redirect()->route('syaratpendaftarans')->with($notification);
    }

    public function delete(SyaratPendaftaran $syaratpendaftaran){
        $syaratpendaftaran->delete();

        $notification = array(
            'message' => 'Berhasil, data syaratpendaftaran berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('syaratpendaftarans')->with($notification);
    }
}
