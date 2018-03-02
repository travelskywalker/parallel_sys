<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
	protected $fillable = ['teachernumber', 'school_id', 'licensenumber', 'firstname', 'middlename', 'lastname', 'image', 'notes', 'description', 'status'];

    public function section(){
    	return $this->hasMany('App\Section');
    }

    public function school(){
    	return $this->hasOne('App\School');
    }

    public function classes(){
    	return $this->hasOne('App\Classes');
    }

    public function teachers(){
    	return $this->hasMany('App\Teacher');
    }
}


