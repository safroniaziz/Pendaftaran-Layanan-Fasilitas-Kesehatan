<?php

namespace App\Http\Controllers;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MitraController extends Controller
{
    public function index(){
        $semua_mitra=Mitra::all();
        return view('semua_mitra.index',[
            'semua_mitra'   =>  $semua_mitra
        ]);
    }
    public function create(){
        return view('semua_mitra.create');
    }

    public function post(Request $request){
        $attributes = [
            'nama_mitra'      =>  'Nama mitra',
        ];
        $this->validate($request, [
            'nama_mitra'      =>  'required',
        ],$attributes);

        Mitra::create([
            'mitra_id'      =>  Auth::user()->id,
            'nama_mitra'  =>  $request->nama_mitra,
        ]);

        $notification = array(
            'message' => 'Berhasil, data mitra berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('semua_mitra')->with($notification);
    }
}
