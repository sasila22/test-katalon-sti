<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

     protected $fillable = [
        'name', 'email', 'password', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function beritas()
    {
        return $this->hasMany('App\Berita');
    }
    public function komentars()
    {
        return $this->hasMany('App\Komentar');
    }
    public function infos()
    {
        return $this->hasMany('App\Info');
    }
    public function kejuaraans()
    {
        return $this->hasMany('App\Kejuaraan');
    }
    public function gabsis()
    {
        return $this->belongsTo('App\Gabsi', 'id_gabsi');
    }
    public function clubs()
    {
        return $this->hasMany('App\Club');
    }
    public function pemains()
    {
        return $this->hasMany('App\Pemain');
    }
}

