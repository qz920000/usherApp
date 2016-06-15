<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        //$this->registerPolicies($gate);
        
         parent::registerPolicies($gate);
       $gate->define('update-post', function ($user, $post) {
            return $user->name === $post->username;
        });
         $gate->define('isAdmin', function ($user) {
            return $user->role_id === 2;
        });
        $gate->define('update_post', function ($user, $post) {
            return $user->id === $post->user_id;
        });
             $gate->define('update-user', function ( $user) {
            return Auth::user()->id === $user->id;
        });
       

        //
    }
}
