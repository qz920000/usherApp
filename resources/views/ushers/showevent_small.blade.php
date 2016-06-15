@extends('master')
@section('title', $pagetitle)
@section('content')

<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">{{ $pagetitle  }}</h1>                                                
                  <span class="subheading">Page {{ $rs->currentPage() }} of {{ $rs->lastPage() }} ({!!  $rs->total()  !!} events)</span>
                 
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



@if ($rs->isEmpty())
<p> There are no users.</p>
@else

 

                   <!-- Blog Entries Column -->
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
                    Event Name: <a href="{{ URL::route('showevent',$item->id ) }}"> {!! $item->o_name !!}  </a>
                      <a href="{{ URL::route('showgen','editevents' ) }}"> Edit event  </a>
                         
          <p>
<li>Event created by: {{ $item->m_name }} </li>
                               <li>Event date: {{ $item->event_date }} </li>
                               <li>From: {{ $item->time_from }} To: {{ $item->time_to }} </li>
                                
                                <li>duration: {{$item->duration}}   </li>
                                
                                <li>Event rate:{{ $item->event_rate }}                                </li>
                                <li>Location:{{ $item->city.', '.$item->state.' '.$item->country  }}
                                </li>
                                            
                     @if (Auth::check())                                                         
                     @if ( $pagetitle == "My events"  )  <li>
                           <li>status: {{$item->mstatus}}   </li>
                           @if ($item->mstatus == "hire")
                           <button disabled="disabled" type="submit" name="save" value="hire" class="btn btn-primary">Accept Offer </button>
 
                           <button disabled="disabled" type="submit" name="save" value="hire" class="btn btn-primary">Decline offer</button>
 @endif
                         
                     </li>                      
                 
                        @endif
@endif
       </ul>
    </div>
    <div class="col-lg-1">
        
          <p>
<ul class="list-unstyled">
                             &nbsp;
                                                    
                 
                            </ul>
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
@endsection