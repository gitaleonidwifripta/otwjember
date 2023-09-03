<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_user extends Model
{
    use HasFactory;

    protected $table = 'detail_user';
    protected $primaryKey = 'id_detailuser';

    protected $fillable = [
        'foto_profil',
        'alamat_user',
        'jenis_klm',
        'id',
    ];

    public function User()
    {
        return $this->belongsTo('App\\Models\\User', 'id');
    }
}
