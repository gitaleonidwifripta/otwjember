<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiket extends Model
{
    use HasFactory;

    protected $table = 'tiket';
    protected $primaryKey = 'id_tiket';

    protected $fillable = [
        'id_destinasi',
        'jenis_hari',
        'jenis_tiket',
        'harga_tiket',
        'jam_buka',
        'jam_tutup',
    ];

    public function detail_transaksi()
    {
        return $this->hasMany('App\\Models\\detail_transaksi', 'detail_transaksi', 'id_detailtransaksi');
    }

    public function destinasi()
    {
        return $this->belongsTo('App\\Models\\destinasi', 'id_destinasi');
    }
}
