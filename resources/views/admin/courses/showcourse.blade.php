@extends('master')
@section('title', 'Course Info')
@section('content')

<header class="" style="">    
                  <div class="">
                        <p> <h1 class="page-header">Course Info</h1>                                                
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
<h3 class="header">{!! $course->name !!} at {!! $schoolname !!}</h3> 
{{ $course->school->name }}

<div class="row">
    <div class="col-sm-6">
        <em>Degrees offered: ({{ $course->bachelors }})  {{ $course->masters }} {{ $course->doctorate }} {{ $course->other_degree }}</em>
        <p><UL class="list-unstyled"> Department Information
    <li>Email:{!! $course->email !!} </li>
    <li>Phone: {!! $course->phone !!}</li>
    <li>Contact: {!! $course->contact !!}</li>  </p>
</ul>
    </div>
    <div class="col-sm-6">
        <ul class="list-unstyled">
       <h5 class="header">Faculty information </h5>
      @foreach ($faculties as $faculty)
            <p>        <li>
            <Span><a href="{!! action('Admin\SchoolsController@show', $faculty->id) !!}">{!! $faculty->name !!} </a> </span> </li>   
          <li>Email: {!! $faculty->email !!}  </li>
          <li>Phone: {!! $faculty->phone !!}  </li>
          <li>Contact: {{ $faculty->contact }}</li>
          <li>Head: {!! $faculty->faculty_head !!}</li>
                 
             </p>
      @endforeach
     </ul>
    </div>
</div>
    <div class="clearfix">

<p>  </p>
</div>


     <ul class="list-unstyled">
        <h4>Schools offering this course</h4>
      @foreach ($schools as $school)
        <p>        <li>
            <Span><a href="{!! action('Admin\SchoolsController@show', $school->sid) !!}">{!! $school->sname !!} </a> 
          <a href="{!! action('Admin\CoursesController@show', $school->id) !!}">{!! $school->bachelors !!} {!! $school->masters !!} 
              {!! $school->doctorate !!} {!! $school->other_degree !!} </a> 
            </span>
          
        </li>          </p>

      @endforeach
    </ul>


<ul class="list-unstyled">
       <p><h4>Job and career opportunities for {{$course->name }}</h4></p>

@foreach ( $courselist as $cl )
@foreach ( $cl->jobcategory as $courselists )

<li>{{ $cl->id." ".$courselists->id." ".$courselists->name }}</li>
@endforeach
@endforeach
  
    </ul><p>
    
    <h4>Potential employers for this course</h4></p>
<p>
<h4>external link--Some current job opportunities</h4></p>
</div>
@endsection