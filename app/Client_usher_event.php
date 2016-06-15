<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_usher_event extends Model
{
    protected $guarded = ['id'];

public function user()
{
return $this->belongsToMany('App\User');
}
}
