<?php
/**
 * Set a flash message in the session.
 *
 * @param  string $message
 * @return void
 */
use App\Viewed_user;
use App\User;
use Carbon\Carbon;
            function flash($message) {
                session()->flash('message', $message);
            }

                function set_active($uri)
            {
                return Request::is($uri) ? 'active' : '';
            }
             function set_active2($uri)
            {
                return;
            }


            function ageCalculator($dob){
                    if(!empty($dob)){
                        if ($dob!=0){
                            $birthdate = new DateTime($dob);
                        
                            $today   = new DateTime('today');
                            $howOldAmI = $birthdate->diff($today)->y;
                           // $howOldAmI = Carbon::createFromDate($dob->y,$dob->m,$dob->d)->age;
                            return $howOldAmI;
                        }
                    }else{
                            return 0;
                    }
                }
function ageCalculator2($dob){
                    if(!empty($dob)){
                        if ($dob!=''){
                            $birthdate = new DateTime($dob);
                        
                            $today   = new DateTime('today');
                            $age = $birthdate->diff($today)->y;
                            return $age;
                        }
                    }else{
                            return 0;
                    }
                }

   function saveViewedUser($name)              
            {
       
                   $rs =viewed_user::where ('username',Auth::user()->name)->where ('viewed_username',$name)->get();
                   $rs_cnt= $rs->count();
                   $cnt= 14;//$rs->view_count;
                   echo $rs_cnt . ' - ' . $cnt;
                   $ct = $rs_cnt;
                     //   $uid = user->get('name)')
                         $uid = User::where('name', $name)->value('id');
                       // $saved_asset = Saved_asset::all();
                         
                 if ( $rs_cnt == 0){
                        $viewed_user= new Viewed_user(array(
                         'username'	 => Auth::user()->name,
                        'viewed_username' => $name,
                        'userid'	 => Auth::user()->id,
                        'viewed_userid' => $uid,
                        //'view_count' => 

                        ));
                    $viewed_user->save();
                    $vid =$viewed_user->id;
                         }
                        // $vid =$rs->id;
                        $vid =viewed_user::where ('username',Auth::user()->name)->where ('viewed_username',$name)->value('id');
                        $vvid =viewed_user::where ('username',Auth::user()->name)->where ('viewed_username',$name)->value('view_count');
                          echo $vid . ' -vv ' . $vvid;
                         $viewcount =viewed_user::where('id', $vid)
                                ->update(['view_count' => $vvid+1]);
                          //        if (Gate::denies('update-post', $post)) {
                //            abort(403);
                //        }
            //$post->categories()->sync($request->get('categories'));
          //  return redirect()->back()->with('status', $name.' has been saved!');

}
