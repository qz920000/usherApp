@extends('master')
@section('title')
@section('content')
<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Add Colleges/Faculties </h1>                                                
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


    <div class="well well bs-component">

        <form class="form-horizontal" method="post">

        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <input type="hidden" name="formtype" value="new">
        <fieldset>
            <div class="form-group">
                <label for="select" class="col-lg-3 control-label">School </label>
                    <div class="col-lg-6">
                        <select class="form-control" id="schoolid" name="schoolid">
                        @foreach($schools as $school)
                        <option value="{!! $school->id !!}" >{!! $school->name !!}
                        </option>
                        @endforeach
                        </select>
                    </div>

            </div>

            <div class="form-group">
                <label for="Name" class="col-lg-3 control-label">Faculty Name</label>
                <div class="col-lg-6">
                <input type="text" class="form-control" id="name" placeholder="School Name" name="name" value="{{ old('name') }}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="contact" class="col-lg-3 control-label">Contact</label>
                <div class="col-lg-6">
                <input type="text" class="form-control" id="contact" placeholder="contact" name="contact" value="{{ old('contact') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-lg-3 control-label">Email</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="email" placeholder="email" name="email" value="{{ old('email') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-lg-3 control-label">Phone</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="phone" placeholder="phone" name="phone" value="{{ old('phone') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="fax" class="col-lg-3 control-label">fax</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="fax" placeholder="fax" name="fax" value="{{ old('fax') }}">
                </div>
            </div>
            
           
            <div class="form-group">
                <label for="altname" class="col-lg-3 control-label">Other Name</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="altname" placeholder="altname" name="altname" value="{{ old('altname') }}">
                </div>
            </div>
            
           

            <div class="form-group">
                <div class="col-lg-6 col-lg-offset-3">
                <button type="submit" name="save" value="addanother" class="btn btn-primary" >Save and Add School</button>
                <button type="submit" name="save" value="saveschool" class="btn btn-primary">Save School</button>
                </div>
            </div>
        </fieldset>
        </form>
    </div>
@endsection