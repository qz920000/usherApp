<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Contact;
use App\User;
use App\Message;
use App\Message_map;
Use Mail;
Use Auth;


class MailboxController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');

        //$this->middleware('log', ['only' => ['fooAction', 'barAction']]);

        //$this->middleware('subscribed', ['except' => ['fooAction', 'barAction']]);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($mailfolder)
    {
                        if ($mailfolder == 'inbox'){
                             $pagetitle = 'Inbox';
                            $fromt = 'from';
                             $status= 0;
                             $colname='sendername';
                               $rs = Message_map::where('receivername',Auth::user()->name)->where('messagefolder','inbox')->orderBy('created_at','desc')->paginate(4);
                        }
                        elseif ($mailfolder == 'sentbox'){
                             $pagetitle = 'Sent';
                              $status= 0;
                              $fromt = 'to';
                              $colname='receivername';
                              $rs = Message_map::where('sendername',Auth::user()->name)->orderBy('created_at','desc')->paginate(4);
                        }
                        else if ($mailfolder == 'deleted'){
                             $pagetitle = 'Deleted';
                             $fromt = 'from';
                            $status= 1;
                            $colname='sendername';
                              $rs = Message_map::where('receivername',Auth::user()->name)->where('messagefolder','deleted')->orderBy('created_at','desc')->paginate(4);
                        }
                        
                        
                        
                         // $pagetitle = 'Inbox';
                          // $status_message='';
                           //$rs = Message_map::where('receivername',Auth::user()->name)->orderBy('created_at','desc')->paginate(4);
//                            $posts =Post::leftjoin('images', function ($join) {
//                                        $join->on('posts.id', '=', 'images.post_id');                 
//                                    })
//                                    ->select('posts.*', 'images.post_id', 'images.filePath','images.thumb_filename')
//                                    ->groupBy('posts.id')
//                                    ->orderBy('posts.created_at','desc')->paginate(4);
        //                    $posts =Post::orderBy('created_at', 'desc')
        //                     ->paginate(4);
                            //$images = $posts->images()->get();
                              //$tt = Auth::user()->name;
                    //          $posts = Post::where ('username',$tt) ->orderBy('created_at', 'desc')//->simplepaginate(3);
                    //         ->paginate(config('comsenblog.posts_per_page'));
                            //return view('mailbox.index', compact('rs'))->with('pagetitle',$pagetitle,'fromt',$fromt);
                            return view('mailbox.index', compact('rs'), ['pagetitle' => $pagetitle,'fromt' =>$fromt,'cname' =>$colname]);
    }
    
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
                public function show($id,$folder)
                {
                            if (strtolower($folder) == 'inbox'){
                             $pagetitle = 'Inbox';
                            $fromt = 'from';
                             $status= 0;
                             $colname='sendername';
                              $msg_read =Message_map::where('id', $id)
                                ->update(['read' => '1']);
                               //$rs = Message_map::where('receivername',Auth::user()->name)->where('messagefolder','inbox')->orderBy('created_at','desc')->paginate(4);
                        }
                        elseif (strtolower($folder) == 'sent'){
                             $pagetitle = 'Sent';
                              $status= 0;
                              $fromt = 'to';
                              $colname='receivername';
                             // $rs = Message_map::where('sendername',Auth::user()->name)->orderBy('created_at','desc')->paginate(4);
                        }
                        else if (strtolower($folder) == 'deleted'){
                             $pagetitle = 'Deleted';
                             $fromt = 'from';
                            $status= 0;
                            $colname='sendername';
                             $msg_read =Message_map::where('id', $id)
                                ->update(['read' => '1']);
                             // $rs = Message_map::where('receivername',Auth::user()->name)->where('messagefolder','deleted')->orderBy('created_at','desc')->paginate(4);
                        }
                            //$pagetitle = '';
                       
                            $rs = Message_map::whereId($id)->firstOrFail();
                             // $pagetitle =config('site-c.title');
                             // $tt = Auth::user()->name;
//                                $posts =Post::whereStatus(0) ->leftjoin('images', function ($join) {
//                                    $join->on('posts.id', '=', 'images.post_id');
//
//                                })
//                            ->select('posts.*', 'images.post_id', 'images.filePath','images.filename','images.thumb_filename')
//                            ->groupBy('posts.id')
//                            ->orderBy('posts.created_at','desc')->paginate(4);
        //                      $posts = Post::whereStatus(0)
        //                  ->orderBy('created_at', 'desc')//->simplepaginate(3);
        //                     ->paginate(4);
                             
                          return view('mailbox.show', compact('rs'), ['pagetitle' => $pagetitle,'fromt' =>$fromt,'cname' =>$colname]);
    }
    
                public function markAsRead($foldertype,$id, $isread)
                        {
                    if ($isread=='no'){
                        $status=1;
                        $msg= 'message marked';
                        }
                    else{
                         $status=0;
                         $msg= 'message unmarked!!';
                    }
                            $msg_read =Message_map::where('id', $id)
                                ->update(['read' => $status]);
                 return redirect()->back()->with('status',$msg);
                    }
                public function markAsFlagged($foldertype,$id, $isread)
                        {
                    if ($isread=='yes'){
                        $status=1;
                        $msg= 'message flagged';
                        }
                    else{
                         $status=0;
                         $msg= 'flag removed';
                    }
                            $msg_read =Message_map::where('id', $id)
                                ->update(['flagged' => $status]);
                 return redirect()->back()->with('status',$msg);
                    }
                    
                    
                public function deleteMessage($id, $folder)
                        {

                            $rs =Message_map::where('id', $id)
                                ->update(['messagefolder' => 'deleted']);
                            return redirect()->route('mailbox',['inbox'])->with('status',' Message moved to trash!');
                        }
                  public function restoreMessage($id, $folder)
                        {

                            $rs =Message_map::where('id', $id)
                                ->update(['messagefolder' => 'inbox']);
                            return redirect()->route('mailbox',['inbox'])->with('status',' Message moved to inbox!');
                        }
