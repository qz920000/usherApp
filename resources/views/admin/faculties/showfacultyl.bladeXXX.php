@extends('master')
@section('title', 'Preview a post')
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


  
<div class="post-preview"><HR>
<h2 class="header">{!! $school->name !!}</h2>
<em>Post created at ({{ $school->founded }}), updated at {{ $school->city }} ,{{ $school->state }}</em>
           {{ $school->ownership_type }}.. {!! $school->owner_name !!}
<p> {!! $school->email !!}  {!! $school->phone !!}  {!! $school->fax !!}  </p>


    <div class="clearfix">

<p> {!! $school->religious_affiliation !!} </p>
</div>

   <ul>
       <h2 class="header">Colleges and courses</h2>
      @foreach ($faculties as $faculty)
        <p>        <li>
            <Span><a href="{!! action('Admin\SchoolsController@show', $school->id) !!}">{!! $faculty->name !!} </a> 
          {!! $faculty->email !!} , {!! $faculty->phone !!}  {{ $faculty->contact }}, {!! $faculty->faculty_head !!}.
          <em></em>
           {!! $school->name !!} <a href="{!! action('Admin\FacultiesController@edit', $faculty->id) !!}">Edit </a> 

            </span>
          
        </li>          </p>

      @endforeach
    </ul>
</div>
@endsection