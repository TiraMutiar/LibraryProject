<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index(Request $request) {
        return view('page.penerbit.tambah');
    }

    public function indexx(Request $request) {
        $data = [
            'datapenerbit'          =>Penerbit::all()
        ];
        return view('page.penerbit.index', $data);
    }

    public function edit(Request $request, $id) {
        $data = [
            'datapenerbit'      =>Penerbit::where('id', $id)->first()
        ];
        return view('page.penerbit.edit', $data);
    }

    public function ubah(Request $request, $id) {
        $request->validate([
            'nama_penerbit'     =>'required',
            'keterangan'        =>'required',
        ]);
        $dataStore = [
           'nama_penerbit'      =>$request->nama_penerbit,
           'keterangan'         =>$request->keterangan,
           'status'             =>'aktif'
        ];
        Penerbit::where('id', $id)->update($dataStore);
        return redirect('/lihatpenerbit');
    }
    public function data(Request $request) {
        $request->validate([
            'nama_penerbit'     =>'required',
            'keterangan'        =>'required',
        ]);
        $dataStore = [
           'nama_penerbit'      =>$request->nama_penerbit,
           'keterangan'         =>$request->keterangan,
           'status'             =>'aktif'
        ];
        Penerbit::create($dataStore);
        return redirect('/indexpenerbit');
    }

    public function hapus(Request $request, $id) {
        Penerbit::where('id', $id)->delete();
        return redirect('/indexpenerbit');
    }
}
