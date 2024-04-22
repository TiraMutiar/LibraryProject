<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/buku" method="POST" enctype="multipart/form-data">
        @csrf
        <small>Judul Buku</small> <br>
        <input type="text" name="judul_buku" value="{{ old('judul_buku')}}"> <br>
        @error('judul_buku')
            <small>{{ $message }}</small><br>
        @enderror
        <small>Penulis</small> <br>
        <input type="text" name="penulis" value="{{ old('penulis')}}"> <br>
        @error('penulis')
            <small>{{ $message }}</small><br>
        @enderror
        <small>Penerbit</small> <br>
        <select name="penerbit_id" id="penerbit_id">
            <option value="">Silahkan Pilih Penerbit</option>
            @foreach ($datapenerbit as $item )
            <option value="{{$item->id}}">{{$item->nama_penerbit}}</option>
            @endforeach
        </select> <br>
        @error('penerbit_id')
            <small>{{ $message }}</small><br>
        @enderror
        <small>Tahun Terbit</small> <br>
        <input type="text" name="tahun_terbit" id="" value="{{ old('penulis')}}"> <br>
        @error('tahun_terbit')
            <small>{{ $message }}</small><br>
        @enderror
        <small>Kategori</small> <br>
        <select name="kategori_id" id="kategori_id">
            <option value="">Silahkan Pilih Kategori</option>
            @foreach ($kategori as $item )
            <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
            @endforeach
        </select> <br>
        <input type="file" name="photos">
        <button type="submit">simpan</button>
    </form>
    <br>
</body>
</html>
