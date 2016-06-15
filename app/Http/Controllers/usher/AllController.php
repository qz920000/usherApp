<?php

namespace App\Http\Controllers\usher;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\User;
use App\Usher;
use App\Event;
use App\Client;
use App\Client_usher_event;
use App\Saved_asset;
//use App\Saved_user;
//use App\Viewed_user;
use App\SavedEvent;
use App\SavedUsher;
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
//$table->Integer('usher_id');
//            $table->Integer('client_id');
//            $table->Integer('event_id');
//            
//                 $table->float('amount_paid');
//            $table->timestamp('date_paid');
//            $table->string('status');//open,in process/paid/completed
class AllController extends Controller
{
        public function hireUsher($name, Request $request)              
            {
            //   $uid = user->get('name)')
                         $uid = User::where('name', $name)->value('id');
            
            $rs =Client_usher_event::where ('client_id',Auth::user()->id)
                    ->where('usher_id',$uid)
                     ->where('event_id',$request->get('event'))->get();
                   $rs_cnt =$rs->count();
                     if ($rs_cnt ==0){
                        //$saved_asset = Saved_asset::all();
                        $hireusher= new Client_usher_event(array(
                         'client_id'	 => Auth::user()->id,
                        'usher_id' => $uid,
                        'event_id'	 => $request->get('event'),
                        'status' => $request->get('save')
                        ));
                         $hireusher->save();
                     }
                     else{
                         $upd_cue =Client_usher_event::where ('client_id',Auth::user()->id)
                    ->where('usher_id',$uid)
                     ->where('event_id',$request->get('event'))
                                ->update(['status' => $request->get('save')]);
                           //$rs->gender  = $request->get('gender');
//                        $rs->client_id= Auth::user()->id;
//                        $rs->usher_id = $uid;
//                        $rs->event_id	 = $request->get('event');
//                        $rs->status = $request->get('save');
//                        $rs->save();
                         
                     }
                    echo $rs_cnt .' bbb';
                        //$post->categories()->sync($request->get('categories'));
                        return redirect()->back()->with('status', $name.' has been notified of the offer by email and text and you will be notified if accepted or not!');
                       // return redirect()->back()->with('status', ' Your profile has been updated!');
            }

              public function showevent($id)
                    {
                        //$client = Client::whereId($id)->firstOrFail();
                    //if (Gate::denies('update-user', $user)) {
                         $pagetitle = 'My events';
                        $event = Event::whereId($id)->firstOrFail();
                        $client = Client::whereUser_id($event->user_id)->firstOrFail();
                       // $userprofile = Usher::whereUsername($name)->firstOrFail();
                        //$rs=Client_usher_event::whereEvent_id($id)->paginate(20);//->get();
                        $rs= Usher::leftjoin('Client_usher_events', function ($join) {
                                    $join->on('ushers.user_id', '=', 'Client_usher_events.usher_id');                                   
                                }) ->where('Event_id',$id)
                                     //   where ('saved_ushers.username',Auth::user()->name)
                                   // ->select('ushers.*', 'saved_ushers.username as m_name', 'saved_ushers.saved_username as o_name')
                                        ->paginate(20);
                        $images='';
                        return view('ushers.showevent', compact('event', 'rs','client','images'))->with('pagetitle',$pagetitle);
//                        Usher::leftjoin('saved_ushers', function ($join) {
//                                    $join->on('ushers.user_id', '=', 'saved_ushers.saved_userid');                                   
//                                }) ->where ('saved_ushers.username',Auth::user()->name)
//                                    ->select('ushers.*', 'saved_ushers.username as m_name', 'saved_ushers.saved_username as o_name')->paginate(4);
                       // $images = User_image::whereUser_id($user->id)->get();
                            
//                           $posts = Post::where ('username',$name)
//                                ->orderBy('created_at', 'desc')//->simplepaginate(3);
//                                 ->paginate(20);
//                       
//                       if (Auth::check()){
//                        $sa =SavedUsher::where ('username',Auth::user()->name)->where('saved_username',$name)->get();
//                       // $sa_event =SavedEvent::where ('username',Auth::user()->name)->where('event_name',$name)->get();
//                        $myevents =Event::where ('user_id',Auth::user()->id)->get();
////                         $myevents =Event::All();
//                                            //    $sa_event ='';
//
//                        return view('ushers.shownn', compact('user', 'sa','myevents','userprofile','images'));
//                       }
//                       else{
//                           $images='';
//                            $sa ='';
//                        $sa_event ='';
//                            return view('ushers.shownn', compact('user','userprofile','images'));
//                       }
                     //   return view('backend.users.show', compact('user', 'posts', 'selectedRoles','comments'));

                    }
            
