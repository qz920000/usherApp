@extends('master-orig')
@section('title', 'School Info-'. $school->name)
@section('content')
<div class="well">
                    <h4>Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn btn-group-md">
                            <button class="btn btn-default  btn-lg" type="button">
                                &nbsp;<i class="glyphicon glyphicon-search"></i>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>
<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">{!! ucwords($school->longname) !!}</h1>                                                
                        <span class="subheading"> </span>
                        </p>
                </div>
        </header>

        
    @if(session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
@foreach($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach


  
<div class="post-preview">
     <div class="row">  <div class="col-lg-9">
 <h2 class="header">{!! ucwords($school->longname) !!}</h2> 
                           
                            
<em>Founded: ({{ $school->founded }}), Located at {{ ucwords($school->city) }} ,{{ucwords($school->state) }} State. </em>
           {{ ucwords($school->ownership_type) }} School.  {!! ucwords($school->owner_name) !!}
           <p><B>Email:</B> {!! $school->email !!} <B>Phone:</B> {!! $school->phone !!}<B>Website:</B>  {!! $school->website !!}  </p>
   
<p> <B>Religious Affiliation: </B>{!! $school->religious_affiliation=='y' ? 'Yes' : 'No' !!} </p>
</div>


<div class="col-lg-3"> <img src="{!! asset('/images/logos/'.$school->logo) !!}" alt="" class="img-responsive" height="100" width="100%" /></div>
</div>

   <ul>
       <h2 class="header">Colleges and courses</h2>
      @foreach ($faculties as $faculty)
        <p>        <li>
            <Span><h4><a href="{!! action('Admin\SchoolsController@show', $school->id) !!}">{!! $faculty->name !!} </a> </h4>
          {!! $faculty->email !!} , {!! $faculty->phone !!}  {{ $faculty->contact }}, {!! $faculty->faculty_head !!}.
          <em></em>
           {!! $school->name !!} <a href="{!! action('Admin\FacultiesController@edit', $faculty->id) !!}">Edit </a> 

            </span>
            
                     <ul>
               <h4 class="header"> Departments/Courses</h4>
              @foreach ($courses as $course)
               @if($course->faculty_id ==$faculty->id)
                <p>        <li>
                    <Span><a href="{!! action('Admin\CoursesController@show', $course->id) !!}">{!! $course->name !!} </a> 
                  {!! $course->email !!} , {!! $course->phone !!}  {{ $course->contact }}, {!! $course->bachelors !!}.
                  <em></em>{!! $course->masters !!}
                  @can('isAdmin')
                    <a href="{!! action('Admin\CoursesController@edit', $course->id) !!}">Edit </a> 
                @endcan
                    </span>
                </li>          </p>
@endif
              @endforeach
            </ul>
        </li>          </p>
   <HR>
   @endforeach
    </ul>
</div>
@endsection

@section('sidebar')
    @parent
    <div class="row">
        <LI><SPAN><B>facebook:</B>{!! ucwords($school_pr->facebook) !!}</SPAN></LI>
        <LI><SPAN><B>vc_name:</B>{!! ucwords($school_pr->vc_name) !!}</SPAN></LI>
        <LI><SPAN><B>accomodation:</B>{!! ucwords($school_pr->accomodation) !!}</SPAN></LI>
        <SPAN><B>accreditation status:</B>{!! $school_pr->accreditation_status=='y' ? "Accredited" : "Not accredited" !!}</SPAN>
                        <div class="col-lg-6">
                            
<ul class="list-unstyled">
<LI><SPAN><B>:</B>{!! ucwords($school->name) !!}</SPAN></LI>
<LI><SPAN><B>religiuos_affiliation:</B>{!! ucwords($school->religiuos_affiliation) !!}</SPAN></LI>
<LI><SPAN><B>univid:</B>{!! ucwords($school_pr->univid) !!}</SPAN></LI>
<LI><SPAN><B>undergraduate:</B>{!! ucwords($school_pr->undergraduate) !!}</SPAN></LI>
<LI><SPAN><B>postgraduate:</B>{!! ucwords($school_pr->postgraduate) !!}</SPAN></LI>
<LI><SPAN><B>dress_code:</B>{!! ucwords($school_pr->dress_code) !!}</SPAN></LI>
<LI><SPAN><B>school_setting:</B>{!! ucwords($school_pr->school_setting) !!}</SPAN></LI>
<LI><SPAN><B>Scholarship:</B>{!! ucwords($school_pr->scholarship_availability) !!}</SPAN></LI>
<LI><SPAN><B>library:</B>{!! ucwords($school_pr->library) !!}</SPAN></LI>

<LI><SPAN><B>gender_admission:</B>{!! ucwords($school_pr->gender_admission) !!}</SPAN></LI>
    </ul>
                        </div>
        <div class="col-lg-6">
            
                            <ul class="list-unstyled">
<LI><SPAN><B>admission_body:</B>{!! ucwords($school_pr->admission_body) !!}</SPAN></LI>
<LI><SPAN><B>jamb_cut_off:</B>{!! ucwords($school_pr->jamb_cut_off) !!}</SPAN></LI>
<LI><SPAN><B>student_size:</B>{!! ucwords($school_pr->student_size) !!}</SPAN></LI>
<LI><SPAN><B>instate_tuition:</B>{!! ucwords($school_pr->instate_tuition) !!}</SPAN></LI>
<LI><SPAN><B>outof state tuition:</B>{!! ucwords($school_pr->outof_state_tuition) !!}</SPAN></LI>
<LI><SPAN><B>financial_aid:</B>{!! ucwords($school_pr->financial_aid) !!}</SPAN></LI>
<LI><SPAN><B>distance_learning:</B>{!! ucwords($school_pr->distance_learning) !!}</SPAN></LI>
<LI><SPAN><B>online_classes:</B>{!! ucwords($school_pr->online_classes) !!}</SPAN></LI>
<LI><SPAN><B>accreditation:</B>{!! ucwords($school_pr->accreditation) !!}</SPAN></LI>
<LI><SPAN><B>student union:</B>{!! ucwords($school_pr->student_organizations) !!}</SPAN></LI>
<LI><SPAN><B>athletics body:</B>{!! ucwords($school_pr->athletics_body) !!}</SPAN></LI>
<LI><SPAN><B>sports facilities:</B>{!! ucwords($school_pr->sports_facilities) !!}</SPAN></LI>

</ul></div></div>
    <p> <button type="submit" name="save" value="saveschool" class="btn btn-primary">Save School</button>.</p>
@endsection
