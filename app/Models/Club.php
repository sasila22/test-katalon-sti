<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    public function gabsis()
    {
    	return $this->belongsTo('App\Gabsi', 'id_gabsi');
    }

    public function pemains()
    {
    	return $this->hasMany('App\Pemain');
    }

    public function users()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
