<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
      protected $guarded = ['id'];
    public function categories()
    {
    return $this->belongsToMany('App\Category');
    }
    
    public function postsources()
    {
    return $this->belongsToMany('App\Postsource');
    }
    
    public function entries()
    {
    return $this->belongsToMany('App\Entry');
    }

public function user()
{
return $this->belongsTo('App\User');
}

//public function comments()
//{
//return $this->morphMany('App\Comment', 'post');
//}

public function comments()
{
return $this->hasMany('App\Comment', 'post_id');
}
public function images()
{
return $this->hasMany('App\Image', 'post_id');
}
}
