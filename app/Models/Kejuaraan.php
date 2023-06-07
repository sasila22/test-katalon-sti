<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kejuaraan extends Model
{
    public function users()
   	{
        return $this->belongsTo('App\User', 'id_user');
   	}
   	public function detailkejuaraan(){
   		return $this->hasMany('App\DetailKejuaraan', 'id_kejuaraan');
   	}
}
