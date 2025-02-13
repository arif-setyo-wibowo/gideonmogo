<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kupon extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kupon';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode',
        'tipe',
        'nilai',
        'minimal_belanja',
        'tanggal_mulai',
        'tanggal_berakhir',
        'jumlah_kupon',
        'jumlah_terpakai',
        'status',
        'deskripsi'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_berakhir' => 'date',
        'nilai' => 'float',
        'minimal_belanja' => 'float'
    ];
}
