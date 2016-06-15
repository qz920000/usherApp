<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
      protected $guarded = ['id'];
      
//      public function message_map()
//    {
//        return $this->hasOne('App\Message_map', 'messageid');
//    }
         public function message_map()
    {
        return $this->belongsTo('App\Message_map');
    }
}
