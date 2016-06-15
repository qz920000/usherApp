@extends('master')
@section('title')
@section('content')
<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Select a School to Edit </h1>                                                
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
                <input type="text" class="form-control" id="name" placeholder="School Name" name="name" value="{{ $schools->name}}">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-lg-3 control-label">Email</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="email" placeholder="email" name="email" value="{{ $schools->email}}">
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-lg-3 control-label">Phone</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="phone" placeholder="phone" name="phone" value="{{ $schools->phone}}">
                </div>
            </div>
            <div class="form-group">
                <label for="fax" class="col-lg-3 control-label">fax</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="fax" placeholder="fax" name="fax" value="{{ $schools->fax}}">
                </div>
            </div>
            <div class="form-group">
                <label for="website" class="col-lg-3 control-label">website</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="website" placeholder="website" name="website" value="{{ $schools->website }}">
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-lg-3 control-label">Address</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="address" placeholder="address" name="address" value="{{ $schools->address}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="address2" class="col-lg-3 control-label">Address line 2</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="address" placeholder="address2" name="address2" value="{{ $schools->address2}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="city" class="col-lg-3 control-label">City</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="city" placeholder="city" name="city" value="{{ $schools->city}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="state" class="col-lg-3 control-label">State</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="state" placeholder="state" name="state" value="{{ $schools->state}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="country" class="col-lg-3 control-label">Country</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="country" placeholder="country" name="country" value="{{ $schools->country}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="founded" class="col-lg-3 control-label">Year Founded</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="founded" placeholder="founded" name="founded" value="{{ $schools->founded}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="longname" class="col-lg-3 control-label">Long Name</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="longname" placeholder="longname" name="longname" value="{{ $schools->longname}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="shortname" class="col-lg-3 control-label">Abbreviation (e.g UI,  unilag)</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="shortname" placeholder="shortname" name="shortname" value="{{ $schools->shortname}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="altname" class="col-lg-3 control-label">Other Name</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="altname" placeholder="altname" name="altname" value="{{ $schools->altname}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="ownership_type" class="col-lg-3 control-label">Ownership Type</label>
                <div class="col-lg-6">
                    <select class="form-control" id="ownership_type" name="ownership_type" id="ownership_type">
                 
                     <option value="" >Select ownership</option>
                     <option  @if($schools->ownership_type == "Federal Government") selected="selected" @endif 
                               value="Federal Government" >Federal Government</option>
                     <option @if($schools->ownership_type == "State Government") selected="selected" @endif 
                              value="State Government" >State Government</option>
                     <option @if($schools->ownership_type == "Private") selected="selected" @endif 
                              value="Private" >Private</option>
                 
                    </select>
                </div>
            </div>
            
                        
            <div class="form-group">
                <label for="religious_affiliation" class="col-lg-3 control-label">Religious Affiliation</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="religious_affiliation" placeholder="religious_affiliation" name="religious_affiliation" value="{{ $schools->religious_affiliation}}">
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
                <label for="owner_name" class="col-lg-3 control-label">Owner</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="owner_name" placeholder="Owner Name" name="owner_name" value="{{  $schools->owner_name }}">
                </div>
            </div>
        
            <div class="form-group">
                <div class="col-lg-6 col-lg-offset-3">
                
                <button type="submit" name="save" value="updateschool" class="btn btn-primary">Update School</button>
                </div>
            </div>
        </fieldset>
        </form>
    </div>
@endsection