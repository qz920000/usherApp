<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $guarded = ['id'];
    
    public function faculty()
        {
        return $this->hasMany('App\Faculty', 'school_id');
        }
        
   public function course()
        {
        return $this->hasMany('App\Course', 'school_id');
        }
        
    public function user()
        {
        return $this->belongsToMany('App\User','saved_assets');
        }
        
//    public function saved_assets()
//            {
//            return $this->hasMany('App\Saved_asset', 'school_id');
//            }
        
    
}
