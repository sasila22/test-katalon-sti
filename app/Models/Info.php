<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    public function users()
   	{
        return $this->belongsTo('App\User', 'id_user');
   	}
}
