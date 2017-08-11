<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $fillable = ['name'];

    public function pakets()
    {
    	return $this->hasMany('App\Paket');
    }
}
