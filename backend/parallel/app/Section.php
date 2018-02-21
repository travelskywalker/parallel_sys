<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function classes(){
    	return $this->hasOne('App\Classes');
    }

    public function teacher(){
    	return $this->hasOne('App\Teacher');
    }
}
