@extends('master')
@section('title')
@section('content')

<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Courses/Departments</h1>                                                
                        <span class="subheading"> </span>
                        </p>
                </div>
        </header>
@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif


  
  


@if ($courses->isEmpty())
<p> There are no courses that meet your criteria</p>
@else
<!-- Blog Entries Column -->         
                   
  
               
                   
            <div class="post-preview">
                <ul>
     
      @foreach ($courses as $course)
        <p>        <li>
            <Span><a href="{!! action('Admin\CoursesController@edit', $course->id) !!}">{!! $course->name !!} </a> 
          {!! $course->email !!} , {!! $course->phone !!}  {{ $course->contact }}, {!! $course->bachelors !!}.{!! $course->masters !!}.{!! $course->doctorate !!}.
          <em></em>
          <a href="{!! action('Admin\SchoolsController@show', $course->school_id) !!}">{!! $course->sname !!} </a>
           <a href="{!! action('Admin\FacultiesController@edit', $course->faculty_id) !!}">{!! $course->fname !!} </a>
           
           <a href="{!! action('Admin\CoursesController@edit', $course->id) !!}">Edit </a> 

            </span>
          
        </li>          </p>

      @endforeach
    </ul>              
                
            
    <hr>
  
  </div>

@endif
@endsection