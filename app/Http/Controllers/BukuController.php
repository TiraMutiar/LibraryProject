<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request) {
        $data = [
            'kategori'         =>Kategori::all(),
            'datapenerbit'     =>Penerbit::all()
        ];
        return view('page.buku.tambah', $data);
    }

    public function indexx(Request $request) {
        $simpan = [
            'databuku'      =>Buku::all()
        ];
        return view('page.buku.index', $simpan);
    }

    public function edit(Request $request, $id) {
        $simpan = [
            'databuku'     =>Buku::where('id', $id)->first()
        ];
        $data = [
            'kategori'     =>Kategori::all(),
            'penerbit'     =>Penerbit::all()
        ];
        return view('page.buku.edit', $simpan, $data);
    }

    public function ubah(Request $request, $id) {
        $request->validate([
            'judul_buku'       =>'required',
            'penulis'          =>'required',
            'penerbit_id'      =>'required',
            'tahun_terbit'     =>'required',
            'kategori_id'      =>'required'
        ]);
        $file_photos           = $request->file('photos');
        $extensi_photos        = $file_photos->extension();
        $nama_photos           = 'buku_'.date('dmyhis').'.'.$extensi_photos;
        $file_photos->move(public_path('/imagebuku'), $nama_photos);
        $storeData = [
            'judul_buku'       =>$request->judul_buku,
            'penulis'          =>$request->penulis,
            'penerbit_id'      =>$request->penerbit_id,
            'tahun_terbit'     =>$request->tahun_terbit,
            'kategori_id'      =>$request->kategori_id,
            'status'           =>'aktif',
            'pictures'         =>$nama_photos
        ];
        Buku::where('id', $id)->update($storeData);
        return redirect('/lihatbuku');
    }

    public function data(Request $request) {
        $request->validate([
            'judul_buku'       =>'required',
            'penulis'          =>'required',
            'penerbit_id'      =>'required',
            'tahun_terbit'     =>'required',
            'kategori_id'      =>'required',
            'photos'           =>'required|max:1024'
        ]);
        //untuk membuat nama foto
        $file_photos           = $request->file('photos');
        $extensi_photos        = $file_photos->extension();
        $nama_photos           = 'buku_'.date('dmyhis').'.'.$extensi_photos;
        $file_photos->move(public_path('/imagebuku'), $nama_photos);
        $storeData = [
            'judul_buku'       =>$request->judul_buku,
            'penulis'          =>$request->penulis,
            'penerbit_id'      =>$request->penerbit_id,
            'tahun_terbit'     =>$request->tahun_terbit,
            'kategori_id'      =>$request->kategori_id,
            'status'           =>'aktif',
            'pictures'         =>$nama_photos
        ];
        Buku::create($storeData);
        return redirect('/indexbuku');
    }

    public function hapus(Request $request, $id){
        Buku::where('id', $id)->delete();
        return redirect('/indexbuku');
    }
}