//eturn view('welcome', ['name' => 'Samantha']);
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 

     public function store(ContactFormRequest $request)
    {
        //return $request->all();//
          $name = $request->get('name');
        $email = $request->get('email');
        $subject = $request->get('subject');
       // $content = 'App name: '.config('site-c.Appname')."\r\n";
        
        $content = 'From: '.$name."\r\n";
        $content = $content.'subject: '.$subject."\r\n";
        $content = $content.'email: '.$email."\r\n";
        $content = $content.'App name: '.config('site-c.Appname')."\r\n";
        $content = $content."\r\n";
        $content = $content."----------------------------------------------------------\r\n";
        $content = $content. ' '. $request->get('content');
        $content = $content."\r\n";
        $content = $content."\r\n";
        $content = $content."----------------------------------------------------------\r\n";
                  
                  
        $slug = uniqid();
       $contact = new Contact(array(
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'subject' => $request->get('subject'),
        'content' => $request->get('content'),
        'slug' => $slug
        ));
        $contact->save();
            $data = array(
            'contact' => $slug,
            );
                  
//            Mail::raw( $content, function($message){
//            //Mail::send('emails.ticket', $data, function ($message) {
//            $message->from($email, $name);
//            $message->to('qz91@yahoo.com')->subject($subject);
//            });
            $result= Mail::raw($content, function ($message) use ($contact){
            $message->from('admin@commonsensenow.com', $contact->name . " email address " . $contact->email);
            $message->to('qz91@yahoo.com', 'Admin');
            $message->cc($contact->email, $contact->name);
                $message->subject('Message from contact form Subject: '.$contact->subject);
        });
        if(!$result) {   
     echo "Error";   
} else {
    echo "Success";
}
//             Mail::raw($content, $data, function ($message) use ($contact){
//            $message->from($contact->email, 'New User email verification');
//            $message->to('qz91@yahoo.com', $contact->name);
//                $message->subject($contact->subject);
//        });
//            Mail::send('emails.ticket', $data, function ($message) {
//            $message->from('qz9@yahoo.com', 'Learning Laravel new ticket');
//            $message->to('qz91@yahoo.com')->subject('There is a new ticket!');
//            });
          //  return redirect(action('PostsController@showPreview', $post_id))->with('status', 'Your post has been submitted as a draft!');
        //return redirect('/contact')->with('status', 'Your ticket has been created! Its unique id is: '.$slug);
        return redirect()->back()->with('status', 'Your message has been sent!');

    }
    
    public function sendEmailtoUser($name, ContactFormRequest $request)
    {     
        
        $uid = User::where('name', $name)->value('id');
        $user_to_email =User::findOrFail($uid)->value('email');
       // $user_to_email = $request->get('user_to_email');
        // $uvuser = User::findOrFail($user_to_email)->get();
               
         $uvuser = User::where('name', $name)->get(); //User::where('email', '=', $user_to_email)->get();
        // $user_to_email = $request->get('user_to_email');
         //$uvuser->email=User::find($request->get('user_to_name'))->value('email');
       //  $user_to_email2=User::findOrFail($request->get('user_to_name'))->value('email');
       //  $user_to_email2=User::where('email', '=', $user_to_email)->value('email');
         $uvuser->email=$user_to_email;
        $uvuser->name = $name;//User::where('email', '=', $user_to_email)->value('name');//$request->get('user_to_name');
                   
        //return $request->all();//
         // $name = $request->get('name');
       // $email = $request->get('email');
//          $contact->user_to_name = $request->get('user_to_name');
//        $contact->user_to_email = $request->get('user_to_email');
       // $subject = $request->get('subject');
        $content = $request->get('content');
          $subject = 'You have received a message from '.$name;        
                  
        $slug = uniqid();
        
                 $message_map = new Message_map(array(         
        'senderid' => Auth::user()->id,
        'sendername' => Auth::user()->name,
        //'messageid' => $message_id ,
        'receiverid' => $uid,
        'receivername' => $name,
          'messagefolder' => 'inbox'
        ));
        $message_map->save();
        $msg_map_id =$message_map->id;
        
       $message = new Message(array(         
        'subject' => $request->get('subject'),
        'message_body' => $request->get('content'),
        'msg_map_id' => $msg_map_id
        ));
       $message->save();
        //$message_id =$message->id;
        

            $ddd = array(
                  'contact' => $slug,
            );
               
               $senderid = Auth::user()->id;
        $sendername = Auth::user()->name;
        //'senderid' => Auth::user()->id,
        $senderemail = Auth::user()->email;
         $useraa = User::findOrFail($uid);
 $data = array('sendername' => $sendername,'senderemail' => $senderemail,'receivername'=>$name,);
         Mail::send('emails.new_mail', $data, function ($m) use ($useraa) {
            $m->from('admin@commonsensenow.com', 'dd Application');

            $m->to($useraa->email, $useraa->name)->subject('New mail received for you.');
        });
    
                       
//            Mail::raw( $content, function($message){
//            //Mail::send('emails.ticket', $data, function ($message) {
//            $message->from($email, $name);
//            $message->to('qz91@yahoo.com')->subject($subject);
//            });
            // $user = User::findOrFail($request->get('user_to_name'));
//             Mail::raw($content, function ($message) use ($contact,$uvuser){
//            $message->from($contact->email, $contact->name . " with email address " . $contact->email);
//            $message->to($uvuser->email, $uvuser->name);
//                $message->subject('New Message from Contatc form Subhect: '.$contact->subject);
//        });
//        
//lllllllllllllllllllllllllllllllllll
//             Mail::raw($content, function ($message) use ($uvuser){
//            $message->from('aa@admin.com', 'Admin' . " with email address " . '$senderemail');
//            $message->to($uvuser->email, $uvuser->name);
//                $message->subject('New Message from Contact form Subject: ');
//        });
//        lllllllllllllllllllllllllllllllllllllll
     //  return redirect(action('PostsController@showPreview', $post_id))->with('status', 'Your post has been submitted as a draft!');
        //return redirect('/contact')->with('status', 'Your ticket has been created! Its unique id is: '.$slug);
        return redirect()->back()->with('status', 'Your message has been sent!');

    }
      public function replyEmailtoUser($mailid,$foldertype, ContactFormRequest $request)
    {     
        $name = message_map::where('id', $mailid)->value('sendername');
        $uid = User::where('name', $name)->value('id');
        $user_to_email =User::findOrFail($uid)->value('email');
       // $user_to_email = $request->get('user_to_email');
        // $uvuser = User::findOrFail($user_to_email)->get();
               
         $uvuser = User::where('name', $name)->get(); //User::where('email', '=', $user_to_email)->get();
        // $user_to_email = $request->get('user_to_email');
         //$uvuser->email=User::find($request->get('user_to_name'))->value('email');
       //  $user_to_email2=User::findOrFail($request->get('user_to_name'))->value('email');
       //  $user_to_email2=User::where('email', '=', $user_to_email)->value('email');
         $uvuser->email=$user_to_email;
        $uvuser->name = $name;//User::where('email', '=', $user_to_email)->value('name');//$request->get('user_to_name');
                   
     
        $content = $request->get('content');
          $subject = 'You have received a message from '.$name;        
                  
        $slug = uniqid();
        
                 $message_map = new Message_map(array(         
        'senderid' => Auth::user()->id,
        'sendername' => Auth::user()->name,
        //'messageid' => $message_id ,
        'receiverid' => $uid,
        'receivername' => $name,
          'messagefolder' => 'inbox'
        ));
        $message_map->save();
        $msg_map_id =$message_map->id;
        
       $message = new Message(array(         
        'subject' => $request->get('subject'),
        'message_body' => $request->get('content'),
        'msg_map_id' => $msg_map_id
        ));
       $message->save();
        //$message_id =$message->id;
        

            $ddd = array(
                  'contact' => $slug,
            );
               
               $senderid = Auth::user()->id;
        $sendername = Auth::user()->name;
        //'senderid' => Auth::user()->id,
        $senderemail = Auth::user()->email;
         $useraa = User::findOrFail($uid);
 $data = array('sendername' => $sendername,'senderemail' => $senderemail,'receivername'=>$name,);
         Mail::send('emails.new_mail', $data, function ($m) use ($useraa) {
            $m->from('admin@commonsensenow.com', 'dd Application');

            $m->to($useraa->email, $useraa->name)->subject('New mail received for you.');
        });
    
  //return redirect('/contact')->with('status', 'Your ticket has been created! Its unique id is: '.$slug);
        return redirect()->back()->with('status', 'Your message has been sent!');

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//              $ticket = Ticket::whereSlug($slug)->firstOrFail();
//        $ticket->delete();
//        return redirect('/tickets')->with('status', 'The ticket '.$slug.' has been deleted!');
        //
    }
}
