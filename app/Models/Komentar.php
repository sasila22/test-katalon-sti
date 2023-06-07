<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    public function beritas()
   	{
        return $this->belongsTo('App\Berita', 'id_berita');
   	}
   	public function users()
   	{
        return $this->belongsTo('App\User', 'id_user');
   	}
}
