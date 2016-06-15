@extends('master')


@section('title', 'User Profile')
@section('sidebar')
@parent

                     <div class="well col-lg-12">
                          @if (Auth::check())
                            <ul class="list-unstyled">                               
                                 @if ( $user->name != Auth::user()->name)
                                  
                                <li> @if (  $sa->count() == 0 )
                                    <a href="{{ URL::route('saveUsher',$user->name) }}">Save Usher</a>
                                    @else
                                    <a href="{{ URL::route('deleteSavedUsher',$user->name) }}">Delete Saved Usher</a>
                                    @endif
                                </li>
                                
                                <li> @if (  $sa->count() == 0 )
                                    <a href="{{ URL::route('offer',$user->name,'offer') }}">Offer to Hire</a>
                                    @else
                                    <a href="{{ URL::route('offer',$user->name,'withdraw') }}">Withdraw Offer</a>
                                    @endif
                                </li>
                               <li><a href="{{ URL::route('offer',$user->name,'waitlist') }}">Add to Waitlist</a>
                                </li>
                               
                                @endif
                                <li><a href="#">Share Usher Profile</a>
                                </li>
                                

                            </ul>
                          @endif
                        </div> 
@stop
@section('content')
<!--viewed user routine-->
 @if (Auth::check())
{{ saveViewedUser($user->name) }}
@endif
<header class="" style="">    
                  <div class="">
                      <p>  <h1 class="page-header">{!! $user->name !!} :
                          {!! $userprofile->title !!}
                      </h1>                                                
                        <span class="subheading">{!! $user->name .', a '. ageCalculator($userprofile->dob).' year old '. $userprofile->gender .' seeking '.
                            $userprofile->seeking_gender .' for '.  $userprofile->looking_for   !!} 
                             </span>
                       <P class="subheading">{!! $user->name .',s Location: City: '. $userprofile->city .' State: '.
                            $userprofile->state .' Country: '.  $userprofile->country   !!} 
                             </p>
                        </p>
                        <span class="subheading">{!! $user->name !!} Last logon: {{ $user->login_status==1? 'online now' : $user->log_in_time
                                    }}
                             </span>
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




<div class="row">
    
    
     <div class="container col-lg-6">
        
  <table class="table">
      <tbody>
      <tr>
        <td><ul class="list-unstyled">
<!--                                <li class="lbl">Attractiveness:</li>                                -->
                                <li  class="lbl">Haircolor:   </li>                                
                                <li  class="lbl">Ethnicity:   </li>
<!--                                <li class="lbl">Sexuality:   </li>-->
                                <li class="lbl">Education:</li>                                
<!--                                <li  class="lbl">Have kids?:   </li>                                
                                <li  class="lbl">Date person with kids?:   </li>
                                <li class="lbl">Smoke:   </li>-->
                                <li class="lbl">Second language?   </li>                                                   
                 
                            </ul></td>
                                <td> <ul class="list-unstyled">
<!--                               <li  class="l_field">{{ $userprofile->attractiveness }}  </li>                                -->
                                <li   class="l_field">{{ $userprofile->haircolor }}    </li>                                
                                <li  class="l_field">{{ $userprofile->ethnicity }} </li>
<!--                                <li  class="l_field">{{ $userprofile->sexuality=='' ? 'bbbb' : 'NA'}}</li>
                                
                                
                                @if (empty($userprofile->sexuality))
                                <li  class="l_field">NA  </li>
                                @else
                                <li  class="l_field">{{$userprofile->sexuality}}  </li>
                                @endif-->
                                <li  class="l_field">{{ $userprofile->education }}  </li>                                
<!--                                <li   class="l_field">{{ $userprofile->have_kids }}   </li>                                
                                <li  class="l_field">{{ $userprofile->date_person_with_kids }} </li>
                                <li  class="l_field">{{ $userprofile->smoke }}  </li>-->
                                <li  class="l_field">{{ $userprofile->second_language }} </li>
                                                    
                 
                            </ul></td>
      
      </tr>
     
    </tbody>
  </table>
</div>
    <div class="container col-lg-6">
         
  <table class="table">
   
    <tbody>
      <tr>
        <td><ul class="list-unstyled">
<!--                                <li class="lbl">Body Type:</li>                                -->
                                <li  class="lbl">Eye Color:   </li>                                
