<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
	protected $fillable = ['name', 'school_id', 'teacher_id', 'notes', 'description', 'status'];

    public function school(){
        return $this->hasOne('App\School');
    }

    public function sections(){
    	return $this->hasMany('App\Section');
    }

    public function teacher(){
    	return $this->hasOne('App\Teacher');
    }
}
