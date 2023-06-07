<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    public $timestamps = false;

    public function detailKejuaraan()
    {
    	return $this->belongsTo('App\DetailKejuaraan', 'id_detailkejuaraan');
    }
    public function peserta(){
    	return $this->hasMany('App\Peserta', 'id_pendaftaran', 'id');
    }
}
