<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul_buku',
        'penulis',
        'penerbit_id',
        'tahun_terbit',
        'kategori_id',
        'status',
        'pictures'
    ];
    protected $table = 'bukus';

    //relasi ketable kategori
    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
    public function penerbit() {
        return $this->belongsTo(Penerbit::class, 'penerbit_id', 'id');
    }
}
