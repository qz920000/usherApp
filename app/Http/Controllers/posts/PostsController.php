<?php

namespace App\Http\Controllers\posts;

        use Illuminate\Http\Request;

        use App\Http\Requests;
        use App\Http\Controllers\Controller;
        use App\School;
        use App\Http\Requests\PostFormRequest;
        use App\Category;
        use App\Post;
        use App\Entry;
        use App\Postsource;
        use App\Comment;

        ////////////////////
        //
        use App\Image as Appimage;
        use Carbon\Carbon;

        //use App\Http\Requests;
        use Guzzle\Tests\Plugin\Redirect;
        //use App\Image;
        //use Illuminate\Http\Request;
        use Illuminate\Support\Facades\Input;
        //use App\Urllink;
        ///////////////////////////////
        use Auth;
        use Illuminate\Support\Str;
        use Intervention\Image\Facades\Image ;
        ////use App\Http\Requests\PostEditFormRequest;
        //use App\Http\Requests\PostSaveFinalFormRequest;
        //use App\Comment;
        //Use Input;
        use Gate;


        class PostsController extends Controller

        {

            public function create()
                        {
                      $schools =School::all();
                        $categories =Category::all();
                        $entrylinks =Entry::all();
                        $postsources =Postsource::all();
                    return view('posts.create',compact('schools','categories','entrylinks','postsources'))->with('pagetitle','Create New Post');
                    //return view('admin.faculties.create', array('title' => 'Welcome','description' => '','page' => 'addfaculty'));
                    //return view('checkout', array('title' => 'Welcome','description' => '','page' => 'home'));
                    }

//             public function storeImage( $post_id)
//                     {
//                        // Store records process
//                     $image = new Image();
//        //        $this->validate($request, [
//        //            //'title' => 'required',
//        //            'image' => 'required'
//        //        ]);
//        //        $image->title = $request->title;
//        //        $image->description = $request->description;
//                     $image->title = '$post->title';
//                    $image->description = 'image';
//                        //if($request->hasFile('image')) {
//                    $file = Input::file('image');
//                    //getting timestamp
//                    $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
//
//                    $name = $timestamp. '-' .$file->getClientOriginalName();
//
//                    $image->filePath = $name;
//                    $image->post_id = $post_id;
//
//
//                    $file->move(public_path().'/images/', $name);
//               // }
//                $image->save();
//                //return $this->create()->with('success', 'Image Uploaded Successfully');
//                //Session::flash('message', 'Successfully updated!');
//                //return redirect()->back()->with('status', 'Image Uploaded Successfully!');
//                }

        public function store (PostFormRequest $request)
        {
              $buttonval = $request->get('save');
               $slug = uniqid();
               $status=0;
               $route_name = 'showpost';
               $title='New post';
                $status_message ='Your post has been published!!';
               if ($buttonval == 'publish'){
                   $status_message ='Your post has been published!!';       
                   $status=1;
                       }
                    else{
                        $status=0;
                        $route_name = 'showpreview';
                        $status_message ='Your draft has been saved!!';           
                        }
                //    echo "publish";
                        $post= new Post(array(
                        'title' => $request->get('title'),
                        'content' => $request->get('content'),
                        'tags' => $request->get('tags'),
                        'category_id'=> $request->get('category'),
                         'postsource_id'=> $request->get('postsource'),
                         'entry_id'=> $request->get('entrylink'),
                        //'user_id' => Auth::user()->id,
                        'username' => Auth::user()->name,
                        'user_email' => Auth::user()->email,
                         'status'  => $status,
                        //     'user_id' => $request->get('user_id'),
                        'slug' => $slug,
                        ));
                //$buttonval = $request->get('save');
                //$slug = array_get($post, 'slug');
                $post->save();
                $post_id =$post->id;
                                if($request->hasFile('image')) {
                                           $Appimage = new AppImage();
                 $appimage = new AppImage();
                $appimage->title = $request->get('title');//$post->id->value(title);
                $appimage->description = 'image';
                    $img = Image::make(Input::file('image'))->resize(300, 200);
                    $thumb_img = Image::make(Input::file('image'))->resize(20, 20);
                    $file = Input::file('image');
                    //getting timestamp
                    $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

                    $name = $timestamp. '-' .$file->getClientOriginalName();  
                    $thumbname 	= 	'thumb_'. $name;
                    $smallname 	= 	'small_'. $name;
                    $appimage->filePath = $name;
                    $appimage->post_id = $id;
                    $appimage->filename = $file->getClientOriginalName();     
                     $appimage->thumb_filename = $thumbname;
 
                    $file->move(public_path().'/images/', $name);
                    
                    $thumb_img->save(public_path().'\images\thumbs\\'.$thumbname);
                    $img->save(public_path().'\images\small\\'.$smallname);
                    
                $appimage->save();
               
               // echo $file;
               // $resizedImage 	= 	$this->resize($file, 200);
                }
//                if($request->hasFile('image')) {               
//                //Process image
//                 $image = new Image();
//                     $image->title =  $request->get('title');//$post->$post_id->value(title);
//                $image->description = 'image';
//                        //if($request->hasFile('image')) {
//                    $file = Input::file('image');
//                    //getting timestamp
//                    $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
//
//                    $name = $timestamp. '-' .$file->getClientOriginalName();
//
//                    $image->filePath = $name;
//                    $image->post_id = $post_id;
//                    $image->filename = $file->getClientOriginalName();
//                    $file->move(public_path().'/images/', $name);
//               // }
//                $image->save();
//                }
               // if ($request->get('title'))
                return redirect()->route($route_name, [$post_id])->with('status', $status_message,'pagetitle',$title);
               // return redirect->route('mypost')->with('status', 'Your post has been published!!');
        //var_dump(Input::all());
          }





           public function show($id)
                    {
                    $post = Post::whereId($id)->firstOrFail();
                    $comments = $post->comments()->get();
                    //$comments = $post->comments()->get();
        //            $updps = $post->updateposts()->get();
                    $images = $post->images()->get();
                    $post_status= $post->status;
        //            $utags = $post->tags()->get();
        //             if($post_status == "1")
        //                 {
        //            return view('blog.show', compact('post', 'comments','updps','images','utags'));
        //       } else {
        //            return view('errors/unauthorized')->with('status', 'nt authorized!');
        //        }
                   return view('posts.showpost', compact('post', 'comments','images'))->with('post_type','app/post');

                   }




         public function showpreview($id)
                    {
                    $post = Post::whereId($id)->firstOrFail();
                      $images = $post->images()->get();
                    $post_status= $post->status;
        //            $utags = $post->tags()->get();
        //             if($post_status == "1")
        //                 {
        //            return view('blog.show', compact('post', 'comments','updps','images','utags'));
        //       } else {
        //            return view('errors/unauthorized')->with('status', 'nt authorized!');
        //        }
                   return view('posts.preview', compact('post','images'));
        }


          public function edit($id)
            {
                 $post = Post::whereId($id)->firstOrFail();
                if (Gate::denies('update-post', $post)) {
                    abort(505, 'Unauthorized action.');
                }
                        $schools =School::all();
                        $images = $post->images()->get();
                        $categories =Category::all();
                        $entrylinks =Entry::all();
                        $postsources =Postsource::all();
                    return view('posts.edit',compact('post','schools','categories','entrylinks','postsources','images'))->with('pagetitle','Edit Post');

                    }


            public function update($id, PostFormRequest $request)
                    {
                 $post = Post::whereId($id)->firstOrFail();

              if (Gate::denies('update-post', $post)) {
                    abort(403);
                }
                    $buttonval = $request->get('save');
                   $slug = uniqid();
                   $status=0;
                   $route_name = 'showpost';
                   $title='New post';
                    $status_message ='Your post has been published!!';
               if ($buttonval == 'publish'){
                   $status_message ='Your post has been published!!';       
                   $status=1;
                  }
               else{
                    $status=0;
                    $route_name = 'showpreview';
                    $status_message ='Your draft has been saved!!';           
                    }

                //$slug = array_get($post, 'slug');
                     $post->title = $request->get('title');
                    $post->content = $request->get('content');
                    $post->tags = $request->get('tags');
                    $post->category_id = $request->get('category');
                    $post->postsource_id = $request->get('postsource');
                    $post->entry_id = $request->get('entrylink');
                    $post->username = Auth::user()->name;
                    $post->user_email = Auth::user()->email;
//                      $post->username = $request->get('username');
//                    $post->user_email = $request->get('email');
                    $post->status = $status;
                    //$post->slug = Str::slug($request->get('title'), '-');

        //            return redirect(action('PostsController@showPreview', $post->id))->with('status', 'The post has been updated!');
                    //return redirect(action('PostsController@edit', $post->id))->with('status', 'The post has been updated!');
                $post->save();
               // $post_id =$post->id;
                  if($request->hasFile('image')) {

                 $Appimage = new AppImage();
                 $appimage = new AppImage();
                $appimage->title = $request->get('title');//$post->id->value(title);
                $appimage->description = 'image';
                    $img = Image::make(Input::file('image'))->resize(300, 200);
                    $thumb_img = Image::make(Input::file('image'))->resize(20, 20);
                    $file = Input::file('image');
                    //getting timestamp
                    $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

                    $name = $timestamp. '-' .$file->getClientOriginalName();  
                    $thumbname 	= 	'thumb_'. $name;
                    $smallname 	= 	'small_'. $name;
                    $appimage->filePath = $name;
                    $appimage->post_id = $id;
                    $appimage->filename = $file->getClientOriginalName();     
                     $appimage->thumb_filename = $thumbname;
 
                    $file->move(public_path().'/images/', $name);
                    
                    $thumb_img->save(public_path().'\images\thumbs\\'.$thumbname);
                    $img->save(public_path().'\images\small\\'.$smallname);
                    //$file->move(public_path().'/images/', $name);
                    //$img = Image::make($imageRealPath);

 //$imageRealPath 	= 	pucblic_path().'/images/';
//                                    $imageRealPath 	= $image->getRealPath();
                                   
//$image = Image::make($imageRealPath.'Jellyfish.jpg',$thumbName )->resize(300, 200)->save();
//$image = Image::make(sprintf('uploads/%s', $file->getClientOriginalName()))->resize(200, 200)->save();
               // }
                $appimage->save();
               // echo $file;
               // $resizedImage 	= 	$this->resize($file, 200);
                }
               return redirect()->route($route_name, [$id])->with('status', $status_message,'pagetitle',$title);

      }
                              
//                public function save(Request $request)
//                        {
//                        $image 			= 	$request->file('image');
//                        $resizedImage 	= 	$this->resize($image, $request->get('image_size'));
//
//                        if(!$resizedImage)
//                        {
//                                return redirect()->back()->withError('Could not resize Image');
//                        }
//                        return redirect()->route('image.resized')->with('image_url', asset('images'). '/' .$resizedImage->basename);
//                }             
                
                
//          	private function resize($image, $size)
//                        {
//                            try 
//                            {
//                                    $extension 		= 	$image->getClientOriginalExtension();
//                                    $imageRealPath 	= 	public_path().'\images\\';
////                                    $imageRealPath 	= $image->getRealPath();
//                                    $thumbName 		= 	'thumb_'. $image->getClientOriginalName();
//echo $size.' '. $thumbName .' '. $imageRealPath;
////                                    $imageManager = new ImageManager(); // use this if you don't want facade style code
////                                    $img = $imageManager->make($imageRealPath);
//
//                                    //$img = Image::make($imageRealPath); // use this if you want facade style code
//                                    $image->resize(intval($size), null, function($constraint) {
//                                             $constraint->aspectRatio();
//                                    });
////                                    return $img->save(public_path('images'). '/'. $thumbName);
//                            }
//                            catch(Exception $e)
//                            {
//                                    return false;
//                            }
//
//                        }                    
           public function index()
                    {
                           $pagetitle = 'All Posts';
                           $status_message='';
                            $posts =Post::leftjoin('images', function ($join) {
                                        $join->on('posts.id', '=', 'images.post_id');                 
                                    })
                                    ->select('posts.*', 'images.post_id', 'images.filePath','images.thumb_filename')
                                    ->groupBy('posts.id')
                                    ->orderBy('posts.created_at','desc')->paginate(4);
        //                    $posts =Post::orderBy('created_at', 'desc')
        //                     ->paginate(4);
                            //$images = $posts->images()->get();
                              //$tt = Auth::user()->name;
                    //          $posts = Post::where ('username',$tt) ->orderBy('created_at', 'desc')//->simplepaginate(3);
                    //         ->paginate(config('comsenblog.posts_per_page'));
                            return view('posts.showposts', compact('posts'))->with('pagetitle',$pagetitle);
                        }

                  public function showdrafts()
                            {
                              $pagetitle = 'All Draft Posts';
                             // $pagetitle =config('site-c.title');
                             // $tt = Auth::user()->name;
                                $posts =Post::whereStatus(0) ->leftjoin('images', function ($join) {
                                    $join->on('posts.id', '=', 'images.post_id');

                                })
                            ->select('posts.*', 'images.post_id', 'images.filePath','images.filename','images.thumb_filename')
                            ->groupBy('posts.id')
                            ->orderBy('posts.created_at','desc')->paginate(4);
        //                      $posts = Post::whereStatus(0)
        //                  ->orderBy('created_at', 'desc')//->simplepaginate(3);
        //                     ->paginate(4);
                            return view('posts.showpost_small', compact('posts'))->with('pagetitle',$pagetitle);
                    }

                                     
                    public function showMyposts($posttype)
                            {
                        if ($posttype == 'mydrafts'){
                             $pagetitle = 'My Draft Posts';
                            $status= 0;
                        }
                        else{
                             $pagetitle = 'My Posts';
                             $status= 1;
                        }
                             
                             // $pagetitle =config('site-c.title');
                              $tt = Auth::user()->name;
                                $posts =Post::whereStatus($status) ->where ('username',$tt)
                                        ->leftjoin('images', function ($join) {
                                    $join->on('posts.id', '=', 'images.post_id');

                                })
                            ->select('posts.*', 'images.post_id', 'images.filePath','images.filename','images.thumb_filename')
                            ->groupBy('posts.id')
                            ->orderBy('posts.created_at','desc')->paginate(4);
        //                      $posts = Post::whereStatus(0)
        //                  ->orderBy('created_at', 'desc')//->simplepaginate(3);
        //                     ->paginate(4);
                            return view('posts.showpost_small', compact('posts'))->with('pagetitle',$pagetitle);
                    }
                    
                     
                    
                    
                    
                    //                    public function showComments()
//                        {
//            //                 $comments =Comment::where ('username',$tt) ->join('posts', function ($join) {
//            //            $join->on('posts.id', '=', 'comments.post_id');
//            //                 
//            //        })
//            //            ->select('comments.*', 'posts.post_id', 'images.filePath')
//            //                ->groupBy('posts.id')
//            //            ->orderBy('posts.created_at','desc')
//            //        ->paginate(config('comsenblog.posts_per_mainpage'));
//
//
//                      $tt = Auth::user()->name;
//                      $comments = Comment::where ('username',$tt)->orderBy('created_at', 'desc') //->simplepaginate(3);
//                     ->paginate(config('comsenblog.posts_per_page'));
//                    return view('backend.posts.showcomments', compact('comments'));
//   
        }
