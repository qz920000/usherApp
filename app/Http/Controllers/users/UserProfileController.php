<?php //

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\User;
use App\Userprofile;
use App\Saved_asset;
use App\Saved_user;
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

class UserProfileController extends Controller
{
     public function saveAsset($name, Request $request)              
            {
                     //   $uid = user->get('name)')
                         $uid = User::where('name', $name)->value('id');
                       // $saved_asset = Saved_asset::all();
                    $saved_asset= new Saved_asset(array(
                         'user_id'	 => Auth::user()->id,
                        'posts_id' => $uid,

         
                        //     'user_id' => $request->get('user_id'),
                       // 'slug' => $slug,
                        ));
                        // $school->save();
                //        if (Gate::denies('update-post', $post)) {
                //            abort(403);
                //        }
        

            
            $saved_asset->save();
            //$post->categories()->sync($request->get('categories'));
            return redirect()->back()->with('status', 'The User has been saved!');

}



//public function saveUser($name, $tablename, Request $request)              
//            {
//    
//                     //   $uid = user->get('name)')
//                         $uid = User::where('name', $name)->value('id');
//                        $columnname='saved_username';
//                         if ($table_name == 'friends'){
//                           $columnname='friend_username';  
//                         }
//                         else if ($table_name == 'viewed_user'){
//                           $columnname='viewed_username';  
//                         }
//                         else {
//                             $columnname='saved_username';
//                         }
//                              
//                       // $saved_asset = Saved_asset::all();
//                    $save_user= new $tablename(array(
//                         'username'	 => Auth::user()->name,
//                        $columnname => $name,
//                        ));
//                        // $school->save();
//                //        if (Gate::denies('update-post', $post)) {
//                //            abort(403);
//                //        }
//                    
//            $save_user->save();
//            //$post->categories()->sync($request->get('categories'));
//            return redirect()->back()->with('status', $name.' has been saved!');
//
//}
//    public function deleteSavedUser($name)
//    {
//         //$uid = saved_user::where('name', $name)->value('id');
//          $uid =saved_user::where ('username',Auth::user()->name)->where('saved_username',$name)->value('id');
//           //  $images = Image::all();
//      //  return view('images/showlists', compact('images'));
//        $saved_user =Saved_user::destroy($uid);
//        return redirect()->back()->with('status',$name.' removed from your saved users list!');
//    }

