@extends('master')


@section('title', 'User Profile')
@section('sidebar')
@parent

                     <div class="well col-lg-12">
                            <ul class="list-unstyled">                               
                                 @if ( $user->name != Auth::user()->name)
                                  
                                <li> @if (  $sa->count() == 0 )
                                    <a href="{{ URL::route('saveUser',$user->name) }}">Save Profile</a>
                                    @else
                                    <a href="{{ URL::route('deleteSavedUser',$user->name) }}">Delete Saved Profile</a>
                                    @endif
                                </li>
                                
                                <li> @if (  $sa_friend->count() == 0 )
                                    <a href="{{ URL::route('saveFriend',$user->name) }}">Add to friends list</a>
                                    @else
                                    <a href="{{ URL::route('deleteFriend',$user->name) }}">Delete Friend</a>
                                    @endif
                                </li>
                               <li><a href="{{ URL::route('extern','nysc') }}">Flag profile</a>
                                </li>
                               <li><a href="#">Like this profile</a>
                                </li>
                                @endif
                                <li><a href="#">Share profile</a>
                                </li>
                                

                            </ul>
                        </div> 
@stop
@section('content')
<!--viewed user routine-->
{{ saveViewedUser($user->name) }}

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
                        <span class="subheading">{!! $user->name !!} Last logon: {{ $user->login_status==1? 'online now' : $user->log_in_time->format(config('site-c.dateformat'))}}
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
                                <li class="lbl">Attractiveness:</li>                                
                                <li  class="lbl">Haircolor:   </li>                                
                                <li  class="lbl">Ethnicity:   </li>
                                <li class="lbl">Sexuality:   </li>
                                <li class="lbl">Education:</li>                                
                                <li  class="lbl">Have kids?:   </li>                                
                                <li  class="lbl">Date person with kids?:   </li>
                                <li class="lbl">Smoke:   </li>
                                <li class="lbl">Second language?   </li>                                                   
                 
                            </ul></td>
                                <td> <ul class="list-unstyled">
                               <li  class="l_field">{{ $userprofile->attractiveness }}  </li>                                
                                <li   class="l_field">{{ $userprofile->haircolor }}    </li>                                
                                <li  class="l_field">{{ $userprofile->ethnicity }} </li>
                                <li  class="l_field">{{ $userprofile->sexuality=='' ? 'bbbb' : 'NA'}}</li>
                                
                                
                                @if (empty($userprofile->sexuality))
                                <li  class="l_field">NA  </li>
                                @else
                                <li  class="l_field">{{$userprofile->sexuality}}  </li>
                                @endif
                                <li  class="l_field">{{ $userprofile->education }}  </li>                                
                                <li   class="l_field">{{ $userprofile->have_kids }}   </li>                                
                                <li  class="l_field">{{ $userprofile->date_person_with_kids }} </li>
                                <li  class="l_field">{{ $userprofile->smoke }}  </li>
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
                                <li class="lbl">Body Type:</li>                                
                                <li  class="lbl">Eye Color:   </li>                                
                                <li  class="lbl">Personality Type:   </li>
                                <li class="lbl">Marital Status:   </li>
                                <li class="lbl">Profession:</li>                                
                                <li  class="lbl">Want kids:   </li>                                
                                <li  class="lbl">Drink:   </li>
                                <li class="lbl">Date Smoker?:   </li>
                                <li class="lbl">Have Pets?   </li>  
                                <li class="lbl">Religion   </li>
                 
                            </ul>
        </td>
        <td>
             <ul class="list-unstyled">
                              <li  class="l_field">{{ $userprofile->bodytype }} &nbsp; </li>                                
                                <li   class="l_field">{{ $userprofile->eyecolor }}  &nbsp;  </li>                                
                                <li  class="l_field">{{ $userprofile->personality }}  &nbsp;</li>
                                <li  class="l_field">{{ $userprofile->maritalstatus }} &nbsp; </li>
                                <li  class="l_field">{{ $userprofile->profession }} &nbsp; </li>                                
                                <li   class="l_field">{{ $userprofile->want_kids }}  &nbsp;  </li>                                
                                <li  class="l_field">{{ $userprofile->drink }} &nbsp;</li>
                                <li  class="l_field">{{ $userprofile->datesmoker }} &nbsp; </li>
                                <li  class="l_field">{{ $userprofile->have_pets }}  &nbsp;</li>
                                <li  class="l_field">{{ $userprofile->religion }}  &nbsp;</li>
                                                    
                 
                            </ul>
        </td>
      
      </tr>
      
    </tbody>
  </table>
</div>

                                            

                        
                    </div>



<div class="" style="max-width:400px">
   
  
<div class="w3-row-paddinglllw3-section">
<!--    {!!$i=1!!}cc do not delete-->
     @foreach( $images as $image )   
     
  <div class="w3-col s4">
      <img class="demo w3-border w3-hover-shadow" src="{!! asset('/images/'.$image->filePath) !!}" style="width:100%" onclick="currentDiv({{$i}})">
    </div>
<!--     {{$i++}}mm do not delete-->
@endforeach
</div>
      @foreach( $images as $image )    
 <img src="{!! asset('/images/'.$image->filePath) !!}" alt="" class="mySlides"  style="width:100%" style="height:100" />
@endforeach
</div>
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
    <h3 class=""><strong>About me:</strong></h3>    </p>
<p>{{$userprofile->aboutme}}</p>
   
    </div>

<div>
    <p> 
    <h3 class=""><strong>About my match:</strong></h3>    </p>
<p>{{$userprofile->aboutmymatch}}</p>
    
    </div>
        
        
<div><p>
    Send a message to {!! $user->name !!}</p>
<!--@ include('backend.users.contactform')-->
<!--@ include('../contactform')-->

@include('../mailbox/mailform')      
    </div>
 <p> 
 

@endsection