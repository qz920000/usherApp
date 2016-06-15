<?php

namespace App\Http\Controllers;

        use App\User;
        use App\Userprofile;
        use Auth;
        use App\Post;
         //use App\Image;
         use App\User_image as Appimage;
         use Illuminate\Http\Request;
         use App\Http\Requests\ImageUploadFormRequest;
         use Illuminate\Support\Facades\Input;
         use Carbon\Carbon;
          //use Guzzle\Tests\Plugin\Redirect;
         use Intervention\Image\Facades\Image ;
class ImageController extends Controller
{
 	/**
	 * Show the form for uploading a new resource.
	 *
	 * @return Response
	 */
	public function upload(){
		// Redirect to image upload form
             $images = Appimage::whereUser_id(Auth::user()->id)->get();
           //  $user = User::whereId(Auth::user()->id)->firstOrFail();
              $user = Userprofile::whereUser_id(Auth::user()->id)->firstOrFail();
             //$image = appimage::find($id);
           //$post = Post::whereId($id)->firstOrFail();
            return view('images/imageupload', compact('images','user'));
   	}

	/**
	 * Store a newly uploaded resource in storage.
	 *
	 * @return Response
	 */
	public function storeImage(Request $request){
		// Store records process
             $image = new Image();
        $this->validate($request, [
            //'title' => 'required',
            'image' => 'required'
        ]);
//        $image->title = $request->title;
//        $image->description = $request->description;
             $image->title = '$post->title';
        $image->description = 'image';
		if($request->hasFile('image')) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            
            $name = $timestamp. '-' .$file->getClientOriginalName();
            
            $image->filePath = $name;
            $image->post_id = $request->post_id;
            

            $file->move(public_path().'/images/', $name);
        }
        $image->save();
        //return $this->create()->with('success', 'Image Uploaded Successfully');
        \Session::flash('message', 'Successfully updated!');
	return redirect()->back()->with('status', 'Image Uploaded Successfully!');
   	}
        
//        	public function store(Request $request){
//		// Store records process
//             $image = new Image();
//        $this->validate($request, [
//            'title' => 'required',
//            'image' => 'required'
//        ]);
//        $image->title = $request->title;
//        $image->description = $request->description;
//		if($request->hasFile('image')) {
//            $file = Input::file('image');
//            //getting timestamp
//            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
//            
//            $name = $timestamp. '-' .$file->getClientOriginalName();
//            
//            $image->filePath = $name;
//
//            $file->move(public_path().'/images/', $name);
//        }
//        $image->save();
//        return $this->create()->with('status', 'Image Uploaded Successfully');
//        
//	
//   	}
        
        public function store (ImageUploadFormRequest $request)
        {
                                       if($request->hasFile('image')) {
                                           $Appimage = new AppImage();
                 $appimage = new AppImage();
                $appimage->title = '';//$post->id->value(title);
                $appimage->description = 'image';
                    $img = Image::make(Input::file('image'))->resize(300, 200);
                    $thumb_img = Image::make(Input::file('image'))->resize(200, 200);
                    $file = Input::file('image');
                    //getting timestamp
                    $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

                    $name = Auth::user()->name.'-'.$timestamp. '-' .$file->getClientOriginalName();  
                    $thumbname 	= 	'thumb_'. $name;
                    $smallname 	= 	'small_'. $name;
                    $appimage->filePath = $name;
                    $appimage->filename = $name;
                   // $appimage->post_id = $id;
                    $appimage->original_filename = $file->getClientOriginalName();     
                     $appimage->thumb_filename = $thumbname;
                    $appimage->user_id=Auth::user()->id;
                    $appimage->username=Auth::user()->name;
                    //$appimage->main_image=
                    $appimage->thumb_filepath='\images\thumbs\\';
 
                    $file->move(public_path().'/images/', $name);
                    
                    $thumb_img->save(public_path().'\images\thumbs\\'.$thumbname);
                    $img->save(public_path().'\images\small\\'.$smallname);
                    
                $appimage->save();
                $cc= $appimage::where('username', '=', Auth::user()->name)->count();
                echo $cc;
                echo $appimage->id;
                if ($cc ==1){
                     $upd_main_img =Userprofile::where('user_id', Auth::user()->id)
                                ->update(['main_image_id' => $appimage->id,'main_image' => $name]);
                }
                      //  $count = User::where('votes', '>', 100)->count();
               
              
                }
             return redirect()->back()->with('status', 'Image uploaded Successfully!');
               // return redirect()->route($route_name, [$post_id])->with('status', $status_message,'pagetitle',$title);
               // return redirect->route('mypost')->with('status', 'Your post has been published!!');
        //var_dump(Input::all());
          }
          
    public function create()
    {
        return view('images/imageupload');
        //return view('backend.posts.create');
       // $categories = Category::all();
         //return view('backend.posts.create', compact('categories'));
    }

    /**
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function show(Request $request){
		// Show lists of the images
             $images = Image::all();
        return view('images/showlists', compact('images'));
    }
    
    public function getDelete($id)
  {
    $image = appimage::find($id);
    $image->delete();
    //return Redirect::route('show_album',array('id'=>$image->album_id));
    return redirect()->back()->with('status', 'Image getdeleted Successfully!');
  }
  
    public function setMainImage($id)
  {
    $image = appimage::find($id);
    $upd_main_img =Userprofile::where('user_id', Auth::user()->id)
                                ->update(['main_image_id' => $image->id,'main_image' => $image->filename]);
                            //    ->update(['website' => $image->id,'phone' => $image->thumb_filename]);
   // $image->delete();
    //return Redirect::route('show_album',array('id'=>$image->album_id));
    return redirect()->back()->with('status', 'Main Image set Successfully!');
  }
   public function destroy2($id)
    {
           //  $images = Image::all();
      //  return view('images/showlists', compact('images'));
        $images =Image::destroy($id);
        return redirect()->back()->with('status', 'Image deleted Successfully!');
    }
}
