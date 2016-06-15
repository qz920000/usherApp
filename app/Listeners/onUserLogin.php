<?php

namespace App\Listeners;
use Illuminate\Auth\Events\Login;
use Auth;
use Carbon\Carbon;
use App\User;
use Illuminate\Http\Request;
//use Request;
//use App\Http\Requests;
//use App\Listeners\Request;
//use App\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class onUserLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
//    public function __construct()
//    {
//        //
//    }
public function __construct(Request $request)
{
    $this->request = $request;
}
    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        //$this->request->session()->put('test', 'hello world!');
        $upd_login =User::where('id', Auth::user()->id)
                                ->update(['log_in_time' => Carbon::now(),'website' => $this->request->ip(),'login_status' => 1]);     
                    $message ='You are now logged in.';
                     //if (Auth::attempt(['email' => $email, 'password' => $password])) {
    //return redirect()->intended('/home');
    }
}
