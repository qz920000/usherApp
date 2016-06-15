<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = ['id'];
    
          public function jobcategory()
            {
            return $this->belongsToMany('App\Jobcategory','Company_jobcategory');
            }
}
