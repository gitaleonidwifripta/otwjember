<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'nohp',
        'password',
        'role',
        'status',
        'status_login',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function detail_user()
    {
        return $this->hasOne(detail_user::class,'id');
    }

    public function transaksi()
    {
        return $this->hasMany('App\\Models\\transaksi', 'transaksi', 'id_transaksi');
    }

    public function destinasi()
    {
        return $this->hasMany('App\\Models\\destinasi', 'destinasi', 'id_destinasi');
    }
}
