<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courselist extends Model
{
    public function jobcategory()
            {
            return $this->belongsToMany('App\Jobcategory','Courselist_jobcategory');
            }
            
            
     public function course()
        {
        return $this->hasMany('App\Course', 'courselist_id');
        }
}