        public function edit()
            {
         
                 $user = User::whereId(Auth::user()->id)->firstOrFail();
                  $userprofile = Userprofile::whereUserId(Auth::user()->id)->firstOrFail();
                //if (Gate::denies('update-user', $user)) {
            //     if (Auth::user()->id != $id){
            //            abort(505, 'Unauthorized action.');
            //        }
                   // $user = User::whereId($id)->firstOrFail();
                    $roles = Role::all();
            //        $selectedRoles = $user->roles->lists('id')->toArray();
                    return view('users.editprofile', compact('user', 'roles','userprofile'))->with('pagetitle','Edit User Profile');
                   // return view('users.edit', compact('user', 'roles', 'selectedRoles'));
            }
    
        
                /**
                 * Update the specified resource in storage.
                 *
                 * @param  \Illuminate\Http\Request  $request
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
 
            public function update( UserProfileFormRequest $request)
                {
                   //Run validator checks....
//                if ($request->get('name')!= Auth::user()->name ){
//                    $validator = $this->validator($request->all());
//                
//                    if ($validator->fails()) {
//                        $this->throwValidationException(
//                            $request, $validator
//                        );
//                    }
//                }
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

        public function saveUser($name, Request $request)              
            {
                     //   $uid = user->get('name)')
                         $uid = User::where('name', $name)->value('id');
                       // $saved_asset = Saved_asset::all();
                        $saved_user= new Saved_user(array(
                         'username'	 => Auth::user()->name,
                        'saved_username' => $name,
                        'userid'	 => Auth::user()->id,
                        'saved_userid' => $uid,

                        ));
                        // $school->save();
                //        if (Gate::denies('update-post', $post)) {
                //            abort(403);
                //        }      
          
                        $saved_user->save();
                        //$post->categories()->sync($request->get('categories'));
                        return redirect()->back()->with('status', $name.' has been saved!');
            }


            public function deleteSavedUser($name)
                {
                     //$uid = saved_user::where('name', $name)->value('id');
                      $uid =saved_user::where ('username',Auth::user()->name)->where('saved_username',$name)->value('id');
                       //  $images = Image::all();
                  //  return view('images/showlists', compact('images'));
                    $saved_user =Saved_user::destroy($uid);
                    return redirect()->back()->with('status',$name.' removed from your saved users list!');
                }
            
            

                public function saveFriend($name, Request $request)              
            {
                     //   $uid = user->get('name)')
                         $uid = User::where('name', $name)->value('id');
                       // $saved_asset = Saved_asset::all();
                    $saved_user= new Friend(array(
                         'username'	 => Auth::user()->name,
                        'friend_username' => $name,
                        'userid'	 => Auth::user()->id,
                        'friend_userid' => $uid,

                        ));
                        // $school->save();
                //        if (Gate::denies('update-post', $post)) {
                //            abort(403);
                //        }
                   
            $saved_user->save();
            //$post->categories()->sync($request->get('categories'));
            return redirect()->back()->with('status', $name.' has been saved!');

            }


                public function deleteSavedFriend($name)
                {
                     //$uid = saved_user::where('name', $name)->value('id');
                      $uid =friend::where ('username',Auth::user()->name)->where('friend_username',$name)->value('id');
                       //  $images = Image::all();
                  //  return view('images/showlists', compact('images'));
                    $saved_user =Friend::destroy($uid);
                    return redirect()->back()->with('status',$name.' removed from your friends list!');
                }

                    public function saveViewedUser($name, Request $request)              
                            {
                                     //   $uid = user->get('name)')
                                         $uid = User::where('name', $name)->value('id');
                                       // $saved_asset = Saved_asset::all();
                                    $saved_user= new Viewed_user(array(
                                         'username'	 => Auth::user()->name,
                                        'viewed_username' => $name,

                                        ));
                                        // $school->save();
                                //        if (Gate::denies('update-post', $post)) {
                                //            abort(403);
                                //        }

                            $saved_user->save();
                            //$post->categories()->sync($request->get('categories'));
                          //  return redirect()->back()->with('status', $name.' has been saved!');

                            }

                 public function showUsers($showtype)
                                            {
                        if ($showtype == 'saved_users'){
                             $pagetitle = 'Saved Users';
                             $tablename = 'Saved_users';
                             $columnname = 'saved_username';
                            $status= 0;
                           //  $rs =Saved_user::where ('username',Auth::user()->name)->select('Saved_users.saved_username as cname')->get();
                              $rs=Userprofile::leftjoin('saved_users', function ($join) {
                                    $join->on('userprofiles.user_id', '=', 'saved_users.saved_userid');                                   
                                }) ->where ('saved_users.username',Auth::user()->name)
                                    ->select('userprofiles.*', 'saved_users.username as m_name', 'saved_users.saved_username as o_name')->paginate(4);
                        }
                        elseif ($showtype == 'friends'){
                             $pagetitle = 'My Friends';
                             $tablename = 'Friends';
                             $columnname = 'friend_username';
                            $status= 0;
                             //$rs =friend::whereUsername (Auth::user()->name)->select('Friends.friend_username as cname')->get();
                              $rs=Userprofile::leftjoin('friends', function ($join) {
                                    $join->on('userprofiles.user_id', '=', 'friends.friend_userid');                                   
                                }) ->where ('friends.username',Auth::user()->name)
                                    ->select('userprofiles.*', 'friends.username as m_name', 'friends.friend_username as o_name')->paginate(4);
                        }
                        else if ($showtype == 'viewed_users'){
                             $pagetitle = 'Viewed Users';
                             $tablename = 'Viewed_users';
                             $columnname = 'viewed_username';
                            $status= 1;
                           //  $rs =viewed_user::where ('username',Auth::user()->name)->select('Viewed_users.viewed_username as cname')->get();
                              $rs=Userprofile::leftjoin('Viewed_users', function ($join) {
                                    $join->on('userprofiles.user_id', '=', 'Viewed_users.viewed_userid');                                   
                                }) ->where ('Viewed_users.username',Auth::user()->name)
                                    ->select('userprofiles.*', 'Viewed_users.username as m_name', 'Viewed_users.viewed_username as o_name')->paginate(4);
                        }
                        else if ($showtype == 'viewed_me'){
                             $pagetitle = 'Users that viewed me';
                             $tablename = 'Viewed_users';
                             $columnname = 'viewed_username';
                            $status= 1;
                            // $rs =viewed_user::where ('viewed_username',Auth::user()->name)->select('Viewed_users.username as cname')->get();
                              $rs=Userprofile::leftjoin('Viewed_users', function ($join) {
                                    $join->on('userprofiles.user_id', '=', 'Viewed_users.viewed_userid');                                   
                                }) ->where ('viewed_users.viewed_username',Auth::user()->name)
                                    ->select('userprofiles.*', 'viewed_users.username', 'Viewed_users.viewed_username as o_name')->paginate(4);
                        }
                        else{
                             $pagetitle = 'All users';
                             $status= 1;
                             //$rs =Saved_user::where ('username',Auth::user()->name)->get();
                              $rs=Userprofile::leftjoin('friends', function ($join) {
                                    $join->on('userprofiles.user_id', '=', 'friends.friend_userid');                                   
                                }) ->where ('friends.username',Auth::user()->name)
                                    ->select('userprofiles.*', 'friends.username', 'friends.friend_username as o_name')->paginate(4);
                        }
                            
                        
                                    //->get();
                     
//                            ->select('posts.*', 'images.post_id', 'images.filePath','images.filename','images.thumb_filename')
//                            ->groupBy('posts.id')
//                            ->orderBy('posts.created_at','desc')->paginate(4);
        //                      $posts = Post::whereStatus(0)
        //                  ->orderBy('created_at', 'desc')//->simplepaginate(3);
        //                     ->paginate(4);
                        
//                          $posts =Post::whereStatus($status) ->where ('username',$tt)
//                                        ->leftjoin('images', function ($join) {
//                                    $join->on('posts.id', '=', 'images.post_id');
//
//                                })
//                            ->select('posts.*', 'images.post_id', 'images.filePath','images.filename','images.thumb_filename')
//                            ->groupBy('posts.id')
//                            ->orderBy('posts.created_at','desc')->paginate(4);
                            return view('users.showuser_small', compact('rs','user'))->with('pagetitle',$pagetitle);
                    }
                    
                    
                    
                public function index()
                        {
                    
//                             $rs = Userprofile::select('userprofiles.*', Carbon::createFromDate('userprofiles.dob')->age)
//                                    ->get();
//                            $rs = Userprofile::select('userprofiles.*', DATEDIFF(Carbon::now(),'userprofiles.dob +1'))
//                                    ->get();
                            $rs =User::leftjoin('userprofiles', function ($join) {
                                    $join->on('users.id', '=', 'userprofiles.user_id');}) 
                                            ->select('users.*', 'userprofiles.*', 'userprofiles.username as o_name')
                                            ->orderBy('users.log_in_time','desc')
                                    ->paginate(4);     
//                            $rs = Userprofile::select('userprofiles.*',  'userprofiles.username as o_name')
//                                    ->paginate(4);-//>get();
                            $pagetitle= 'All Users';
                             $columnname = 'saved_username';
                           //  echo 'ip adf is ' .$_SERVER['REMOTE_ADDR'].'-----;
                            return view('users.showuser_small', compact('rs','user'))->with('pagetitle',$pagetitle);
                            //return view('users.index', compact('users'))->with('pagetitle',$pagetitle);
                        }
    
               public function show($name)
                    {
                        //$user = User::whereId($id)->firstOrFail();
                    //if (Gate::denies('update-user', $user)) {

                        $user = User::whereName($name)->firstOrFail();
                        $userprofile = Userprofile::whereUsername($name)->firstOrFail();
                        $images = User_image::whereUser_id($user->id)->get();
//                        $posts = $user->posts()
//                                ->orderBy('created_at', 'desc')//->simplepaginate(3);
//                             ->paginate(20);
//                             
                           $posts = Post::where ('username',$name)
                                ->orderBy('created_at', 'desc')//->simplepaginate(3);
                                 ->paginate(20);
                        //$comments = $user->comments()->get();
                       // $comments = Comment::where ('username',$name)->orderBy('created_at', 'desc'); //->simplepaginate(3);
                //         ->paginate(config('comsenblog.posts_per_page'));
                        //$selectedRoles = $user->roles->lists('name');
                           // $sa =viewed_user::where ('username',Auth::user()->name)->where('saved_username',$name)->get();
                        $sa =Saved_user::where ('username',Auth::user()->name)->where('saved_username',$name)->get();
                        $sa_friend =Friend::where ('username',Auth::user()->name)->where('friend_username',$name)->get();
                        return view('users.show', compact('user', 'posts','sa','sa_friend','images','userprofile'));
                     //   return view('backend.users.show', compact('user', 'posts', 'selectedRoles','comments'));

                    }
}
