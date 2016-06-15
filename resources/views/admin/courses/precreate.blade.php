@extends('master')
@section('title')
@section('content')
<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Add Courses/Departments</h1>                                                
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

@if ($schools->isEmpty())
<p> There are no faculties in the database</p>
@else
     <div class="well well bs-component">
        <form class="form-horizontal" method="post">

        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
                 <label for="select" class="col-lg-3 control-label">Select school </label>
                    <div class="col-lg-4">
                       
                        <select class="form-control" id="schoolid" name="schoolid">
                            <option value="" >Select school</option>
                        @foreach($schools as $school)
                        <option value="{!! $school->id !!}" >{!! $school->name !!}
                        </option>
                        @endforeach
                        </select>                       
                    </div>            
        </div>
        

        
   <div class="form-group">
                <div class="col-lg-6 col-lg-offset-3">
            
                <button type="submit" name="save" value="savefaculty" class="btn btn-primary">continue....</button>
                </div>
            </div>
        </fieldset>
        </form>
    </div>
@endif
@endsection