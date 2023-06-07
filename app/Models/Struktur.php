<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Struktur extends Model
{
    public function gabsis()
    {
    	return $this->belongsTo('App\Gabsi', 'id_gabsi');
    }
    public function jabatans()
    {
    	return $this->hasMany('App\Jabatans');
    }
}
