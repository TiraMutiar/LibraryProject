@extends('layout.master')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Penerbit</h1>
    <p class="mb-4">
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Form Input Data Penerbit
            </h6>
            <br>
            <a href="/indexpenerbit" class="btn btn-warning pull-right"><span class="fa fa-undo"></span> Kembali</a>
        </div>
        <div class="card-body">
            <form action="/penerbit" method="POST">
                @csrf
                <div class="form form group">
                    <small>Nama Penerbit</small>
                    <input type="text" name="nama_penerbit" id="" class="form form-control">
                @error('nama_kategori')
                    <small>{{ $message }}</small>
                @enderror
                </div>
                <div class="form form-group">
                    <small>Keterangan</small>
                <input type="text" name="keterangan" id="" class="form form-control">
                @error('keterangan')
                    <small>{{ $message }}</small>
                @enderror
                </div>
                <button type="sumbit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
