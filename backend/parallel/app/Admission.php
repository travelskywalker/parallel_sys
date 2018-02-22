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
        'admissionnumber', 'studentid', 'schoolid', 'sectionid', 'status', 'notes', 'description'
    ];
}
