<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Userprofile;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Carbon\Carbon;
//use AuthenticatesAndRegistersUsers, ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\UserEditFormRequest;
use Illuminate\Support\Facades\Mail;
use Auth;
//use \Hash;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
   // protected $redirectTo = '/admin';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

     public function logout()
    {
        
        $upd_logout =User::where('id', Auth::user()->id)
                                ->update(['log_out_time' => Carbon::now(),'login_status' => 0]);
     Auth::logout();
                    $message ='You have now been logged out.';
                    
               return redirect('/login')->with('status', $message);
         //  return redirect()->route('logout')->with('status', $message);
    }
    
    

    
   

    public function register(UserEditFormRequest $request)
    {
       //Run validator checks....
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }


        $activation_code = str_random(30);
        $newUser = new User;
        $newUser->name = $request->name;
      //  $newUser->username = $request->username;
        $newUser->email = $request->email;
        $newUser->password = bcrypt($request->password);
        $newUser->activation_code = $activation_code;

        $newUser->save();        
        $user_id =$newUser->id;
         $newUserProfile = new UserProfile;
        $newUserProfile->id = $user_id;
         $newUserProfile->username = $request->name;
          $newUserProfile->save();
        $data = array('activation_code' => $activation_code);

        Mail::send('emails.registered', $data, function ($message) use ($newUser){
            $message->from('qAdmin@admin.com', config('site-c.Appname').' support');
            $message->to($newUser->email, $newUser->name);
                $message->subject('Welcome to our site:'.config('site-c.Appname'));
        });
//          Mail::send('emails.verify', $data, function ($message) use ($newUser){
//            $message->from('qz9@yahoo.com', 'New User email verification');
//            $message->to($newUser->email, $newUser->name);
//                $message->subject('Please verify your email address');
//        });
//        
   return redirect()->route('home')->with('status', 'Your account has been have successfully created.!');
      //  return redirect ('/home')->with('status', 'Your account has been have successfully created.!');
 
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
