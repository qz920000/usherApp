<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobcategory extends Model
{
    protected $guarded = ['id'];
          public function course()
            {
            return $this->belongsToMany('App\Course','Course_jobcategory');
            }
            
          public function courselist()
            {
            return $this->belongsToMany('App\Courselist','Courselist_jobcategory');
            }
            
          public function jobcategory()
            {
            return $this->belongsToMany('App\Company','Company_jobcategory');
            }
            
            
}
