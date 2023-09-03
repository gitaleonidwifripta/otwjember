<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gambar_destinasi extends Model
{
    use HasFactory;

    protected $table = 'gambar_destinasi';
    protected $primaryKey = 'id_gambar_des';

    protected $fillable = [
        'id_destinasi',
        'gambar',
    ];

    public function destinasi()
    {
        return $this->belongsTo('App\\Models\\destinasi', 'id_destinasi');
    }
}
