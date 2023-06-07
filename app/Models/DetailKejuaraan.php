<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class DetailKejuaraan extends Model
{
    public $timestamps = false;
	public function kejuaraan(){
		return $this->belongsTo('App\Kejuaraan', 'id_kejuaraan');
	}
    public function pendaftaran(){
        return $this->hasMany('App\Pendaftaran','id_detailkejuaraan', 'id');
    }
}