            public function showEvents($showtype)
                                            {
                        if ($showtype == 'browseevents'){
                             $pagetitle = 'All events';
                             $tablename = 'events';
                            // $columnname = 'saved_username';
                           // $status= 0;
                          $rs=Client::leftjoin('events', function ($join) {
                                    $join->on('clients.user_id', '=', 'events.user_id');                                   
                                }) //->where ('clients.username',Auth::user()->name)
                                    ->select('events.*', 'clients.username as m_name', 'events.name as o_name')->paginate(4);
                                return view('ushers.showevent_small', compact('rs','user'))->with('pagetitle',$pagetitle);
                        }
                        elseif ($showtype == 'listedevents'){
                             $pagetitle = 'My Listed events';
                             $tablename = 'events';
                             $columnname = 'friend_username';
                            $status= 0;
                             //$rs =friend::whereUsername (Auth::user()->name)->select('Friends.friend_username as cname')->get();
                              $rs=Client::leftjoin('events', function ($join) {
                                    $join->on('clients.user_id', '=', 'events.user_id');                                   
                                }) ->where ('clients.username',Auth::user()->name)
                                    ->select('events.*', 'clients.username as m_name', 'events.name as o_name')->paginate(4);
                                return view('ushers.showevent_small', compact('rs','user'))->with('pagetitle',$pagetitle);
                        }
                        elseif ($showtype == 'myevents'){
                             $pagetitle = 'My events';
                             $tablename = 'events';
                              $rs=Client_usher_event::leftjoin('events', function ($join) {
                                    $join->on('client_usher_events.event_id', '=', 'events.id');                                   
                                }) ->leftjoin('clients', function ($join) {
                                    $join->on('client_usher_events.client_id', '=', 'clients.user_id');                                   
                                }) ->where ('client_usher_events.usher_id',Auth::user()->id)
                                     //   ->where ('clients.username',Auth::user()->name)
                                    ->select('events.*', 'clients.username as m_name', 'events.name as o_name','Client_usher_events.status as mstatus')->paginate(4);
                                return view('ushers.showevent_small', compact('rs','user'))->with('pagetitle',$pagetitle);
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
                                return view('ushers.showuser_small', compact('rs','user'))->with('pagetitle',$pagetitle);
                        }
                        else{
                             $pagetitle = 'All users';
                             $status= 1;
                             //$rs =Saved_user::where ('username',Auth::user()->name)->get();
                              $rs=Userprofile::leftjoin('friends', function ($join) {
                                    $join->on('userprofiles.user_id', '=', 'friends.friend_userid');                                   
                                }) ->where ('friends.username',Auth::user()->name)
                                    ->select('userprofiles.*', 'friends.username', 'friends.friend_username as o_name')->paginate(4);
                                return view('ushers.showuser_small', compact('rs','user'))->with('pagetitle',$pagetitle);
                        }
                                 
                    }
                    
