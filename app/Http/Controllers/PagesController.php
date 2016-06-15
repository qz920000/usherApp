<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entry;
use App\Post;

class PagesController extends Controller
{
    public function home()
{
//return view('welcome');
        return view('home');
}
public function about()
{
return view('about');
}
public function contact()
{
return view('contact');
}
public function services()
{
return view('services');
}
public function terms()
{
return view('terms');
}
public function search(Request $request)
{ $stextstring = $request->get('searchtext');
//->where('votes', '>', 100)
//                    ->orWhere('name', 'John')
//->where('name', 'like', 'T%')
$posts = Post::where ('content','like','%'. $request->get('searchtext') .'%')
        ->orWhere('title','like','%'. $request->get('searchtext') .'%')
        ->orderBy('created_at', 'desc')  //->simplepaginate(3);
        ->paginate(10);
        return view('searchresults', compact('posts'))->with('rr', $request->get('searchtext'));;
//return view('about2');
}
public function blog()
{
return view('contact2');
}

         public function show_subentry($name)
                    {
                        // check link iv f bot r found.. page 4040
                         //$category = Category::whereName($name)->firstOrFail();
                           $entry = Entry::whereSubentry($name)->firstOrFail();
                              $pagetitle = $name;
                            //  $eeff ='dddd';
                           //   $pagetitle =config('site-c.title');
        //                      echo $name;
        //                      echo $categorya->name;
                            // var_dump ($categorya); 
                             // $tt = Auth::user()->name;
                              $posts = Post::whereEntry_id($entry->id)
                                      ->whereStatus(1)
                                      ->orderBy('created_at', 'desc')//->simplepaginate(3);
                                      ->paginate(4);
                            return view('posts.showpost_small', compact('posts'))->with('pagetitle',$pagetitle);
                    }
                    
         public function show_entry($name)
                    {
                        // check link iv f bot r found.. page 4040
                         //$category = Category::whereName($name)->firstOrFail();
                           $entry = Entry::whereName($name)->firstOrFail();
                              $pagetitle = $name;
                            //  $eeff ='dddd';
                           //   $pagetitle =config('site-c.title');
        //                      echo $name;
        //                      echo $categorya->name;
                            // var_dump ($categorya); 
                             // $tt = Auth::user()->name;
                              $posts = Post::whereEntry_id($entry->id)
                                      ->whereStatus(1)
                                      ->orderBy('created_at', 'desc')//->simplepaginate(3);
                                      ->paginate(4);
                            return view('posts.showpost_small', compact('posts'))->with('pagetitle',$pagetitle);
                    }
                    
               public function show_external($name)
                    {
                        // check link iv f bot r found.. page 4040
                         //$category = Category::whereName($name)->firstOrFail();
                          // $entry = Entry::whereName($name)->firstOrFail();
                              $pagetitle = $name;
                              //$site = 'http://www.nysc.gov.ng';
                              // $site ='http://mynecoexams.com/';
                            //   $site ='http://nuc.edu.ng/;
                              // $site ='http://www.jamb.gov.ng/home.aspx';
                       switch($name) {
                            case 'nysc':
                                $site = 'http://www.nysc.gov.ng';
                                break;
                            case 'neco':
                                $site ='http://mynecoexams.com/';
                                break;
                            case 'nuc':
                                 $site ='http://nuc.edu.ng/';
                                break;
                            case 'jamb':
                               $site ='http://www.jamb.gov.ng/home.aspx';
                                break;
                           
                        }
                           
                            return view('external')->with('site',$site,'pagetitle',$pagetitle);
                    }
                    
}
