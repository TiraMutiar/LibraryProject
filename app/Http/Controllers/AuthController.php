<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request) {
        return view('login');
    }

    public function indexx(Request $request) {
        return view('login2');
    }

    public function register(Request $request) {
        return view('register');
    }

    public function logout(Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }

    public function registered(Request $request) {
        $request->validate([
            'name'          =>'required',
            'email'         =>'required',
            'password'      =>'required',
            'jenis_kelamin' =>'required'
        ]);

        $dataStore = [
            'name'          => $request->name,
            'email'         => $request->email,
            'role'          => 'peminjam',
            'jenis_kelamin' => $request->jenis_kelamin,
            'pictures'      => 'Default.jpg',
            'password'      => Hash::make($request->password)
        ];
        User::create($dataStore);
        echo "data berhasil disimpan";
    }

    public function ceklogin(Request $request) {
        if(Auth::attempt(['email' => $request ->email, 'password' => $request->password])) {
            return redirect('/dashboard');
        } else {
            echo "login tidak berhasil";
        }
    }

}
