<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlurLayanan;
use App\Models\DetailAlurLayanan;
use Illuminate\Support\Facades\Auth;
class DetailAlurLayananController extends Controller
{
    public function index(AlurLayanan $alurlayanan){
        $detailalurlayanans = $alurlayanan->detailalurlayanans()->where('mitra_id',Auth::user()->mitra_id)->get();
        return view('detailalurlayanans.index',[
            'alurlayanan'    =>  $alurlayanan,
            'detailalurlayanans'     =>  $detailalurlayanans,
        ]);
    }

    public function create(AlurLayanan $alurlayanan, DetailAlurLayanan $detailalurlayanan){
        return view('detailalurlayanans.create',[
            'alurlayanan'     =>  $alurlayanan,
        ]);
    }
    public function post(Request $request, AlurLayanan $alurlayanan, DetailAlurLayanan $detailalurlayanan){
        $messages = [
            'required' => ':attribute harus diisi',
            'numeric' => ':attribute harus berisi angka',
        ];
        $attributes = [
            'alur_layanan_id'        =>  'Detail Alur Layanan',
            'detail_alur_layanan'         =>  'Detail Alur Layanan',
        ];
        $this->validate($request, [
            'detail_alur_layanan'         =>  'required',
        ],$messages,$attributes);

        DetailAlurLayanan::create([
            'mitra_id'                =>  Auth::user()->id,
            'alur_layanan_id'         =>  $alurlayanan->id,
            'detail_alur_layanan'     =>  $request->detail_alur_layanan,
        ]);

        $notification = array(
            'message' => 'Berhasil, alurlayanan pealurlayanan berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('detailalurlayanans',[$alurlayanan->id])->with($notification);
    }

    public function edit(AlurLayanan $alurlayanan, DetailAlurLayanan $detailalurlayanan){
        return view('detailalurlayanans.edit',[
            'detailalurlayanan'  =>  $detailalurlayanan,
            'alurlayanan'  =>  $alurlayanan,
        ]);
    }

    public function update(Request $request, alurlayanan $alurlayanan, DetailAlurLayanan $detailalurlayanan){
        $attributes = [
            'detail_alur_layanan'      =>  'Detail Alur Layanan',
        ];
        $this->validate($request, [
            'detail_alur_layanan'  =>  'required',
        ],$attributes);

        $detailalurlayanan->update([
            'mitra_id'                =>  Auth::user()->id,
            'alur_layanan_id'         =>  $alurlayanan->id,
            'detail_alur_layanan'     =>  $request->detail_alur_layanan,
        ]);

        $notification = array(
            'message' => 'Berhasil, data alurlayanan berhasil diubah!',
            'alert-type' => 'success'
        );
        return redirect()->route('detailalurlayanans',[$alurlayanan->id])->with($notification);
    }

    public function delete(AlurLayanan $alurlayanan, DetailAlurLayanan $detailalurlayanan){
        $detailalurlayanan->delete();

        $notification = array(
            'message' => 'Berhasil, data alurlayanan berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('detailalurlayanans',[$alurlayanan->id])->with($notification);
    }
}
