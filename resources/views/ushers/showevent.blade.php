@extends('master')
@section('title', $pagetitle)
@section('content')

<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">{{ $event->name  }}</h1>     
                        <p><span class="subheading">Event Contact: {{ $client->username}} </span></p>
                 
                 
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




 

                   <!-- Blog Entries Column -->
                                     <div class="post-preview">
       <ul class="list-unstyled"> <li>
                    Event Name: <a href="{{ URL::route('showgen','editevents' ) }}"> {!! $event->o_name !!}  </a>
                      <a href="{{ URL::route('showgen','editevents' ) }}"> Edit event  </a>
                         
          <p>

                               <li>Event date: {{ $event->event_date }} </li>
                               <li>From: {{ $event->time_from }} To: {{ $event->time_to }} </li>
                                
                                <li>duration: {{$event->duration}}   </li>
                                
                                <li>Event rate:{{ $event->event_rate }}                                </li>
                                <li>Location:{{ $event->city.', '.$event->state.' '.$event->country  }}
                                </li>
                                   <li>Event desc:{{ $event->description }}                                </li>
                                                    
                 
                            </ul>
    </div>
                   
                     @if (Auth::check())
                                                         
    @if ( $client->username == Auth::user()->name)      
                    <span class="subheading">Page {{ $rs->currentPage() }} of {{ $rs->lastPage() }} ({!!  $rs->total()  !!} hires)</span>
@if ($rs->isEmpty())
<p> There are no hires.</p>
@else
            <div class="post-preview displaybox">
  
@foreach ($rs as $item)
<p>{{ $item->title }}</p>
<div class="row">
    <div class="col-lg-3">
       {{$item->id }} website {{$item->main_image_id.' '.$item->main_image }}
        <img alt="" src="{!! asset('/images/'.$item->main_image) !!}" alt="" class="img-responsive"height="100" width="100">
    </div>
    <div class="col-lg-7">
       <ul class="list-unstyled"> <li>
                    Usher Name: <a href="{{ URL::route('showgen','editevents' ) }}"> {!! $item->usher_id!!}  </a>
                                                  
                             <a href="{{ URL::route('showusher', $item->username) }}"> {!! $item->username !!}  </a>

                               <li> date hired: {{ $item->date_paid }} </li>
                              
                                
                                <li>Amount paid: {{$item->amount_paid}}   </li>
                                
                                <li>Invoice:{{ $item->invoice_id }}                                </li>
                                 <li>Status: {{ $item->status }}  </li>
                                <li>
                                     <p> 
                            
<form class="form-horizontal" method="post" >

   
<fieldset>
<input type="hidden" name="_token" value="{!! csrf_token() !!}">
<input type="hidden" name="ushername" value="{!! $item->username !!}">
@if ($item->status == 'waitlist')
      <button type="submit" name="save" value="waitlist" class="btn btn-primary" >Remove from Waitlist</button>
 @else
       <button type="submit" name="save" value="waitlist" class="btn btn-primary" >Put on Wait List</button>
 @endif
 @if ($item->status == 'hire')
      <button type="submit" name="save" value="hire" class="btn btn-primary">Withdraw Offer {!! $item->username !!}</button>
 @else
        <button type="submit" name="save" value="hire" class="btn btn-primary">Hire {!! $item->username !!}</button>
 @endif
       

    </fieldset>
</form>    </li> </ul>
    </div>
    <div class="col-lg-1">        
          <p><ul class="list-unstyled">                             &nbsp;</ul>
    </div>
    <div class="col-lg-1">       
                   </p>
              
         </div>
    
</div>

     <hr>                 
               
      @endforeach
    </ul>
    
   
  </div>
 {!! $rs->render() !!} 
   @endif
@endif



@endif

@endsection