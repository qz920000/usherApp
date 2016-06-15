<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flagged_user extends Model
{
        protected $guarded = ['id'];

public function user()
{
return $this->belongsToMany('App\User');
}
}
