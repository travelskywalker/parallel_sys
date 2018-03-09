<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['name', 'title1', 'title2', 'admin', 'email', 'phonenumber', 'mobilenumber','logo', 'address', 'city', 'notes', 'description', 'status'];

    public function classes(){
        return $this->hasMany('App\Classes');
    }

    public function teachers(){
    	return $this->hasMany('App\Teacher');
    }

    public function sections(){
    	return $this->hasMany('App\Section');
    }
}
