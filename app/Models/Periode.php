<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Periode extends Model
{
   public function ubahTahun($a)
    {
    	return Carbon::parse($a)->format('Y');
    }
    public function gabsis()
    {
    	return $this->belongsTo('App\Gabsi', 'id_gabsi');
    }
    public function jabatans()
    {
    	return $this->hasMany('App\Jabatans');
    }
    public function detailAnggota(){
    	return $this->hasMany('App\Models\DetailAnggota', 'id_periode');
    }
}
