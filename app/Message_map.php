<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message_map extends Model
{
      protected $guarded = ['id'];
      
//      public function message()
//    {
//        return $this->belongsTo('App\Message');
//    }
    
          public function message()
    {
        return $this->hasOne('App\Message', 'msg_map_id');
    }
    
    public function user()
{
return $this->belongsTo('App\User');
}

}
