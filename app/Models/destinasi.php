<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class destinasi extends Model
{
    use HasFactory;

    protected $table = 'destinasi';
    protected $primaryKey = 'id_destinasi';

    protected $fillable = [
        'nama_des',
        'alamat',
        'status_des',
        'deskripsi',
        'id_kategori',
        'id',
    ];

    public function kategori()
    {
        return $this->belongsTo('App\\Models\\kategori', 'id_kategori');
    }
    public function User()
    {
        return $this->belongsTo('App\\Models\\User', 'id');
    }

    public function gambar_des()
    {
        return $this->hasMany('App\\Models\\gambar_des', 'gambar_des', 'id_gambar_des');
    }

    public function feedback()
    {
        return $this->hasMany('App\\Models\\feedback', 'feedback', 'id_feedback');
    }

    public function detail_transaksi()
    {
        return $this->hasMany('App\\Models\\detail_transaksi', 'detail_transaksi', 'id_detailtransaksi');
    }

    public function tiket()
    {
        return $this->hasMany('App\\Models\\tiket', 'tiket', 'id_tiket');
    }
}
