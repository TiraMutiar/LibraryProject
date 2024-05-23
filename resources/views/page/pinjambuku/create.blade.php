@extends('layout.master')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pinjam Buku</h1>
    <p class="mb-4">
    </p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Table Peminjaman
            </h6>
            <br>
            <a href="/pinjambuku" class="btn btn-warning pull-right"><span class="fa fa-undo"></span> Kembali</a>
        </div>
        <div class="card-body">
            <div>
                <form action="" id="form-buatpinjam">
                    @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Tanggal Pinjam</label>
                        <input type="date" name="tanggalpinjam" id="" class="form form-control">
                    </div>
                </div>
                </form>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <button class="btn btn-primary mt-1" onclick="buatPinjaman()">Buat Peminjaman</button>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="" id="" class="form form-control">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success">Cari Buku</button>
                    </div>
                </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="">Nama Buku</label>
                    <input type="text" name="" id="" class="form form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Kategori</label>
                    <input type="text" name="" id="" class="form form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Jumlah Buku</label>
                    <input type="text" name="" id="" class="form form-control">
                </div>
                <div class="col-md-3"> <br>
                    <button class="btn btn-primary">Pilih</button>
                </div>
            </div>
            <div class="row mt-4">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Jumlah Buku</td>
                            <td>Jumlah Pinjaman</td>
                            <td>Option</td>
                        </tr>
                    </thead>
                    <tbody id="databuku">

                    </tbody>
                </table>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('jsfooter')
//penyisipan JS
<script>
    function buatPinjaman() {
        $.ajax({
            url: window.location.origin+'/simpantransaksi',
            type: "POST",
            dataType: "JSON",
            data: $('#form-buatpinjam').serialize(),
            success: function(res){
                console.log(res)
            },
            error: function(res){

            }

        })
    }
</script>
@endpush
