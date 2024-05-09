<?php

namespace App\Models;

use App\Models\User;
use App\Models\Detailtransaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'tgl_pinjam',
        'tanggal_kembali'

    ];
    protected $table = 'transaksi';

    public function detailtransaksi() {
        return $this->hasMany(Detailtransaksi::class, 'transaksi_id', 'id');

    }

    public function user() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
