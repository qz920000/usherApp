<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedClient extends Model
{
     protected $guarded = ['id'];

public function user()
{
return $this->belongsToMany('App\User');
}
}
