@extends('master')
@section('title')
@section('content')

<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">All Schools</h1>                                                
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
@section('sidebar')
    @parent

    <p>This is appended to the master sidebar from .</p>
@endsection

  
  


@if ($schools->isEmpty())
<p> There are no schools in the database</p>
@else
<!-- Blog Entries Column -->         
                   
  
               
                   
            <div class="post-preview">
                <ul>
      @foreach ($schools as $school)
        <p>        <li><a href="{!! action('Admin\SchoolsController@show', $school->id) !!}">{!! $school->name !!} </a> is a
          {!! $school->ownership_type !!} school,  founded in {!! $school->founded !!}. It is located in  {{ $school->city }}, {!! $school->state !!} state.
          <em></em>
           {!! $school->name !!} <a href="{!! action('Admin\SchoolsController@edit', $school->id) !!}">Edit </a> 
            {!! $school->name !!} <a href="{!! action('Admin\SchoolsController@editSchoolProfile', $school->id) !!}">Edit School Profile </a> 
         
            
          </p>
          
        </li>
      @endforeach
    </ul>
    <hr>
  
  </div>

@endif
@endsection