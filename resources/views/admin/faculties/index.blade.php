@extends('master')
@section('title')
@section('content')

<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Faculties/Colleges</h1>                                                
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


  
  


@if ($faculties->isEmpty())
<p> There are no faculties in the database</p>
@else
<!-- Blog Entries Column -->         
                   
  
               
                   
            <div class="post-preview">
                <ul>
     
      @foreach ($faculties as $faculty)
        <p>        <li>
            <Span><a href="{!! action('Admin\FacultiesController@edit', $faculty->id) !!}">{!! $faculty->name !!} </a> 
          {!! $faculty->email !!} , {!! $faculty->phone !!}  {{ $faculty->contact }}, {!! $faculty->faculty_head !!}.
          <em></em>
          <a href="{!! action('Admin\SchoolsController@show', $faculty->school_id) !!}">{!! $faculty->sname !!} </a>
           
           <a href="{!! action('Admin\FacultiesController@edit', $faculty->id) !!}">Edit </a> 

            </span>
          
        </li>          </p>

      @endforeach
    </ul>              
                
            
    <hr>
  
  </div>

@endif
@endsection