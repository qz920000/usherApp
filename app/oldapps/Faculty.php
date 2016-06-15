<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
     protected $guarded = ['id'];
    //
     public function school()
        {
        return $this->belongsTo('App\School');
        }
        
   public function course()
        {
        return $this->hasMany('App\Course', 'faculty_id');
        }
}
