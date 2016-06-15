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
                                @endif
                                <li> @if (  $sa_friend->count() == 0 )
                                    <a href="{{ URL::route('saveFriend',$user->name) }}">Add to friends list</a>
                                    @else
                                    <a href="{{ URL::route('deleteFriend',$user->name) }}">Delete Friend</a>
                                    @endif
                                </li>
                               
                               <li><a href="#">Like this profile</a>
                                </li>
                                <li><a href="#">Share profile</a>
                                </li>
                                <li><a href="{{ URL::route('extern','nysc') }}">Flag profile</a>
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
                        <span class="subheading">{!! $user->name !!} 
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
    <span>
                        <div class="col-lg-3">
                            <ul class="list-unstyled">
                                <li class="lbl">Attractiveness:</li>                                
                                <li  class="lbl">Haircolor:   </li>                                
                                <li  class="lbl">Ethnicity:   </li>
                                <li class="lbl">Sexuality:   </li>
                                <li class="lbl">Education:</li>                                
                                <li  class="lbl">Have kids?:   </li>                                
                                <li  class="lbl">Date person with kids?:   </li>
                                <li class="lbl">Smoke:   </li>
                                <li class="lbl">Second language?   </li>                                                   
                 
                            </ul>
                        </div>
    
                           
                        <div class="col-lg-3">
                            <ul class="list-unstyled">
                               <li  class="l_field">{{ $userprofile->attractiveness }} </li>                                
                                <li   class="l_field">{{ $userprofile->haircolor }}   </li>                                
                                <li  class="l_field">{{ $userprofile->ethnicity }}</li>
                                <li  class="l_field">{{ $userprofile->sexuality }} </li>
                                <li  class="l_field">{{ $userprofile->education }} </li>                                
                                <li   class="l_field">{{ $userprofile->have_kids }}   </li>                                
                                <li  class="l_field">{{ $userprofile->date_person_with_kids }}</li>
                                <li  class="l_field">{{ $userprofile->smoke }} </li>
                                <li  class="l_field">{{ $userprofile->second_language }} </li>
                                                    
                 
                            </ul>
                        </div>
    </span>
    <div class="col-lg-3">
                             <ul class="list-unstyled">
                                <li class="lbl">Body Type:</li>                                
                                <li  class="lbl">Eye Color:   </li>                                
                                <li  class="lbl">Personality Type:   </li>
                                <li class="lbl">Marital Status:   </li>
                                <li class="lbl">Profession:</li>                                
                                <li  class="lbl">Want kids:   </li>                                
                                <li  class="lbl">Drink:   </li>
                                <li class="lbl">Date Smoker?:   </li>
                                <li class="lbl">Have Pets?   </li>                                                   
                 
                            </ul>
                        </div>
    <div class="col-lg-3">
                            <ul class="list-unstyled">
                              <li  class="l_field">{{ $userprofile->bodytype }} </li>                                
                                <li   class="l_field">{{ $userprofile->eyecolor }}   </li>                                
                                <li  class="l_field">{{ $userprofile->personality }}</li>
                                <li  class="l_field">{{ $userprofile->maritalstatus }} </li>
                                <li  class="l_field">{{ $userprofile->profession }} </li>                                
                                <li   class="l_field">{{ $userprofile->want_kids }}   </li>                                
                                <li  class="l_field">{{ $userprofile->drink }}</li>
                                <li  class="l_field">{{ $userprofile->datesmoker }} </li>
                                <li  class="l_field">{{ $userprofile->have_pets }} </li>
                                                    
                 
                            </ul>
                        </div>
           
                       
                    </div>



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
                               <li  class="l_field">{{ $userprofile->attractiveness }} </li>                                
                                <li   class="l_field">{{ $userprofile->haircolor }}   </li>                                
                                <li  class="l_field">{{ $userprofile->ethnicity }}</li>
                                <li  class="l_field">{{ $userprofile->sexuality }} </li>
                                <li  class="l_field">{{ $userprofile->education }} </li>                                
                                <li   class="l_field">{{ $userprofile->have_kids }}   </li>                                
                                <li  class="l_field">{{ $userprofile->date_person_with_kids }}</li>
                                <li  class="l_field">{{ $userprofile->smoke }} </li>
                                <li  class="l_field">{{ $userprofile->second_language }} </li>
                                                    
                 
                            </ul></td>
      
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        
      </tr>
      <tr>
        <td>July</td>        
        <td>Dooley</td>
        
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
                 
                            </ul>
        </td>
        <td>
             <ul class="list-unstyled">
                              <li  class="l_field">{{ $userprofile->bodytype }} </li>                                
                                <li   class="l_field">{{ $userprofile->eyecolor }}   </li>                                
                                <li  class="l_field">{{ $userprofile->personality }}</li>
                                <li  class="l_field">{{ $userprofile->maritalstatus }} </li>
                                <li  class="l_field">{{ $userprofile->profession }} </li>                                
                                <li   class="l_field">{{ $userprofile->want_kids }}   </li>                                
                                <li  class="l_field">{{ $userprofile->drink }}</li>
                                <li  class="l_field">{{ $userprofile->datesmoker }} </li>
                                <li  class="l_field">{{ $userprofile->have_pets }} </li>
                                                    
                 
                            </ul>
        </td>
      
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
       
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
       
      </tr>
    </tbody>
  </table>
