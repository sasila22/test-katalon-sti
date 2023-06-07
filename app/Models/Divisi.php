<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    public function detailAnggota(){
    	return $this->hasMany('App\Models\DetailAnggota', 'id_divisi');
    }
}
