<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemain extends Model
{
    public function clubs()
    {
    	return $this->belongsTo('App\Club', 'id_clubs');
    }
    public function peserta(){
    	return $this->hasMany('App\Peserta', 'id_pemain', 'id');
    }
}
