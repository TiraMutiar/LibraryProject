<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request) {
        return view('page.user.tambah');
    }

    public function indexx(Request $request) {
        $data = [
            'datauser'     =>User::where('role', 'pengelola')->get()
        ];
        return view('page.user.index', $data);
    }

    public function edit(Request $request, $id) {
        $data = [
            'datauser'      =>User::where('id', $id)->first(),
            'user'          =>User::all()
        ];
        return view('page.user.edit', $data);
    }

    public function ubah(Request $request, $id) {
        $request->validate([
            'name'          =>'required',
            'email'         =>'required',
            'photos'        =>'required|max:1024',
            'jenis_kelamin' =>'required'
        ]);
        $file_photos        = $request->file('photos');
        $extensi_photos     = $file_photos->extension();
        $nama_photos        = 'buku_'.date('dmyhis').'.'.$extensi_photos;
        $file_photos->move(public_path('/imagebuku'), $nama_photos);
        $dataStore = [
            'name'          =>$request->name,
            'email'         =>$request->email,
            'role'          =>'peminjam',
            'jenis_kelamin' =>$request->jenis_kelamin,
            'pictures'      =>$nama_photos,
            'password'      =>Hash::make($request->password)
        ];
        User::where('id', $id)->update($dataStore);
        return redirect('/indexuser');
    }

    public function data(Request $request) {
        $request->validate([
            'name'          =>'required',
            'email'         =>'required',
            'photos'        =>'required|max:1024',
            'jenis_kelamin' =>'required'
        ]);
        $file_photos        = $request->file('photos');
        $extensi_photos     = $file_photos->extension();
        $nama_photos        = 'buku_'.date('dmyhis').'.'.$extensi_photos;
        $file_photos->move(public_path('/imagebuku'), $nama_photos);
        $dataStore = [
            'name'          =>$request->name,
            'email'         =>$request->email,
            'role'          =>'pengelola',
            'jenis_kelamin' =>$request->jenis_kelamin,
            'pictures'      =>$nama_photos,
            'password'      =>Hash::make($request->password)
        ];
        User::create($dataStore);
        return redirect('/indexuser');
    }
    public function hapus(Request $request, $id) {
        User::where('id', $id )->delete();
        return redirect('/indexuser');
    }
}
