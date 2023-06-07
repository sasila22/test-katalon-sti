<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    
    protected $table="anggota";
    public function detailAnggota(){
    	return $this->hasMany('App\Models\DetailAnggota', 'id_anggota');
        
    }

}
