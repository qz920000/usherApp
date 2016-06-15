<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postsource extends Model
{
        protected $guarded = ['id'];
public function posts()
{
return $this->hasMany('App\Post','post_id');
}
}
