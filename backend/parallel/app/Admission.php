<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admissionnumber', 'type', 'date', 'student_id', 'school_id', 'classes_id', 'section_id', 'status', 'notes', 'description'
    ];

    public function student(){
    	return $this->hasOne('App\Student');
    }
}
