<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class DetailAnggota extends Model
{
    public $timestamps = false;
	public function kabupaten(){
		return $this->belongsTo('App\Models\Kabupaten', 'id_kabupaten', 'id');
	}
    public function anggota(){
		return $this->belongsTo('App\Models\Anggota', 'id_anggota', 'id');
	}
    public function divisi(){
		return $this->belongsTo('App\Models\Divisi', 'id_divisi', 'id');
	}
    public function periode(){
		return $this->belongsTo('App\Models\Periode', 'id_periode', 'id');
	}
}
