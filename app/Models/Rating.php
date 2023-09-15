<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'rating';
    protected $fillable = [
        'rating',
        'user_id',
        'id_transaksi',
        'id_destinasi',
    ];
}
