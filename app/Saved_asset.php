<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saved_asset extends Model
{
 protected $guarded = ['id'];

public function user()
{
return $this->belongsToMany('App\User');
}
//
//public function school()
//{
//return $this->belongsToMany('App\School');
//}
}
