@extends('master')
@section('title', 'School Info-'. $school->name)
@section('content')
<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">School Info</h1>                                                
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
@section('sidebar')
    @parent

    <p> <button type="submit" name="save" value="saveschool" class="btn btn-primary">Save School</button>.</p>
@endsection

  
<div class="post-preview">
<h2 class="header">{!! ucwords($school->longname) !!}</h2>
<em>Founded: ({{ $school->founded }}), Located at {{ ucwords($school->city) }} ,{{ucwords($school->state) }} State</em>
           {{ ucwords($school->ownership_type) }} School.  {!! ucwords($school->owner_name) !!}
<p> {!! $school->email !!}  {!! $school->phone !!}  {!! $school->fax !!}  </p>


    <div class="clearfix">

<p> {!! $school->religious_affiliation !!} </p>
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
                  <em></em>
                   {!! $course->masters !!} <a href="{!! action('Admin\CoursesController@edit', $course->id) !!}">Edit </a> 

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