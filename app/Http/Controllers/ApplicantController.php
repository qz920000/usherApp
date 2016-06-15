<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Applicant;
Use App\Role;
Use App\State;
use App\Http\Requests\ApplicantFormRequest;
class ApplicantController extends Controller
{
    
    
           public function index()
            {
                $users = Applicant::all();
                $pagetitle= 'All Applicants';
                return view('applicant.index', compact('users'))->with('pagetitle',$pagetitle);
            }
    
    public function create()
                        {
                       $states = State::all();
//                       $schools =School::all();
//                        $categories =Category::all();
//                        $entrylinks =Entry::all();
//                        $postsources =Postsource::all();
                    return view('applicant.create',compact('states'))->with('pagetitle','Apply Form');
                    //return view('admin.faculties.create', array('title' => 'Welcome','description' => '','page' => 'addfaculty'));
                    //return view('checkout', array('title' => 'Welcome','description' => '','page' => 'home'));
                        }
           public function store(ApplicantFormRequest $request)
    {
                    
                            $newUser = new Applicant;
//        $newUser->name = $request->name;
//      //  $newUser->username = $request->username;
//        $newUser->email = $request->email;
//        $newUser->password = bcrypt($request->password);
//        $newUser->activation_code = $activation_code;
// $user->name = $request->get('name');
                        $newUser->firstname = $request->get('firstname');
                        $newUser->lastname = $request->get('lastname');
                        $newUser->email = $request->get('email');
                        $newUser->phone = $request->get('phone');
                        $newUser->address = $request->get('address');
                        $newUser->city = $request->get('city');
                        $newUser->state = $request->get('state');
                        $newUser->save();

//        $data = array('activation_code' => $activation_code);
//
//        Mail::send('emails.registered', $data, function ($message) use ($newUser){
//            $message->from('qAdmin@admin.com', config('site-c.Appname').' support');
//            $message->to($newUser->email, $newUser->name);
//                $message->subject('Welcome to our site:'.config('site-c.Appname'));
 //       });
        return redirect('/')->with('status', 'Your application has been sent!');
                      
       //return redirect()->back()->with('status', 'Your application has been sent!');
}
}
