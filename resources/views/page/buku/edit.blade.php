@extends('layout.master')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Buku</h1>
    <p class="mb-4">
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Form Input Data Buku
            </h6>
            <br>
            <a href="/indexbuku" class="btn btn-warning pull-right">Kembali</a>
        </div>
        <div class="card-body">
            <form action="/ubahbuku/{{$databuku->id}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="form form-group">
                <small>Judul Buku</small>
                <input type="text" name="judul_buku" value="{{$databuku->judul_buku}}" class="form form-control">
                @error('judul_buku')
                    <small>{{ $message }}</small><br>
                @enderror
                </div>
                <div class="form form-group">
                <small>Penulis</small>
                <input type="text" name="penulis" value="{{$databuku->penulis}}" class="form form-control">
                @error('penulis')
                    <small>{{ $message }}</small><br>
                @enderror
                </div>
                <div class="form form-group">
                <small>Penerbit</small> <br>
                <select name="penerbit_id" id="penerbit_id">
                    <option value="">Silahkan Pilih Penerbit</option>
                    @foreach ($penerbit as $item )
                    <option value="{{$item->id}}">{{$item->nama_penerbit}}</option>
                    @endforeach
                </select> <br>
                @error('penerbit_id')
                    <small>{{ $message }}</small><br>
                @enderror
                </div>
                <div class="form form-group">
                <small>Tahun Terbit</small>
                <input type="text" name="tahun_terbit" id="" value="{{$databuku->tahun_terbit}}" class="form form-control">
                @error('tahun_terbit')
                    <small>{{ $message }}</small><br>
                @enderror
                </div>
                <div class="form form-group">
                <small>Kategori</small> <br>
                <select name="kategori_id" id="kategori_id">
                    <option value="">Silahkan Pilih Kategori</option>
                    @foreach ($kategori as $item )
                    <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                    @endforeach
                </select> <br>
                </div>
                <div class="form form-group">
                <small>Gambar</small> <br>
                <input type="file" name="photos">
                </div>
                <button type="submit" class="btn btn-primary">simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
