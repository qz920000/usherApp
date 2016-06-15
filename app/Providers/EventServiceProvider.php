<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
//         'auth.login' => [
//        'App\Handlers\Events\AuthLoginEventHandler',
//    ],
//        'Illuminate\Auth\Events\Login' => [
//            'App\Listeners\YourClass'
//    ],
//        'Illuminate\Auth\Events\Attempting' => [
//        'App\Listeners\LogAuthenticationAttempt',
//    ],
//
//    'Illuminate\Auth\Events\Login' => [
//        'App\Listeners\LogSuccessfulLogin',
//    ],
        'Illuminate\Auth\Events\Login' => [
        'App\Listeners\onUserLogin',
    ],
        'Illuminate\Auth\Events\Logout' => [
        'App\Listeners\onUserLogout',
    ],
//
//    'Illuminate\Auth\Events\Logout' => [
//        'App\Listeners\LogSuccessfulLogout',
//    ],
//
//    'Illuminate\Auth\Events\Lockout' => [
//        'App\Listeners\LogLockout',
//    ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);
        $events->listen('auth.login', function ($user, $remember) {
        $user->update(['log_in_time' => \Carbon\Carbon::now(), 'website' => \Request::ip(),'login_status'=>1]);
    });

        //
    }
}
