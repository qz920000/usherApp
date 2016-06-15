<?php

namespace App\Http\Controllers\usher;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Usher;
use App\SavedEvent;
use App\Event;
use App\SavedUsher;
use App\Viewed_user;
use App\Friend;
use App\Flagged_user;
use DB;
use Carbon\Carbon;
use App\User_image;

//use App\Role;
//
//use App\Http\Requests\UserEditFormRequest;
//use Illuminate\Support\Facades\Hash;
//use Validator;
//use App\Comment;
use App\Role;
use App\Post;
use Gate;
use App\Http\Requests\UserProfileFormRequest;
//use Illuminate\Support\Facades\Hash;
Use Auth;
class UshersController extends Controller
{
    
      public function edit()
            {
         
                 $user = User::whereId(Auth::user()->id)->firstOrFail();
                  $userprofile = Usher::whereUserId(Auth::user()->id)->firstOrFail();
              
                    $roles = Role::all();
            //        $selectedRoles = $user->roles->lists('id')->toArray();
                    return view('ushers.editprofile', compact('user', 'roles','userprofile'))->with('pagetitle','Edit Usher Profile');
                   // return view('users.edit', compact('user', 'roles', 'selectedRoles'));
            }
            
              public function update( UserProfileFormRequest $request)
                {

                        $user = Userprofile::whereUser_id(Auth::user()->id)->firstOrFail();
//                  if (Auth::user()->id != $id){
//                        abort(505, 'Unauthorized action.');
//                    }
//                     $user->user_id  = $request->get('user_id');
//                             $user->username  = $request->get('username');
                             $user->gender  = $request->get('gender');
                             $user->dob  = $request->get('dob');
                             $user->ethnicity  = $request->get('ethnicity');
                             $user->zip  = $request->get('zip');
                             $user->city  = $request->get('city');
                             $user->state  = $request->get('state');
                             $user->country  = $request->get('country');
//                             $user->originstate  = $request->get('originstate');
//                             $user->nationality  = $request->get('nationality');
                             $user->bodytype  = $request->get('bodytype');
                             $user->attractiveness  = $request->get('attractiveness');
                             $user->height  = $request->get('height');
                             $user->haircolor  = $request->get('haircolor');
                             $user->eyecolor  = $request->get('eyecolor');
                             $user->sexuality  = $request->get('sexuality');
                             $user->relationshipseeking  = $request->get('relationshipseeking');
                             $user->personality  = $request->get('personality');
                             $user->seeking_gender  = $request->get('seeking_gender');
                             $user->looking_for  = $request->get('looking_for');
                             $user->intent  = $request->get('intent');
//                             $user->longestrelationship  = $request->get('longestrelationship');
                             $user->maritalstatus  = $request->get('maritalstatus');
                             $user->smoke  = $request->get('smoke');
                             $user->drink  = $request->get('drink');
                             $user->datesmoker  = $request->get('datesmoker');
//                             $user->drugs  = $request->get('drugs');
//                             $user->cooking  = $request->get('cooking');
//                             $user->nigerianlanguage  = $request->get('nigerianlanguage');
                             $user->religion  = $request->get('religion');
                             $user->profession  = $request->get('profession');
                             $user->incomelevel  = $request->get('incomelevel');
                             $user->education  = $request->get('education');
                             $user->second_language  = $request->get('second_language');
//                             $user->ambitious  = $request->get('ambitious');
                             $user->school  = $request->get('school');
                             $user->have_kids  = $request->get('have_kids');
                             $user->want_kids  = $request->get('want_kids');
                             $user->date_person_with_kids  = $request->get('date_person_with_kids');
                             $user->have_pets  = $request->get('have_pets');
                             $user->owncar  = $request->get('owncar');
//                             $user->datebbw  = $request->get('datebbw');
//                             $user->birth_order  = $request->get('birth_order');
//                             $user->main_image  = $request->get('main_image');
//                             $user->main_image_id  = $request->get('main_image_id');
//                             $user->slug  = $request->get('slug');
                             $user->title  = $request->get('title');
                             $user->aboutme  = $request->get('aboutme');
                             $user->turnons  = $request->get('turnons');
                             $user->turnoffs  = $request->get('turnoffs');
                             $user->aboutmymatch  = $request->get('aboutmymatch');
                             $user->headline  = $request->get('headline');
                             $user->description  = $request->get('description');
                             $user->interests  = $request->get('interests');
//                        // $password = $request->get('password');
//                        if($password != "") {
//                        $user->password = Hash::make($password);
//                        }
                        $user->save();
                      //  $user->saveRoles($request->get('role'));
                      //  return redirect(action('users\UsersController@edit', $user->id))->with('status', 'The user has been updated!');
                         return redirect()->back()->with('status', ' Your profile has been updated!');
                }
                
                public function index()
                        {
                    
                            $rs =User::leftjoin('ushers', function ($join) {
                                    $join->on('users.id', '=', 'ushers.user_id');}) 
                                            ->select('users.*', 'ushers.*', 'ushers.username as o_name')
                                            ->orderBy('users.log_in_time','desc')
                                    ->paginate(4);     
//                            $rs = Userprofile::select('userprofiles.*',  'userprofiles.username as o_name')
//                                    ->paginate(4);-//>get();
                            $pagetitle= 'All Ushers';
                             $columnname = 'saved_username';
                           //  echo 'ip adf is ' .$_SERVER['REMOTE_ADDR'].'-----;
                            return view('ushers.showuser_small', compact('rs','user'))->with('pagetitle',$pagetitle);
                            //return view('users.index', compact('users'))->with('pagetitle',$pagetitle);
                        }
    
               public function show($name)
                    {
                        //$user = User::whereId($id)->firstOrFail();
                    //if (Gate::denies('update-user', $user)) {

                        $user = User::whereName($name)->firstOrFail();
                        $userprofile = Usher::whereUsername($name)->firstOrFail();
                        $images='';
                       // $images = User_image::whereUser_id($user->id)->get();
                            
//                           $posts = Post::where ('username',$name)
//                                ->orderBy('created_at', 'desc')//->simplepaginate(3);
//                                 ->paginate(20);
//                       
                       if (Auth::check()){
                        $sa =SavedUsher::where ('username',Auth::user()->name)->where('saved_username',$name)->get();
                       // $sa_event =SavedEvent::where ('username',Auth::user()->name)->where('event_name',$name)->get();
                        $myevents =Event::where ('user_id',Auth::user()->id)->get();
//                         $myevents =Event::All();
                                            //    $sa_event ='';

                        return view('ushers.shownn', compact('user', 'sa','myevents','userprofile','images'));
                       }
                       else{
                           $images='';
                            $sa ='';
                        $sa_event ='';
                            return view('ushers.shownn', compact('user','userprofile','images'));
                       }
                     //   return view('backend.users.show', compact('user', 'posts', 'selectedRoles','comments'));

                    }
}
