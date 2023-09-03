<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id_detailtransaksi';

    protected $fillable = [
        'jumlah_tiket',
        'id_destinasi',
        'id_transaksi',
        'id_tiket',
    ];

    public function destinasi()
    {
        return $this->belongsTo('App\\Models\\destinasi', 'id_destinasi');
    }

    public function transaksi()
    {
        return $this->belongsTo('App\\Models\\transaksi', 'id_transaksi');
    }

    public function tiket()
    {
        return $this->belongsTo('App\\Models\\tiket', 'id_tiket');
    }
}
