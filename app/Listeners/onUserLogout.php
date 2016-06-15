<?php

namespace App\Listeners;
use Illuminate\Auth\Events\Logout;
use Auth;
use Carbon\Carbon;
use App\User;
//use App\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class onUserLogout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
//        $upd_logout =User::where('id', Auth::user()->id)
//                                ->update(['log_out_time' => Carbon::now(),'login_status' => 0]);
         $message ='You are now logged out.';
        //return redirect('/login')->with('status', $message);
        //
    }
}
