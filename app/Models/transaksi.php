<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'tgl_transaksi',
        'total_bayar',
        'status',
        'metode_bayar',
        'id',
    ];

    public function detail_transaksi()
    {
        return $this->hasMany('App\\Models\\detail_transaksi', 'detail_transaksi', 'id_detailtransaksi');
    }
    public function User()
    {
        return $this->belongsTo('App\\Models\\User', 'id');
    }
}
