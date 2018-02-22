<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'studentnumber', 'firstname', 'middlename', 'lastname', 'gender', 'address', 'fathersname', 'mothersname', 'guardianname', 'emergencycontactnumber', 'nationality', 'religion', 'image', 'notes', 'description', 'status'
    ];


    public function section(){
    	return $this->hasMany('section');
    }
}
