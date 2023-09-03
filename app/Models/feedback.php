<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';
    protected $primaryKey = 'id_feedback';

    protected $fillable = [
        'id_destinasi',
        'id',
        'detail_feedback',
        'rating',
    ];

    public function destinasi()
    {
        return $this->belongsTo('App\\Models\\destinasi', 'id_destinasi');
    }
}
