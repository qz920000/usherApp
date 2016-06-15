@extends('master')
@section('title')
@section('content')
<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Edit Other School Attributes</h1>                                                
                        <span class="subheading">{{$schools->name }}</span>
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
        
        <fieldset>




 <div class="form-group">
                <label for="school_setting" class="col-lg-3 control-label">school_setting</label>
                <div class="col-lg-6">
                    <select class="form-control" name="school_setting" id="school_setting">
                 
                     <option value="" >Select </option>
                     <option  @if($schools->school_setting == "Urban") selected="selected" @endif 
                               value="Urban" >Urban</option>
                      <option  @if($schools->school_setting == "Suburban") selected="selected" @endif 
                               value="Suburban" >Suburban</option>
                     <option @if($schools->school_setting == "Rural") selected="selected" @endif 
                              value="Rural" >Rural</option>                                   
                    </select>
                </div>
            </div>

<div class="form-group">
                <label for="admission_selection" class="col-lg-3 control-label">admission_selection</label>
                <div class="col-lg-6">
                    <select class="form-control" name="admission_selection" id="admission_selection">
                 
                     <option value="" >Select </option>
                     <option  @if($schools->admission_selection == "JAMB") selected="selected" @endif 
                               value="JAMB" >JAMB</option>
                     <option @if($schools->admission_selection == "Other") selected="selected" @endif 
                              value="Other" >Other</option>
                                   
                    </select>
                </div>
            </div>



 <div class="form-group">
                <label for="accomodation" class="col-lg-3 control-label">Campus Accomodation</label>
                <div class="col-lg-6">
                    <select class="form-control" name="accomodation" id="accomodation">
                 
                     <option value="" >Select </option>
                     <option  @if($schools->accomodation == "Yes-Compulsory") selected="selected" @endif 
                               value="Yes-Compulsory" >Yes-Compulsory</option>
                     <option  @if($schools->accomodation == "Yes-Optional") selected="selected" @endif 
                               value="Yes-Optional" >Yes-Optional</option>
                     <option @if($schools->accomodation == "No") selected="selected" @endif 
                              value="No" >No</option>
                                   
                    </select>
                </div>
            </div>

 <div class="form-group">
                <label for="undergraduate" class="col-lg-3 control-label">undergraduate</label>
                <div class="col-lg-6">
                    <select class="form-control" name="undergraduate" id="undergraduate">
                 
                     <option value="" >Select </option>
                     <option  @if($schools->undergraduate == "Yes") selected="selected" @endif 
                               value="Yes" >Yes</option>
                     <option @if($schools->undergraduate == "No") selected="selected" @endif 
                              value="No" >No</option>
                                   
                    </select>
                </div>
            </div>
<div class="form-group">
                <label for="postgraduate" class="col-lg-3 control-label">Postgraduate</label>
                <div class="col-lg-6">
                    <select class="form-control" name="postgraduate" id="postgraduate">
                 
                     <option value="" >Select </option>
                     <option  @if($schools->postgraduate == "Yes") selected="selected" @endif 
                               value="Yes" >Yes</option>
                     <option @if($schools->postgraduate == "No") selected="selected" @endif 
                              value="No" >No</option>                                   
                    </select>
                </div>
            </div>
 <div class="form-group">
                <label for="scholarship_availability" class="col-lg-3 control-label">scholarship_availability</label>
                <div class="col-lg-6">
                    <select class="form-control" name="scholarship_availability" id="scholarship_availability">
                 
                     <option value="" >Select </option>
                     <option  @if($schools->scholarship_availability == "Yes") selected="selected" @endif 
                               value="Yes" >Yes</option>
                     <option @if($schools->scholarship_availability == "No") selected="selected" @endif 
                              value="No" >No</option>
                                   
                    </select>
                </div>
            </div>

 <div class="form-group">
                <label for="dresscode" class="col-lg-3 control-label">Dress Code</label>
                <div class="col-lg-6">
                    <select class="form-control" name="dresscode" id="dresscode">
                 
                     <option value="" >Select </option>
                     <option  @if($schools->dresscode == "Yes") selected="selected" @endif 
                               value="Yes" >Yes</option>
                     <option @if($schools->dresscode == "No") selected="selected" @endif 
                              value="No" >No</option>                                   
                    </select>
                </div>
            </div>

 <div class="form-group">
                <label for="accreditation_status" class="col-lg-3 control-label">Accreditation status</label>
                <div class="col-lg-6">
                    <select class="form-control" name="accreditation_status" id="accreditation_status">
                 
                     <option value="" >Select </option>
                     <option  @if($schools->accreditation_status == "Accredited") selected="selected" @endif 
                               value="Accredited" >Accredited</option>
                     <option @if($schools->accreditation_status == "Pending") selected="selected" @endif 
                              value="Pending" >Pending</option>
                     <option @if($schools->accreditation_status == "Not accredited") selected="selected" @endif 
                              value="Not accredited" >Not accredited</option>
                 
                    </select>
                </div>
            </div>

            
            <div class="form-group">
                <label for="student_size" class="col-lg-3 control-label">student_size</label>
                <div class="col-lg-6">
                <input type="text" class="form-control" id="student_size" placeholder="student_size" name="student_size" value="{{ $schools->student_size}}">
                </div>
            </div>
            <div class="form-group">
                <label for="facebook" class="col-lg-3 control-label">facebook</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="facebook" placeholder="facebook" name="facebook" value="{{ $schools->facebook}}">
                </div>
            </div>
            <div class="form-group">
                <label for="twitter" class="col-lg-3 control-label">twitter</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="twitter" placeholder="twitter" name="twitter" value="{{ $schools->twitter}}">
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