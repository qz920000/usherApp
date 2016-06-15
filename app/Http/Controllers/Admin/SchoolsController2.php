<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolFormRequest;
use App\School;
use App\School_profile;
use App\Faculty;

class SchoolsController extends Controller
{
    public function create()
        {
        return view('admin.schools.create', array('title' => 'Welcome','description' => '','page' => 'addschool'));
        //return view('checkout', array('title' => 'Welcome','description' => '','page' => 'home'));
        }
        
        public function index()
            {
                  $schools =School::all();

            return view('admin.schools.index',compact('schools'));
            //return view('checkout', array('title' => 'Welcome','description' => '','page' => 'home'));
            }

  public function store (SchoolFormRequest $request)
        {
               $buttonval = $request->get('save');
               $slug = uniqid();

                //    echo "publish";
                $school= new School(array(
                     'name'	 => $request->get('name'),
                    'email' => $request->get('email'),
                    'phone' => $request->get('phone'),
                    'fax' => $request->get('fax'),
                    'website' => $request->get('website'),
                    'address' => $request->get('address'),
                    'address2' => $request->get('address2'),
                    'city' => $request->get('city'),
                    'state' => $request->get('state'),
                    'country' => $request->get('country'),
                    'founded' => $request->get('founded'),
                    'shortname' => $request->get('shortname'),
                    'longname' => $request->get('longname'),
                    'altname' => $request->get('altname'),
                    'ownership_type' => $request->get('ownership_type'),
                    'religious_affiliation' => $request->get('religious_affiliation'),
                     'status'  => 1,
                      // 'owner_name' => $request->get('owner_name'),
                 //'' => $request->get('tags'),
                  // 'category_id'=> $request->get('category_id'),
                 //'user' => Auth::user()->id,
                 //'entered_by' => Auth::user()->name,
                   //  'useremail' => Auth::user()->email,

                //     'user_id' => $request->get('user_id'),
                'slug' => $slug,
                ));
                 $school->save();
                 $school_id =$school->id;
                 //insert schoolid into school profile table for later updates
                $school_profile = new School_profile(array(
                     'univid'	 => $school_id,));

                 $school_profile->save();

                //$post_id =$post->id;
                if ($buttonval == 'addanother'){
                //$posts = Post::where ('username',Auth::user()->name,) ;
                return redirect()->route('add_school')->with('status',  $request->get('name'). ' has been added!!');
               // return redirect->route('mypost')->with('status', 'Your post has been published!!');
            }
            else{
               // echo "save val";
                return redirect()->route('schoolshome')->with('status',  $request->get('name'). ' has been added!!');
            //return redirect(action('PostsController@showPreview', $post->id))->with('status', 'Your draft has been saved!');

            }

        }
//          
        public function show($id)
        {

             $school = School::whereId($id)->firstOrFail();
             $faculties= $school->faculty()->get();
             $courses= $school->course()->get();
             $school_pr = School_profile::whereUnivid($id)->firstOrFail();

        //     $courses =Course::join('faculties', 'courses.faculty_id', '=', 'faculties.id')
        //                 ->join('schools', 'courses.school_id', '=', 'schools.id')
        //                ->select('courses.*', 'faculties.name as fname','schools.name as sname' )                
        //                ->get();      
        //       $faculties =Faculty::leftjoin('courses', 'faculties.id', '=','courses.faculty_id' )
        ////                ->select('faculties.*', 'courses.*' ) 
        //->select('faculties.*', 'courses.name as cname,courses.contact as ccontact,courses.email as cemail,courses.phone as cphone,courses.*' )                
        //                ->where('faculties.School_id', '=', $id)->get();
        //       $faculties =Faculty::leftjoin('courses', function ($join) {
        //            $join->on('courses.faculty_id', '=', 'faculties.id');
        //                         })->where('faculties.School_id', '=', $id)
        //        ->get();

        //      ;
        return view('admin.schools.showschool',compact('school','school_pr','faculties','courses'));
        }


        public function update($id, SchoolFormRequest $request)              
        {
                $school = School::whereId($id)->firstOrFail();

        //        if (Gate::denies('update-post', $post)) {
        //            abort(403);
        //        }

                    $school->name  = $request->get('name');
                    $school->email = $request->get('email');
                    $school->phone = $request->get('phone');
                    $school->fax = $request->get('fax');
                    $school->website = $request->get('website');
                    $school->address = $request->get('address');
                    $school->address2 = $request->get('address2');
                    $school->city = $request->get('city');
                    $school->state = $request->get('state');
                    $school->country = $request->get('country');
                    $school->founded = $request->get('founded');
                    $school->shortname = $request->get('shortname');
                    $school->longname = $request->get('longname');
                    $school->altname = $request->get('altname');
                    $school->ownership_type = $request->get('ownership_type');
                    $school->religious_affiliation = $request->get('religious_affiliation');

                    $school->save();
                    //$post->categories()->sync($request->get('categories'));
                    return redirect()->route('schoolshome')->with('status', 'The School has been updated!');
        //return view('about');
        }


        public function edit($id)
        {
              $schools = School::whereId($id)->firstOrFail();
                return view('admin.schools.edit', compact('schools'));
        }
        public function editSchoolProfile($id)
        {
              $schools = School_profile::whereUnivid($id)->firstOrFail();
                return view('admin.schools.editprofile', compact('schools'));
        }


        public function updateSchoolProfile($id, Request $request)              
        {
                $school = School_profile::whereUnivid($id)->firstOrFail();

        //        if (Gate::denies('update-post', $post)) {
        //            abort(403);
        //        }

                $school->accreditation_status= $request->get('accreditation_status');
                $school->undergraduate= $request->get('undergraduate');
                $school->postgraduate= $request->get('postgraduate');
                $school->dress_code= $request->get('dress_code');
                $school->school_setting = $request->get('school_setting');
                $school->scholarship_availability= $request->get('scholarship_availability');
                $school->accomodation= $request->get('accomodation');
                $school->admission_selection= $request->get('admission_selection');
                $school->student_size= $request->get('student_size');
                $school->facebook= $request->get('facebook');
                $school->twitter= $request->get('twitter');

                    $school->save();
                    //$post->categories()->sync($request->get('categories'));
                    return redirect()->route('schoolshome')->with('status', 'The School has been updated!');
        //return view('about');
        }



}
