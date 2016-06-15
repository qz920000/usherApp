<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
      protected $guarded = ['id'];
    
         public function school()
                {
                return $this->belongsTo('App\School');
                }
       public function courselist()
                {
                return $this->belongsToMany('App\Courselist');
                }

         public function faculty()
                {
                return $this->belongsTo('App\Faculty');
                }
                
        public function jobcategory()
            {
            return $this->belongsToMany('App\Jobcategory','Course_jobcategory');
            }
}
