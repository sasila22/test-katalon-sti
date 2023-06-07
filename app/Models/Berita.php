<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    public function komentars()
   	{
        return $this->hasMany('App\Komentar');
   	}
   	public function users()
   	{
        return $this->belongsTo('App\User', 'id_user');
   	}
}
