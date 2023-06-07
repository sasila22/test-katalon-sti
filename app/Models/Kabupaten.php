<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    public function users()
   	{
        return $this->belongsTo('App\User', 'id_user');
   	}
     public function detailAnggota(){
          return $this->hasMany('App\Models\DetailAnggota', 'id_kabupaten');
     }
}
