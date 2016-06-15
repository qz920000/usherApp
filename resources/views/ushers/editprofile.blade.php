@extends('master')
@section('title', $pagetitle)
@section('content')
<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">{{$pagetitle}}</h1>                                                
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
    
<form class="form-horizontal" method="post" enctype="multipart/form-data">

<input type="hidden" name="_token" value="{!! csrf_token() !!}">
<input type="hidden" name="formtype" value="new">

        <div class="row">
          <div class="col-sm-6">
                  <div class="form-group">
                        <label class="control-label col-sm-4" for="gender">Gender:</label>
                        <div class="col-sm-8">
                            <select class="form-control"  id="gender" name="gender">
                                 <option value="" >Select</option>
                                 <option value="male"@if($userprofile->gender == "male") selected="selected"  @endif  >Male</option>
                                 <option value="female" @if($userprofile->gender == "female") selected="selected"  @endif >Female</option>
                             </select>
                        </div>
                  </div>
                  <div class="form-group">
                        <label class="control-label col-sm-4" for="dob">Date of Birth:</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control"  id="datepickerk" name="dob">
                            <p>Date: <input type="text" class="form-control" id="datepicker"></p>
                        </div>
                  </div>
                  <div class="form-group">
                        <label class="control-label col-sm-4" for="ethnicity">Ethnicity:</label>
                        <div class="col-sm-8">
                          <select class="form-control"  id="ethnicity" name="ethnicity">
                                 <option value="" >Select</option>
                                 <option value="asian"@if($userprofile->ethnicity == "asian") selected="selected"  @endif  >Asian</option>
                                 <option value="black" @if($userprofile->ethnicity == "black") selected="selected"  @endif >Black</option>
                                 <option value="caucasian"@if($userprofile->ethnicity == "caucasian") selected="selected"  @endif  >Caucasian</option>                                 
                                 <option value="hispanic"@if($userprofile->ethnicity == "hispanic") selected="selected"  @endif  >Hispanic</option>
                                 <option value="indian" @if($userprofile->ethnicity == "indian") selected="selected"  @endif >Indian</option>
                                 <option value="middleeastern"@if($userprofile->ethnicity == "middleeastern") selected="selected"  @endif  >Middle Eastern</option>
                                 <option value="mixed"@if($userprofile->ethnicity == "mixed") selected="selected"  @endif  >Mixed</option>
                                 <option value="nativeamerican" @if($userprofile->ethnicity == "nativeamerican") selected="selected"  @endif >Native American</option>                                                        
                                 <option value="other" @if($userprofile->ethnicity == "other") selected="selected"  @endif >Other</option>
                             </select>
                        </div>
                  </div>
                  <div class="form-group">
                        <label class="control-label col-sm-4" for="city">City:</label>
                        <div class="col-sm-8"> 
                          <input type="text" class="form-control" id="city" name="city" value="{{ $userprofile->city }}">
                        </div>
                  </div>
                  <div class="form-group">
                        <label class="control-label col-sm-4" for="zip">Zip:</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="zip" name="zip" value="{{ $userprofile->zip }}">
                        </div>
                  </div>
                  <div class="form-group">
                        <label class="control-label col-sm-4" for="profession">Profession:</label>
                        <div class="col-sm-8"> 
                          <input type="text" class="form-control" id="profession" name="profession" value="{{ $userprofile->profession }}">
                        </div>
                  </div>
                  
                  <div class="form-group">
                        <label class="control-label col-sm-4" for="pwd">Education:</label>
                        <div class="col-sm-8"> 
                           <select class="form-control"  id="education" name="education">
                                 <option value="" >Select</option>
                                 <option value="yes"@if($userprofile->education == "yes") selected="selected"  @endif  >Yes</option>
                                 <option value="no" @if($userprofile->education == "no") selected="selected"  @endif >No</option>
                             </select>
                        </div>
                  </div>  
                  
                  <div class="form-group">
                            <label class="control-label col-sm-4" for="Haircolor">Hair Color:</label>
                            <div class="col-sm-8">
                              <select class="form-control"  id="haircolor" name="haircolor">
                                 <option value="" >Select</option>
                                 <option value="bald"@if($userprofile->haircolor == "bald") selected="selected"  @endif  >Bald</option>
                                 <option value="black" @if($userprofile->haircolor == "black") selected="selected"  @endif >Black</option>
                                 <option value="blond"@if($userprofile->haircolor == "blond") selected="selected"  @endif  >Blond</option>
                                 <option value="brown" @if($userprofile->haircolor == "brown") selected="selected"  @endif >Brown</option>
                                 <option value="grey"@if($userprofile->haircolor == "grey") selected="selected"  @endif  >Grey</option>
                                 <option value="red" @if($userprofile->haircolor == "red") selected="selected"  @endif >Red</option>
                                 <option value="multicolor"@if($userprofile->haircolor == "multicolor") selected="selected"  @endif  >Multicolor</option>
                                 
                             </select>
                            </div>
                      </div>
                      <div class="form-group">
                            <label class="control-label col-sm-4" for="religion">Religion:</label>
                            <div class="col-sm-8"> 
                              <input type="text" class="form-control" id="religion" name="religion">
                            </div>
                      </div>
                    
                     
                     
                      <div class="form-group">
                            <label class="control-label col-sm-4" for="second_language">Second language:</label>
                            <div class="col-sm-8"> 
                              <select class="form-control"  id="second_language" name="second_language">
                                 <option value="" >Select</option>
                                 <option value="yes"@if($userprofile->second_language == "yes") selected="selected"  @endif  >Yes</option>
                                 <option value="no" @if($userprofile->second_language == "no") selected="selected"  @endif >No</option>
                             </select>
                            </div>
                      </div>              
                            
                  <div class="form-group">
                        <label align="left" class="control-label col-sm-4" for="pwd">Completion %</label>
                        <div class="col-sm-3"> 
                          From <input type="text" style="height:23px !important" class="form-control  input-sm" id="company">
                        </div>
                        <div class="col-sm-3"> 
                           To <input type="text"  style="height:23px !important" class="form-control  input-sm" id="company">
                        </div>
                  </div>
          </div>
          <div class="col-sm-6">
                       
                      
                     
                      <div class="form-group">
                            <label class="control-label col-sm-4" for="state">State:</label>
                            <div class="col-sm-8"> 
                                <select class="form-control"  id="state" name="state">
                                 <option value="" >Select</option>
                                 <option value="yes"@if($userprofile->datesmoker == "yes") selected="selected"  @endif  >Al</option>
                                 <option value="no" @if($userprofile->datesmoker == "no") selected="selected"  @endif >TX</option>
                             </select>
                            </div>
                      </div>
                      <div class="form-group">
                            <label class="control-label col-sm-4" for="country">Country:</label>
                            <div class="col-sm-8">
                                <select class="form-control"  id="country" name="country">
                                 <option value="" >Select</option>
                                 <option value="yes"@if($userprofile->country == "yes") selected="selected"  @endif  >USA</option>
                                 <option value="no" @if($userprofile->country == "no") selected="selected"  @endif >UK</option>
                             </select>                            
                            </div>
                      </div>
                      
                        
                      <div class="form-group">
                            <label class="control-label col-sm-4" for="eyecolor">Eye color:</label>
                            <div class="col-sm-8">
                                 <select class="form-control"  id="eyecolor" name="eyecolor">
                                 <option value="" >Select</option>
                                 <option value="bald"@if($userprofile->eyecolor == "bald") selected="selected"  @endif  >Bald</option>
                                 <option value="black" @if($userprofile->eyecolor == "black") selected="selected"  @endif >Black</option>
                                 <option value="blond"@if($userprofile->eyecolor == "blond") selected="selected"  @endif  >Blond</option>
                                 <option value="brown" @if($userprofile->eyecolor == "brown") selected="selected"  @endif >Brown</option>
                                 <option value="grey"@if($userprofile->eyecolor == "grey") selected="selected"  @endif  >Grey</option>
                                 <option value="red" @if($userprofile->eyecolor == "red") selected="selected"  @endif >Red</option>
                                 <option value="multicolor"@if($userprofile->eyecolor == "multicolor") selected="selected"  @endif  >Multicolor</option>
                                 
                             </select>
                            </div>
                      </div>
                     
                      
                                  
                   
                                   
                     
              </div>
            </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Title">Title:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title"  value="{{ $userprofile->title }}">
                            </div>
                      </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="aboutme">About Me:</label>
                            <div class="col-sm-10">
                                
                            <textarea class="form-control" rows="6"  id="aboutme" name="aboutme">{{ $userprofile->aboutme }}</textarea>
                            </div>
                      </div>
                      
                        




<fieldset>
   

     



        <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">

            <button disabled="disabled" type="submit" name="save" value="" class="btn btn-primary" >Save/Update User</button>
        
        </div>
        </div>
</fieldset>
</form>
</div>
@endsection