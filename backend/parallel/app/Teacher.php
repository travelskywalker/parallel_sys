<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function sections(){
    	return $this->hasMany('App\Section');
    }

    public function school(){
    	return $this->hasOne('App\School');
    }
}