                    public function showUsers($showtype)
                                            {
                        if ($showtype == 'saved_ushers'){
                             $pagetitle = 'Saved Ushers';
                             $tablename = 'Saved_ushers';
                             $columnname = 'saved_username';
                            $status= 0;
                           //  $rs =Saved_user::where ('username',Auth::user()->name)->select('Saved_users.saved_username as cname')->get();
                              $rs=Usher::leftjoin('saved_ushers', function ($join) {
                                    $join->on('ushers.user_id', '=', 'saved_ushers.saved_userid');                                   
                                }) ->where ('saved_ushers.username',Auth::user()->name)
                                    ->select('ushers.*', 'saved_ushers.username as m_name', 'saved_ushers.saved_username as o_name')->paginate(4);
                                return view('ushers.showuser_small', compact('rs','user'))->with('pagetitle',$pagetitle);
                        }
                        elseif ($showtype == 'events'){
                             $pagetitle = 'My events';
                             $tablename = 'events';
                             $columnname = 'friend_username';
                            $status= 0;
                             //$rs =friend::whereUsername (Auth::user()->name)->select('Friends.friend_username as cname')->get();
                              $rs=Client::leftjoin('events', function ($join) {
                                    $join->on('clients.user_id', '=', 'events.user_id');                                   
                                }) ->where ('clients.username',Auth::user()->name)
                                    ->select('events.*', 'clients.username as m_name', 'events.name as o_name')->paginate(4);
                                return view('ushers.showevent_small', compact('rs','user'))->with('pagetitle',$pagetitle);
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
                                return view('ushers.showuser_small', compact('rs','user'))->with('pagetitle',$pagetitle);
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
                                return view('ushers.showuser_small', compact('rs','user'))->with('pagetitle',$pagetitle);
                        }
                        else{
                             $pagetitle = 'All users';
                             $status= 1;
                             //$rs =Saved_user::where ('username',Auth::user()->name)->get();
                              $rs=Userprofile::leftjoin('friends', function ($join) {
                                    $join->on('userprofiles.user_id', '=', 'friends.friend_userid');                                   
                                }) ->where ('friends.username',Auth::user()->name)
                                    ->select('userprofiles.*', 'friends.username', 'friends.friend_username as o_name')->paginate(4);
                                return view('ushers.showuser_small', compact('rs','user'))->with('pagetitle',$pagetitle);
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
//                            return view('users.showuser_small', compact('rs','user'))->with('pagetitle',$pagetitle);
                    }
                    
 public function saveUsher($name, Request $request)              
            {
                     //   $uid = user->get('name)')
                         $uid = User::where('name', $name)->value('id');
                       // $saved_asset = Saved_asset::all();
                        $saved_user= new SavedUsher(array(
                         'username'	 => Auth::user()->name,
                        'saved_username' => $name,
                        'userid'	 => Auth::user()->id,
                        'saved_userid' => $uid,

                        ));

                        $saved_user->save();
                        //$post->categories()->sync($request->get('categories'));
                        return redirect()->back()->with('status', $name.' has been saved!');
            }
            
            public function deleteSavedUsher($name)
                {
                     //$uid = saved_user::where('name', $name)->value('id');
                      $uid =savedUsher::where ('username',Auth::user()->name)->where('saved_username',$name)->value('id');
                       //  $images = Image::all();
                  //  return view('images/showlists', compact('images'));
                    $saved_user =SavedUsher::destroy($uid);
                    return redirect()->back()->with('status',$name.' removed from your saved ushers list!');
                }
            
             public function saveClient($name, Request $request)              
            {
                     //   $uid = user->get('name)')
                         $uid = User::where('name', $name)->value('id');
                       // $saved_asset = Saved_asset::all();
                        $saved_user= new SavedClient(array(
                         'username'	 => Auth::user()->name,
                        'saved_username' => $name,
                        'userid'	 => Auth::user()->id,
                        'saved_userid' => $uid,

                        ));

                        $saved_user->save();
                        //$post->categories()->sync($request->get('categories'));
                        return redirect()->back()->with('status', $name.' has been saved!');
            }


            public function deleteSavedClient($name)
                {
                     //$uid = saved_user::where('name', $name)->value('id');
                      $uid =savedClient::where ('username',Auth::user()->name)->where('saved_username',$name)->value('id');
                       //  $images = Image::all();
                  //  return view('images/showlists', compact('images'));
                    $saved_user =SavedClient::destroy($uid);
                    return redirect()->back()->with('status',$name.' removed from your saved ushers list!');
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
                            
                 public function showgeneral($showtype)
                                            {
                        if ($showtype == 'addevents'){
                             $pagetitle = 'Add Event';
                             $pagetext = 'Add Event Page';
                            
                        }
                        elseif ($showtype == 'editevents'){
                             $pagetitle = 'Edit Event';
                              $pagetext = 'Edit event Page';
                            }
                        elseif ($showtype == 'myaccount'){
                             $pagetitle = 'My Account';
                              $pagetext = 'Bank,Credit Card and Invoice Information';
                             }
                        else if ($showtype == 'manageimages'){
                             $pagetitle = 'Upload Images';
                             $pagetext = 'Manage Images';
                               }
                        else{
                             $pagetitle = 'Home';
                            $pagetitle = 'Home';
                             $pagetext = 'Home';
                             
                                //  return view('users.showuser_small', compact('rs','user'))->with('pagetitle',$pagetitle);
                    }
                    return view('ushers.ushers', ['pagetitle' => $pagetitle,'pagetext' => $pagetext]);
                   // return view('ushers.ushers')->with('pagetitle',$pagetitle,'pagetext',$pagetext);
                                            }



                 public function showUsers2($showtype)
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
                            
                        
             
                            return view('users.showuser_small', compact('rs','user'))->with('pagetitle',$pagetitle);
                    }
}
