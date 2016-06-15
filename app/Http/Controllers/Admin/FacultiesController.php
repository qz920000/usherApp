<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\FacultiesFormRequest;
use App\Faculty;
use App\School;
class FacultiesController extends Controller
{
    
    public function index(){
      //$faculties =Faculty::all();
     //   $schools =School::all(); 
        
        $faculties =Faculty::join('schools', 'faculties.school_id', '=', 'schools.id')
                ->select('faculties.*', 'schools.name as sname' )
                
            ->get();
       
        
      return view('admin.faculties.index',compact('faculties'));
//return view('checkout', array('title' => 'Welcome','description' => '','page' => 'home'));
}
  public function show(){
      $faculties =Faculty::all();
        $schools =School::all();        
      return view('admin.faculties.index',compact('faculties','schools'));
//return view('checkout', array('title' => 'Welcome','description' => '','page' => 'home'));
}
    
    
    public function create()
{ $schools =School::all();
              
return view('admin.faculties.create',compact('schools'));
//return view('admin.faculties.create', array('title' => 'Welcome','description' => '','page' => 'addfaculty'));
//return view('checkout', array('title' => 'Welcome','description' => '','page' => 'home'));
}

// public function store ()
          public function store (FacultiesFormRequest $request)
{

               $slug = uniqid();
               $schoolid = $request->get('schoolid');
               // $school = School::whereId($schoolid)->firstOrFail();
               $schoolname = School::whereId($schoolid)->value('name');

               $input = $request->all();

                //$input = $request->only('name', 'email');
               $insert = array();
            foreach($input['name'] as $key => $name) {
                    $slug = $name.$schoolname.uniqid();
                      // if( !empty( $name ) )
                       //{
                       // echo $key ." ".$name. "<br/>";
                           $insert[$key]['name'] = $name;
                           $insert[$key]['school_id'] = $schoolid;
                          $insert[$key]['slug'] = $slug;
                        // }
                       // $slug = "";
                       //}
            }
            
            foreach($input['email'] as $key => $email) {
                        // if( !empty( $email ) )
                      // {
                        $insert[$key]['email'] = $email;
                      // }
            }
            
           
            foreach($input['contact'] as $key => $contact) {
                        $insert[$key]['contact'] = $contact;
            }
            foreach($input['phone'] as $key => $phone) {
                        $insert[$key]['phone'] = $phone;
                       // $slug = "";
            }
           //var_dump ($insert);
             //            echo $insert[0]['email']. "         bbbbbbb <br/>";

            foreach($insert as $key => $name) {
             //  echo $insert[$key]['name']. "         xxxxxxx <br/>";
                 if( empty( $insert[$key]['name'] ) )
               {
                    // echo $insert[$key]['name']. "         emptyyyyyyyy <br/>";
               unset($insert[$key]);
               }
              // echo $insert[$key]['name']. "         yyyyyyy <br/>";
            }

            Faculty::insert($insert);
//                       var_dump ("<BR/>");
//             var_dump ($insert);
//             var_dump ("<BR/>");
//             var_dump ("<BR/>");
//            var_dump ("<BR/>");
            //var_dump ($input);
           
             return redirect()->route('add_faculty')->with('status',  'Items have been added!!');
                                // return redirect()->route('schoolshome')->with('status',  $request->get('name'). ' has been added!!');
            //return redirect(action('PostsController@showPreview', $post->id))->with('status', 'Your draft has been saved!');

        }
        
        
public function update($id, FacultiesFormRequest $request)              
{
        $faculties = Faculty::whereId($id)->firstOrFail();
        
//        if (Gate::denies('update-post', $post)) {
//            abort(403);
//        }
        $schoolname = School::whereId($request->get('schoolid'))->value('name');
         $schoolid = $request->get('schoolid');
         // $slug = $name.$schoolname.uniqid();
          
            $faculties->name  = $request->get('name');
            $faculties->email = $request->get('email');
            $faculties->phone = $request->get('phone');
            $faculties->fax = $request->get('fax');
            $faculties->address = $request->get('address');
            $faculties->address2 = $request->get('address2');
            $faculties->city = $request->get('city');
            $faculties->state = $request->get('state');
            $faculties->country = $request->get('country');
            $faculties->school_id = $request->get('schoolid');
            $faculties->shortname = $request->get('shortname');
            $faculties->altname = $request->get('altname');
            $faculties->collegename = $request->get('collegename');
            $faculties->altname = $request->get('altname');
            $faculties->faculty_head = $request->get('faculty_head');
            $faculties->contact = $request->get('contact');
            $faculties->slug = $request->get('name').$schoolname.uniqid();

            $faculties->save();
            //$post->categories()->sync($request->get('categories'));
            return redirect()->route('edit_faculty', [$faculties])->with('status', 'The School has been updated!');
//return view('about');
}


public function edit($id)
{
      // $schools =School::all();
       $faculties = Faculty::whereId($id)->firstOrFail();
       $school_id = Faculty::whereId($id)->value('school_id');
       $school= School::whereId($school_id)->firstOrFail();
//       $faculties =Faculty::whereId($id)->join('schools', 'faculties.school_id', '=', 'schools.id')
//                ->select('faculties.*', 'schools.name as sname' )                
//               ->get();
return view('admin.faculties.edit', compact('faculties','school'));
//       var_dump($id . "-----");
//         var_dump($school_id);
//         var_dump($schools);
}
}
