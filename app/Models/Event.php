<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Galeri;

class Event extends Model
{
    public function users()
   	{
        return $this->belongsTo('App\User', 'id_user');
   	}

     public static function ambilGambarByEventId($id)
     {
          $galeris=Galeri::where('id_event',$id)->get();
          return $galeris;
     }
}
