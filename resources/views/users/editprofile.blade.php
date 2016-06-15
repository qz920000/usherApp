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
                        <label class="control-label col-sm-4" for="bodytype">Body type:</label>
                        <div class="col-sm-8">
                          <select class="form-control"  id="bodytype" name="bodytype">
                                 <option value="" >No Answer</option>
                                 <option value="athletic"@if($userprofile->bodytype == "athletic") selected="selected"  @endif  >Athletic</option>
                                 <option value="average" @if($userprofile->bodytype == "average") selected="selected"  @endif >Average</option>
                                 <option value="overweight"@if($userprofile->bodytype == "overweight") selected="selected"  @endif  >Overweight</option>
                                 <option value="slightlyoverweight" @if($userprofile->bodytype == "slightlyoverweight") selected="selected"  @endif >Slightly Overweight</option>
                                 <option value="muscular"@if($userprofile->bodytype == "muscular") selected="selected"  @endif  >Muscular</option>
                                 <option value="thin" @if($userprofile->bodytype == "thin") selected="selected"  @endif >Thin</option>
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
                            <label class="control-label col-sm-4" for="smoke">Smoke:</label>
                            <div class="col-sm-8">
                              <select class="form-control"  id="smoke" name="smoke">
                                 <option value="" >Select</option>
                                 <option value="yes"@if($userprofile->smoke == "yes") selected="selected"  @endif  >Yes</option>
                                 <option value="no" @if($userprofile->smoke == "no") selected="selected"  @endif >No</option>
                             </select>
                            </div>
                      </div>
                      <div class="form-group">
                            <label class="control-label col-sm-4" for="have_kids">Have kids?:</label>
                            <div class="col-sm-8"> 
                          
                              <select class="form-control"  id="havekids" name="have_kids">
                                 <option value="" >Select</option>
                                 <option value="yes"@if($userprofile->have_kids == "yes") selected="selected"  @endif  >Yes</option>
                                 <option value="no" @if($userprofile->have_kids == "no") selected="selected"  @endif >No</option>
                             </select>
                            </div>
                      </div>
                      <div class="form-group">
                            <label class="control-label col-sm-4" for="have_pets">Have pets:</label>
                            <div class="col-sm-8">
                               <select class="form-control"  id="have_pets" name="have_pets">
                                 <option value="" >Select</option>
                                 <option value="yes"@if($userprofile->have_pets == "yes") selected="selected"  @endif  >Yes</option>
                                 <option value="no" @if($userprofile->have_pets == "no") selected="selected"  @endif >No</option>
                             </select>
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
                            <label class="control-label col-sm-4" for="seeking_gender">Seeking gender:</label>
                            <div class="col-sm-8">
                              <select class="form-control"  id="seeking_gender" name="seeking_gender">
                                 <option value="" >Select</option>
                                 <option value="male"@if($userprofile->seeking_gender == "male") selected="selected"  @endif  >Male</option>
                                 <option value="female" @if($userprofile->seeking_gender == "female") selected="selected"  @endif >Female</option>
                             </select>
                            </div>
                       </div>
                       <div class="form-group">
                            <label align="left" class="control-label col-sm-4" for="pwd">Sexuality:</label>
                            <div class="col-sm-8"> 
                              <select class="form-control"  id="sexuality" name="sexuality">
                                 <option value="" >Select</option>
                                 <option value="straight"@if($userprofile->sexuality == "straight") selected="selected"  @endif  >Straight</option>
                                 <option value="bisexual" @if($userprofile->sexuality == "bisexual") selected="selected"  @endif >Bisexual</option>
                                 <option value="gay"@if($userprofile->sexuality == "gay") selected="selected"  @endif  >Gay</option>
                                 <option value="lesbian" @if($userprofile->sexuality == "lesbian") selected="selected"  @endif >Lesbian</option>
                                 <option value="transsexual"@if($userprofile->sexuality == "transsexual") selected="selected"  @endif  >Transsexual</option>
                                
                             </select>
                            </div>
                       </div>
                      <div class="form-group">
                            <label class="control-label col-sm-4" for="looking_for">Looking for:</label>
                            <div class="col-sm-8">
                              <select class="form-control"  id="looking_for" name="looking_for">
                                 <option value="" >Select</option>
                                 <option value="dating"@if($userprofile->looking_for == "dating") selected="selected"  @endif  >Dating</option>
                                 <option value="friends" @if($userprofile->looking_for == "friends") selected="selected"  @endif >Friends</option>
                                 <option value="casual"@if($userprofile->looking_for == "casual") selected="selected"  @endif  >Casual</option>
                                 <option value="nsa" @if($userprofile->looking_for == "nsa") selected="selected"  @endif >NSA</option>
                                 <option value="email"@if($userprofile->looking_for == "email") selected="selected"  @endif  >email</option>
                                 <option value="discreet" @if($userprofile->looking_for == "discreet") selected="selected"  @endif >Discreet</option>
                                 <option value="serious"@if($userprofile->looking_for == "serious") selected="selected"  @endif  >Serious</option>
                                 <option value="notsure" @if($userprofile->looking_for == "notsure") selected="selected"  @endif >Not Sure</option>
                             </select>
                            </div>
                      </div>
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
                            <label class="control-label col-sm-4" for="incomelevel">Income Level:</label>
                            <div class="col-sm-8"> 
                              <select class="form-control"  id="incomelevel" name="incomelevel">
                                 <option value="" >Select</option>
                                 <option value="yes"@if($userprofile->incomelevel == "yes") selected="selected"  @endif  >Yes</option>
                                 <option value="no" @if($userprofile->incomelevel == "no") selected="selected"  @endif >No</option>
                             </select>
                            </div>
                      </div>
                      <div class="form-group">
                            <label class="control-label col-sm-4" for="personality">Personality:</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="personality" name="personality">
                            </div>
                      </div>
                      <div class="form-group">
                            <label class="control-label col-sm-4" for="attractiveness">Attractiveness:</label>
                            <div class="col-sm-8"> 
                              <select class="form-control"  id="atttractiveness" name="atttractiveness">
                                 <option value="" >Select</option>
                                 <option value="average"@if($userprofile->atttractiveness == "average") selected="selected"  @endif  >Average</option>
                                 <option value="attractive" @if($userprofile->atttractiveness == "attractive") selected="selected"  @endif >Attractive</option>
                                 <option value="veryattractive"@if($userprofile->atttractiveness == "veryattractive") selected="selected"  @endif  >Very Attractive</option>
                                 <option value="okay" @if($userprofile->atttractiveness == "okay") selected="selected"  @endif >Okay</option>
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
                      <div class="form-group">
                            <label class="control-label col-sm-4" for="drink">Drink:</label>
                            <div class="col-sm-8"> 
                                 <select class="form-control"  name="drink" id="drink">
                                 <option value="" >Select</option>
                                 <option value="yes"@if($userprofile->drink == "yes") selected="selected"  @endif  >Yes</option>
                                 <option value="no" @if($userprofile->drink == "no") selected="selected"  @endif >No</option>
                             </select>
                            </div>
                      </div>
                      <div class="form-group">
                            <label class="control-label col-sm-4" for="datesmoker">Date smoker?:</label>
                            <div class="col-sm-8">
                                <select class="form-control"  id="datesmoker" name="datesmoker">
                                 <option value="" >Select</option>
                                 <option value="yes"@if($userprofile->datesmoker == "yes") selected="selected"  @endif  >Yes</option>
                                 <option value="no" @if($userprofile->datesmoker == "no") selected="selected"  @endif >No</option>
                             </select>
                            </div>
                      </div>
                      <div class="form-group">
                            <label class="control-label col-sm-4" for="wantkids">Want Kids?</label>
                            <div class="col-sm-8"> 
                              <select class="form-control"  id="want_kids" name="want_kids">
                                 <option value="" >Select</option>
                                 <option value="yes"@if($userprofile->want_kids == "yes") selected="selected"  @endif  >Yes</option>
                                 <option value="no" @if($userprofile->want_kids == "no") selected="selected"  @endif >No</option>
                             </select>
                            </div>
                      </div>
                      <div class="form-group">
                            <label class="control-label col-sm-4" for="owncar">Own Car:</label>
                            <div class="col-sm-8">
                               <select class="form-control"  id="owncar" name="owncar">
                                 <option value="" >Select</option>
                                 <option value="yes"@if($userprofile->owncar == "yes") selected="selected"  @endif  >Yes</option>
                                 <option value="no" @if($userprofile->owncar == "no") selected="selected"  @endif >No</option>
                             </select>
                              
                            </div>
                      </div>
                      <div class="form-group">
                            <label class="control-label col-sm-4" for="date_person_with_kids">Date Person With Kids:</label>
                            <div class="col-sm-8"> 
                              <select class="form-control"  id="date_person_with_kids" name="date_person_with_kids">
                                 <option value="" >Select</option>
                                 <option value="yes"@if($userprofile->date_person_with_kids == "yes") selected="selected"  @endif  >Yes</option>
                                 <option value="no" @if($userprofile->date_person_with_kids == "no") selected="selected"  @endif >No</option>
                             </select>
                              
                            </div>
                      </div>              
                      <div class="form-group">
                            <label class="control-label col-sm-4" for="maritalstatus">Marital Status</label>
                            <div class="col-sm-8">
                              <select class="form-control"  id="maritalstatus" name="maritalstatus">
                                 <option value="" >Select</option>
                                 <option value="single"@if($userprofile->maritalstatus == "single") selected="selected"  @endif  >Single</option>
                                 <option value="divorced" @if($userprofile->maritalstatus == "divorced") selected="selected"  @endif >Divorced</option>
                                 <option value="married"@if($userprofile->maritalstatus == "married") selected="selected"  @endif  >Married</option>
                                 <option value="widowed" @if($userprofile->maritalstatus == "widowed") selected="selected"  @endif >Widowed</option>
                                 <option value="attached"@if($userprofile->maritalstatus == "attached") selected="selected"  @endif  >Attached</option>
                                 <option value="other" @if($userprofile->maritalstatus == "other") selected="selected"  @endif >Other</option>
                             </select>
                            </div>
                      </div>
                                   
                       <div class="form-group">
                            <label align="left" class="control-label col-sm-4" for="pwd">Budget </label>
                            <div class="col-sm-3"> 
                              From <input type="text" class="form-control  input-sm" id="company">
                            </div>
                            <div class="col-sm-3"> 
                               To <input type="text" class="form-control  input-sm" id="company">
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
                      <div class="form-group">
                            <label class="control-label col-sm-2" for="aboutmymatch">About My Match:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="6"  id="aboutmymatch" name="aboutmymatch">{{ $userprofile->aboutmymatch }}</textarea>
                             </div>
                      </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Projectname">Project name:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="projectname">
                            </div>
                      </div>




<fieldset>
   

      <div class="form-group">
                <label for="role" class="col-lg-2 control-label">Role</label>
                <div class="col-lg-6">
                    <select class="form-control"  name="role" id="role">
                 
                     <option value="" >Select Role</option>
                        @foreach($roles as $role)
                        <option value="{!! $role->id !!}"  
                                @if($user->role_id == $role->id) selected="selected"  @endif>{!! $role->name !!}
                        </option>
                        @endforeach
                 
                    </select>
                </div>
            </div>
    



        <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">

        <button type="submit" name="save" value="" class="btn btn-primary" >Save/Update User</button>
        
        </div>
        </div>
</fieldset>
</form>
</div>
@endsection