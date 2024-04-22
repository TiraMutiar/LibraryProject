@extends('layout.master')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Peminjam</h1>
    <p class="mb-4">
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Form Input Data Peminjam
            </h6>
            <br>
            <a href="/indexuser" class="btn btn-warning pull-right">Kembali</a>
        </div>
        <div class="card-body">
            <form action="/ubahuser/{{$datauser->id}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="form form-group">
                <small>Nama Pengelola</small>
                <input type="text" name="name" value="{{$datauser->name}}" class="form form-control">
                @error('name')
                    <small>{{ $message }}</small><br>
                @enderror
                </div>
                <div class="form form-group">
                    <small>Gambar</small> <br>
                    <input type="file" name="photos">
                    </div>
                <div class="form form-group">
                <small>Email</small>
                <input type="text" name="email" value="{{$datauser->email}}" class="form form-control">
                @error('email')
                    <small>{{ $message }}</small><br>
                @enderror
                </div>
                <div class="form form group">
                    <small>Jenis Kelamin</small> <br>
                <input type="radio" name="jenis_kelamin" id="" value="laki-laki" {{ old('jenis_kelamin')=='laki-laki' ? 'checked' : ''}}> Laki-laki
                <input type="radio" name="jenis_kelamin" id="" value="perempuan" {{ old('jenis_kelamin')=='perempuan' ? 'checked' : ''}}> Perempuan <br>
                @error('jenis_kelamin')
                <small>{{ $message }}</small><br>
                @enderror
                </div>
                <button type="submit" class="btn btn-primary">simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
