<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CoursesFormRequest;
use App\Http\Requests\FacultiesFormRequest;
use App\Http\Requests\SelectSchoolFormRequest;
use App\Faculty;
use App\School;
use App\Course;
use App\Courselist;
use App\Jobcategory;

class CoursesController extends Controller
{
     public function index(){
          //$faculties =Faculty::all();
         //   $schools =School::all(); 

        $courses =Course::join('faculties', 'courses.faculty_id', '=', 'faculties.id')
                 ->join('schools', 'courses.school_id', '=', 'schools.id')
                ->select('courses.*', 'faculties.name as fname','schools.name as sname' )                
                ->get();      
//        $faculties =Faculty::join('schools', 'faculties.school_id', '=', 'schools.id')
//                ->select('faculties.*', 'schools.name as sname' )                
//                ->get(); 
        
              return view('admin.courses.index',compact('courses'));
        //return view('checkout', array('title' => 'Welcome','description' => '','page' => 'home'));
        }
        
      public function show($id)
              {
                $course = Course::whereId($id)->firstOrFail();
                

              // $school= School::whereName($course->name)->get();
                 $faculties =Faculty::whereId($course->faculty_id)->get();
                 $ssc=Course::whereName($course->name)->lists('school_id');
                  $ssc2=Course::whereCourselist_id($course->courselist_id)->lists('school_id');
                 $courselist=Courselist::whereName($course->name)->get();
                 //$schools = School::whereIn('id', $ssc) ->get();
                 $schoolname= School::whereId($course->school_id)->value('name');
                 //$jcs = Jobcategory::whereId($course->jobcategory_id)->value('name');
                 /*query to get schools offering the course*/
                 $schools =Course::join('schools', 'courses.school_id', '=', 'schools.id')
                         ->whereIn('schools.id', $ssc2)//where('schools.id','in', '$ssc')
                         ->where('courses.name', '=', $course->name)
                ->select('courses.*','schools.id as sid','schools.name as sname' )                
                ->get(); 
                 //$sscid=
                 // $schools = School::whereId($ssc)->get();
                // $schools_with_course = $course->school_id()->get();//lists('id')->toArray();
               //  whereId($schoolid)->value('name');
                 //var_dump($schools ."<BR/>"); var_dump($faculties ."<BR/>");;;;;;; var_dump($ssc ."<BR/>");
              return view('admin.courses.showcourse',compact('course','schools','faculties','courselist'))->with('schoolname', $schoolname);
                //return view('checkout', array('title' => 'Welcome','description' => '','page' => 'home'));
            }
    
      public function pre_create()
            { 
                $schools =School::all();
                  
                return view('admin.courses.precreate',compact('schools'));
           }  
           
           public function pre_create2(SelectSchoolFormRequest $request)
            { 
               // $schools =School::all();
                     //  if (!$request->isEmpty()){
                     $schoolid = $request->get('schoolid');
                    // $faculties =Faculty::all();
                    $faculties =Faculty::whereSchool_id($schoolid)->firstOrFail();
                      return redirect()->route('add_course', [$schoolid]);
                   // return redirect('admin.courses.create', [$faculties]);
                    //return view('admin.courses.create',compact('faculties'));
                    //return view('checkout', array('title' => 'Welcome','description' => '','page' => 'home'));
             //   var_dump($schoolid);
        //               }
//               else { var_dump("$schoolid");
//               
//               }
            }
               
  //  public function create( $id,SelectSchoolFormRequest $request)
            
                public function create( $id)
{ 
                    $schools =School::whereId($id)->firstOrFail();
                        // $schoolid = $request->get('school');
                       //  $faculties =Faculty::all();
                    $faculties =Faculty::whereSchool_id($id)->get();

                return view('admin.courses.create',compact('schools','faculties'));
                //return view('admin.faculties.create', array('title' => 'Welcome','description' => '','page' => 'addfaculty'));
                //return view('checkout', array('title' => 'Welcome','description' => '','page' => 'home'));
                }
            
            
               public function store (FacultiesFormRequest $request)
                    {
                           $slug = uniqid();
                           $schoolid = $request->get('schoolid');
                           $facultyid = $request->get('facultyid');
                           // $school = School::whereId($schoolid)->firstOrFail();
                           $schoolname = School::whereId($schoolid)->value('name');
                            //    echo "publish";
                           $input = $request->all();

                           $insert = array();
                    foreach($input['name'] as $key => $name) {

                        $slug = $name.$schoolname.uniqid();
                        $insert[$key]['name'] = $name;
                        $insert[$key]['faculty_id'] = $facultyid;
                        $insert[$key]['slug'] = $slug;
                        $slug = "";
                    }
                    foreach($input['email'] as $key => $email) {
                        $insert[$key]['email'] = $email;
                    }
                    foreach($input['contact'] as $key => $contact) {
                        $insert[$key]['contact'] = $contact;
                    }
                    foreach($input['phone'] as $key => $phone) {
                        $insert[$key]['phone'] = $phone;
                    }
                    foreach($input['bachelors'] as $key => $bachelors) {
                        $insert[$key]['bachelors'] = $bachelors;
                    }
                    foreach($input['masters'] as $key => $masters) {
                        $insert[$key]['masters'] = $masters;
                    }
                    foreach($input['doctorate'] as $key => $doctorate) {
                        $insert[$key]['doctorate'] = $doctorate;
                    }
                   foreach($input['degree1'] as $key => $degree1) {
                        $insert[$key]['other_degree'] = $degree1;
                    }
                     foreach($input['schoolid'] as $key => $schoolid) {
                        $insert[$key]['school_id'] = $schoolid;
                    }
                    Course::insert($insert);
                         //  $facultys->insert();
                           // var_dump ($schoolid." ----" .$schoolname);
                             //    var_dump ($input);
                          // var_dump($facultys->count());
                          //  return redirect()->route('create_')->with('status',  'Courses have been added!!');
                     return redirect()->route('add_course', [$schoolid])->with('status',  'Courses have been added!!');
                           // return redirect->route('mypost')->with('status', 'Your post has been published!!');
                    }
                    
public function update($id, FacultiesFormRequest $request)              
{
        $courses = Course::whereId($id)->firstOrFail();
        
//        if (Gate::denies('update-post', $post)) {
//            abort(403);
//        }
         $schoolname = School::whereId($request->get('schoolid'))->value('name');
         $facultyid = $request->get('facultyid');
         // $slug = $name.$schoolname.uniqid();
          
            $courses->name  = $request->get('name');
            $courses->email = $request->get('email');
            $courses->phone = $request->get('phone');
            $courses->bachelors = $request->get('bachelors');
            $courses->masters = $request->get('masters');
            $courses->doctorate = $request->get('doctorate');
            $courses->other_degree = $request->get('degree1');
            $courses->contact = $request->get('contact');
            $courses->slug = $request->get('name').$schoolname.uniqid();

            $courses->save();
            //$post->categories()->sync($request->get('categories'));
            return redirect()->route('courseshome', [$courses])->with('status', 'The course has been updated!');
//return view('about');
}


public function edit($id)
{
  
       $courses = Course::whereId($id)->firstOrFail();
       $schoolid = Course::whereId($id)->value('school_id');
    
       $faculties =Faculty::whereSchool_id($schoolid)->get();
       $schools =School::whereId($schoolid)->firstOrFail();
      //var_dump($schoolid); 
return view('admin.courses.edit', compact('faculties','courses','schools'));
}
}