<!--                                <li  class="lbl">Personality Type:   </li>
                                <li class="lbl">Marital Status:   </li>-->
                                <li class="lbl">Profession:</li>                                
<!--                                <li  class="lbl">Want kids:   </li>                                
                                <li  class="lbl">Drink:   </li>
                                <li class="lbl">Date Smoker?:   </li>
                                <li class="lbl">Have Pets?   </li>  -->
                                <li class="lbl">Religion   </li>
                 
                            </ul>
        </td>
        <td>
             <ul class="list-unstyled">
<!--                              <li  class="l_field">{{ $userprofile->bodytype }} &nbsp; </li>                                -->
                                <li   class="l_field">{{ $userprofile->eyecolor }}  &nbsp;  </li>                                
<!--                                <li  class="l_field">{{ $userprofile->personality }}  &nbsp;</li>
                                <li  class="l_field">{{ $userprofile->maritalstatus }} &nbsp; </li>-->
                                <li  class="l_field">{{ $userprofile->profession }} &nbsp; </li>                                
<!--                                <li   class="l_field">{{ $userprofile->want_kids }}  &nbsp;  </li>                                
                                <li  class="l_field">{{ $userprofile->drink }} &nbsp;</li>
                                <li  class="l_field">{{ $userprofile->datesmoker }} &nbsp; </li>
                                <li  class="l_field">{{ $userprofile->have_pets }}  &nbsp;</li>-->
                                <li  class="l_field">{{ $userprofile->religion }}  &nbsp;</li>
                                                    
                 
                            </ul>
        </td>
      
      </tr>
      
    </tbody>
  </table>
</div>

                                            

                        
                    </div>



<!--<div class="" style="max-width:400px">
   
  
<div class="w3-row-paddinglllw3-section">
    {!!$i=1!!}cc do not delete
     @ bbforeach( $images as $image )   
     
  <div class="w3-col s4">
      <img class="demo w3-border w3-hover-shadow" src="{ ..!! asset('/images/'.$  image->filePath) !!}" style="width:100%" onclick="currentDiv({{$i}})">
    </div>
     {{$i++}}mm do not delete
@ nnendforeach
</div>
      @ nnforeach( $images as $image )    
 <img src="{ kkk!! asset('/images/'.$image->filePath) !!}" alt="" class="mySlides"  style="width:100%" style="height:100" />
@ jjendforeach
</div>-->
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<style>
    .w3-col.s4{width:33.33333%}
.mySlides {display:none}

</style>
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-border-red", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-border-red";
}
</script>


     
<div>
    <p> 
    <h3 class=""><strong>Description:</strong></h3>    </p>
<p>{{$userprofile->aboutme}}</p>
   
    </div>
<hr>
  @if (Auth::check())
                                                         
                                 @if ( $user->name != Auth::user()->name)
<form class="form-horizontal" method="post" >
 <p> 
    <h3 class=""><strong>Hire {!! $user->name !!} :</strong></h3>    </p>
<fieldset>
<input type="hidden" name="_token" value="{!! csrf_token() !!}">
<input type="hidden" name="ushername" value="{!! $user->name !!}">

   
      <div class="form-group">
                <label for="event" class="col-lg-2 control-label">Event</label>
                <div class="col-lg-6">
                    <select class="form-control"  name="event" id="event">
                 
                     <option value="" >Select Event</option>
                        @foreach($myevents as $event)
                        <option value="{!! $event->id !!}">  
                               {!! $event->id . ' '. $event->name !!}
                        </option>
                        @endforeach
                 
                    </select>
                </div>
            </div>
    <button type="submit" name="save" value="waitlist" class="btn btn-primary" >Put on Wait List</button>
        <button type="submit" name="save" value="hire" class="btn btn-primary">Hire {!! $user->name !!}</button>
<!-- <a href="" class="btn btn-default btn-raised">Put on Wait List </a>
    <a href=''  class="btn btn-primary btn-raised">Hire {!! $user->name !!} </a>-->
    </fiel dset>
</form>
@endif
@endif
<!--<div>
    <p> 
    <h3 class=""><strong>About my match:</strong></h3>    </p>
<p>{{$userprofile->aboutmymatch}}</p>
    
    </div>-->
        
        
<!--<div><p>
    Send a message to {!! $user->name !!}</p>
@ include('backend.users.contactform')
@ include('../contactform')

@include('../mailbox/mailform')      
    </div>-->
 <p> 
 

@endsection