</div>

                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><span>City:<span>{{ '                                          '.$userprofile->city }} </li>
                                
                                            <li><span>Zip:{{ '                     '.$userprofile->zip }} </span>  </li>
                                
                                <li  class="ws30">State: {{ $userprofile->state }}
                                </li>
                                <li>Bodytype:{{ $userprofile->bodytype }}
                                </li>
                                <li class="ws30"><strong>Sexuality:</strong>{{ $userprofile->sexuality }} </li>
                                
                                <li><strong>Gender</strong>{{'   '. $userprofile->gender }}   </li>
                                
                                <li><strong>Seeking gender:</strong>{{'   '. $userprofile->seeking_gender }}
                                </li>
                                <li><strong>Looking for:</strong>{{ $userprofile->looking_for }}
                                </li>
                                                 
                  <li><strong>Religion:</strong>{{ $userprofile->religion }}                                </li>
                                 <li><strong>Profession:</strong>{{ $userprofile->profession }} </li>
                                
                                <li><strong>Income level:</strong>{{ $userprofile->incomelevel }}   </li>
                                
                                <li><strong>Education:</strong>{{ $userprofile->education }}                                </li>
                                <li><strong>secondlanguage:</strong>{{ $userprofile->second_language }}                                </li>
                            </ul>
                        </div>
                         

                        <div class="col-lg-6">
                            <ul class="list-unstyled">                               
                                 
                                 <li><strong>Attractiveness:</strong>{{ $userprofile->atttractiveness }} </li>
                                
                                <li><strong>Haircolor:</strong>{{ $userprofile->haircolor }}   </li>
                                
                                <li><strong>Eyecolor:</strong>{{ $userprofile->eyecolor }}
                                </li>
                                <li><strong>Personality:</strong>{{ $userprofile->personality }}                                </li>
                                 <li><strong>Marital status:</strong>{{ $userprofile->maritalstatus }} </li>
                                
                                <li><strong>Smoke:</strong>{{ $userprofile->smoke }}   </li>
                                
                                <li><strong>Drink:</strong>{{ $userprofile->drink }}                                </li>
                                <li><strong>date smoker?:</strong>{{ $userprofile->datesmoker }}                                </li>
                                 
                                 <li><strong>havekids:</strong>{{ $userprofile->have_kids }}                                </li>
                                 <li><strong>wantkids:</strong>{{ $userprofile->want_kids }} </li>
                                
                                <li><strong>datepersonwithkids:</strong>{{ $userprofile->date_person_with_kids }}   </li>
                                
                                <li><strong>havepets</strong>{{ $userprofile->have_pets }}                                </li>
                                <li><strong>owncar:</strong>{{ $userprofile->owncar }}                                </li>
                            </ul>
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