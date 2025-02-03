<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PembelianDetail;
use App\Models\User;

class Pembelian extends Model
{
    protected $table = 'pembelian';

    protected $fillable = [
        'user_id',
        'nomer_order',
        'tanggal_order',
        'total_harga',
        'metode_pembayaran',
        'bukti_transfer',
        'status',
        'first_name',
        'last_name',
        'email',
        'phone',
        'note',
        'username',
        'facebook',
        'link'
    ];

    // Relationship with PembelianDetail
    public function details()
    {
        return $this->hasMany(PembelianDetail::class, 'pembelian_id', 'id');
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
