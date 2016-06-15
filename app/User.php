<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    
      public function posts()
            {
            return $this->hasMany('App\Post', 'user_id');
            }
            
        public function message_maps()
            {
            return $this->hasMany('App\Message_map', 'userid');
            }


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function role()
	{
		return $this->hasOne('App\Role', 'id', 'role_id');
	}
	public function hasRole($roles)
	{
		$this->have_role = $this->getUserRole();
		// Check if the user is a root account
		if($this->have_role->name == 'Root') {
			return true;
		}
		if(is_array($roles)){
			foreach($roles as $need_role){
				if($this->checkIfUserHasRole($need_role)) {
					return true;
				}
			}
		} else{
			return $this->checkIfUserHasRole($roles);
		}
		return false;
	}
        
	private function getUserRole()
	{
		return $this->role()->getResults();
	}
        
	private function checkIfUserHasRole($need_role)
	{
		return (strtolower($need_role)==strtolower($this->have_role->name)) ? true : false;
	}
        
        public function school()
            {
            return $this->belongsToMany('App\School','saved_assets');
            }
            
//         public function saved_assets()
//            {
//            return $this->hasMany('App\Saved_asset','user_id');
//            }
         public function saved_users()
            {
            return $this->hasMany('App\Saved_user','userid');
            }
      public function viewed_users()
            {
            return $this->hasMany('App\Flagged_user','userid');
            }
      public function friends()
            {
            return $this->hasMany('App\Friends','userid');
            }
       public function user_image()
            {
            return $this->hasMany('App\user_image','userid');
            }
}
