<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayananController extends Controller
{
    public function index(){
        $layanans = Layanan::where('mitra_id',Auth::user()->mitra_id)->get();
        return view('layanans.index',[
            'layanans'  =>  $layanans
        ]);
    }

    public function create(){
        return view('layanans.create');
    }

    public function post(Request $request){
        $attributes = [
            'nama_layanan'      =>  'Nama Layanan',
        ];
        $this->validate($request, [
            'nama_layanan'      =>  'required',
        ],$attributes);

        Layanan::create([
            'mitra_id'      =>  Auth::user()->id,
            'nama_layanan'  =>  $request->nama_layanan,
        ]);

        $notification = array(
            'message' => 'Berhasil, data layanan berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('layanans')->with($notification);
    }
}
