@extends('master')
@section('title')
@section('content')
<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Edit Faculty/College </h1>                                                
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
                <label for="Name" class="col-lg-3 control-label">School Name</label>
                <div class="col-lg-6">
                <input type="hidden"  id="schoolid"  name="schoolid" value="{{ $faculties->school_id}}">{{ $faculties->school_id}}{!! $school->name !!}
                </div>
            </div>
            <div class="form-group">
                <label for="Name" class="col-lg-3 control-label">Faculty Name</label>
                <div class="col-lg-6">
                <input type="text" class="form-control" id="name" placeholder="School Name" name="name" value="{{ $faculties->name}}">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-lg-3 control-label">Email</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="email" placeholder="email" name="email" value="{{ $faculties->email}}">
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-lg-3 control-label">Phone</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="phone" placeholder="phone" name="phone" value="{{ $faculties->phone}}">
                </div>
            </div>
            <div class="form-group">
                <label for="fax" class="col-lg-3 control-label">fax</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="fax" placeholder="fax" name="fax" value="{{ $faculties->fax}}">
                </div>
            </div>
            <div class="form-group">
                <label for="contact" class="col-lg-3 control-label">Contact</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="contact" placeholder="contact" name="contact" value="{{ $faculties->contact}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="faculty_head" class="col-lg-3 control-label">Faculty head</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="faculty_head" placeholder="faculty head" name="faculty_head" value="{{ $faculties->faculty_head}}">
                </div>
            </div>
            
            
            <div class="form-group">
                <label for="address" class="col-lg-3 control-label">Address</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="address" placeholder="address" name="address" value="{{ $faculties->address}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="address2" class="col-lg-3 control-label">Address line 2</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="address" placeholder="address2" name="address2" value="{{ $faculties->address2}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="city" class="col-lg-3 control-label">City</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="city" placeholder="city" name="city" value="{{ $faculties->city}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="state" class="col-lg-3 control-label">State</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="state" placeholder="state" name="state" value="{{ $faculties->state}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="country" class="col-lg-3 control-label">Country</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="country" placeholder="country" name="country" value="{{ $faculties->country}}">
                </div>
            </div>
            

            <div class="form-group">
                <label for="longname" class="col-lg-3 control-label">Long Name</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="longname" placeholder="longname" name="longname" value="{{ $faculties->longname}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="shortname" class="col-lg-3 control-label">Abbreviation (e.g UI,  unilag)</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="shortname" placeholder="shortname" name="shortname" value="{{ $faculties->shortname}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="altname" class="col-lg-3 control-label">Other Name</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="altname" placeholder="altname" name="altname" value="{{ $faculties->altname}}">
                </div>
            </div>
            
       
            
          <div class="form-group">
                <label for="status" class="col-lg-3 control-label">Status</label>
                <div class="col-lg-6">
                    <select class="form-control" id="role" name="status" id="status">
                 
                     <option value="" >Select Status</option>
                     <option value="0" >inactive</option>
                     <option value="1" selected>active</option>
                     <option value="Private" >Private</option>
                 
                    </select>
                </div>
            </div>
            
                        
  
        
            <div class="form-group">
                <div class="col-lg-6 col-lg-offset-3">
                
                <button type="submit" name="save" value="updatefaculty" class="btn btn-primary">Update Faculty</button>
                </div>
            </div>
        </fieldset>
        </form>
    </div>
@endsection