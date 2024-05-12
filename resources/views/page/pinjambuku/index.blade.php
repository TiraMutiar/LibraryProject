@extends('layout.master')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pinjam Buku</h1>
    <p class="mb-4">
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Table Pinjaman
            </h6>
            <br>
            @if (auth()->user()->role == "pengelola")
            <a href="/tambahbuku" class="btn btn-primary pull-right">Tambah Peminjam</a>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Jumlah Pinjam</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Jumlah Pinjam</th>
                            <th>Option</th>
                        </tr>
                    </tfoot>
                <tbody>
                    @foreach ( $datapinjam as $item )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->tgl_pinjam}}</td>
                        <td>{{$item->tgl_kembali}}</td>
                        <td>{{$item->jumlah_buku}}</td>
                        <td>-</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
