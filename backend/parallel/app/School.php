<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    //

    public function classes(){
        return $this->hasMany('App\Classes');
    }

    public function teachers(){
    	return $this->hasMany('App\Teacher');
    }
}
