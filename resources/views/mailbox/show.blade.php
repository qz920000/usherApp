@extends('master')
@section('title', 'Mailbox - '.  $pagetitle )
@section('content')
 @include('../shared.mailboxnavbar')   
<header class="" style="">    
                  <div class="">
                        <p>  <h3 class="page-header">Mailbox - {!!  $pagetitle !!}</h3>                                                
                                                </p>
                </div>
        </header>  








  
     <!-- Page Content -->
 
@if(session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif

@foreach($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
            <!-- Blog Post Content Column -->
            <div class="post-preview">

                <!-- Blog Post -->

                <!-- Title -->
                <p class="lead">
                    Subject: {!! $rs->Message->subject !!}
                   
                </p>

                <!-- Author -->
               
                <p class="">
                    {{ ucwords($fromt)}}: <a href={{ URL::route('userprofile', $rs->$cname) }}>{!! $rs->$cname !!}</a>
                </p>
                            
              
                   
                  
                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Sent on {!! $rs->created_at->format(config('site-c.dateformat')) !!}
</p>
       
<!-- Post Content -->
<div class="displaybox"> <p class="lead" > {!! $rs->message->message_body !!} </p></div>
                 @if (strtolower($pagetitle) == 'inbox')
                         <p class="">
                             <a href={{ URL::route('del_msg',['id' => $rs->id,'fd' =>$pagetitle]) }}>Delete message {!! $rs->id !!}</a>
                        </p>
        @endif
        @if ( strtolower($pagetitle) == 'deleted')
                         <p class="">
                             <a href={{ URL::route('res_msg',['id' => $rs->id,'fd' =>$pagetitle]) }}>Restore message {!! $rs->id !!}</a>
                        </p>
        @endif
                <hr>
                <!-- Preview Image -->
            <!-- Preview Image -->
             @if($rs->status == "100")

                @foreach( $images as $image )

                        <div class="table table-bordered bg-success">
                     <img src="{!! asset('/images/'.$image->thumb_filename) !!}" alt="" class="img-responsive" height="auto" width="100%" />
                    @can('update-post', $post)
                       <br><a href="{!! action('ImageController@destroy2', $image->id) !!}">Delete Image {{$image->id}}</a>
                    @endcan
                    </div>
                
                    @endforeach      
                    @endif
                

                <!-- update sections -->
             

                <!-- Comments Form -->
              
                <hr>

                <!-- Posted Comments -->

                   
                
                <!-- Comment -->
               
                                   
                  <header class="" style="">    
                  <div class="">
                        <p>  <h3 class="page-header">Send a reply to {!! $rs->$cname  !!}</h3>    
                        
                        <span class="subheading"> </span>
                        </p>
                </div>
        </header>
                    @include('..\mailbox\mailform')                                        
                

            </div>
       
    @endsection
    