<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    public function school(){
        return $this->hasOne('App\School');
    }

    public function sections(){
    	return $this->hasMany('App\Section');
    }
}
