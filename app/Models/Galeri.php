<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    public function users()
   	{
        return $this->belongsTo('App\User', 'id_user');
   	}
}
