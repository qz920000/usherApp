@extends('master')
@section('title', $pagetitle)
@section('content')

<header class="" style="">    
                  <div class="">
                        <p>  <h3 class="page-header">Mailbox / {{ $pagetitle  }}</h3>                                                
                       <span class="subheading">Page {{ $rs->currentPage() }} of {{ $rs->lastPage() }} ({!!  $rs->total()  !!} messages)</span>
                        </p>
                </div>
        </header>
@include('../shared.mailboxnavbar') 
@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif


@if ($rs->isEmpty())
<p> There are no messages.</p>
@else

 

                   <!-- Blog Entries Column -->
            <div class="post-preview">
@foreach ($rs as $item)
@if ($item->read==1)
read
@else
not read
@endif
<Div >
                    
               @if (strtolower($pagetitle) == 'sent')
               <p class="lead">
                   @else
                @if ($item->read==1)
                <p class="">
                @else
                <p class="lead">
                @endif
                 @endif
                   Subject: 
                     <a href={{ URL::route('showmail', ['mailid' => $item->id,'folder' =>$pagetitle]) }}> {!! $item->Message->subject !!}  </a>
                          id ,{!! $item->id!!} 
                    
          </p>
          <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                          <!--             Image file:$post->filename ? post->filename : 'None'-->
                <p class="">
                        {{ ucwords($fromt) }}: <a href={{ URL::route('userprofile', $item->$cname) }}>{!! $item->$cname !!}</a>
                    </p>
                <span class="glyphicon glyphicon-time"></span> Date: {!! $item->created_at->format(config('site-c.dateformat')) !!}     
                            </ul>
                        </div>
      
                        <div class="col-lg-6">
                            <ul class="list-unstyled">                               
                            
            @if (strtolower($pagetitle) == 'inbox')
                     <li class="">
                         <a href={{ URL::route('del_msg',['id' => $item->id,'fd' =>$pagetitle]) }}>Delete message {!! $item->id !!}</a>
                    </li>
                        @if ($item->flagged==0)
                    <li><a href="{{ URL::route('flag',['foldertype' => $pagetitle,'mid' =>$item->id,'rd' =>'yes']) }}">Flag Message</a>    </li>
                    @else
                    <li><a href="{{ URL::route('flag',['foldertype' => $pagetitle,'mid' =>$item->id,'rd' =>'no']) }}">Remove flag</a>    </li>
                @endif
                  @if ($item->read==1)
                    <li><a href="{{ URL::route('markread',['foldertype' => $pagetitle,'mid' =>$item->id,'rd' =>'yes']) }}">Mark as unread</a>    </li>
                    @else
                    <li><a href="{{ URL::route('markread',['foldertype' => $pagetitle,'mid' =>$item->id,'rd' =>'no']) }}">Mark as Read</a>    </li>
                @endif
                     
                    <li><a href="#">Share profile</a>          </li>
            @endif
            @if ( strtolower($pagetitle) == 'deleted')
                 <li class="">
                     <a href={{ URL::route('res_msg',['id' => $item->id,'fd' =>$pagetitle]) }}>Restore message {!! $item->id !!}</a>
                </li>
                <li><a href="#">flag message</a>   </li>
                @if ($item->read==1)
                   <li><a href="{{ URL::route('markread',['foldertype' => $pagetitle,'mid' =>$item->id,'rd' =>'yes']) }}">Mark as unread</a>    </li>
                    @else
                    <li><a href="{{ URL::route('markread',['foldertype' => $pagetitle,'mid' =>$item->id,'rd' =>'no']) }}">Mark as Read</a>    </li>
                @endif
                                       <li><a href="#">Share profile</a>          </li>
            @endif
          
                            </ul>
                        </div>
                    </div>
          
                   
                   @if($item->status == "100")
              @can('update-post', $post)                   
             
              <BR>Your post is still in draft stages. Click below to continue editing your post.<BR>
             <a href="{!! action('posts\PostsController@edit', $post->id) !!}">Continue Editing Your Post </a>
                
               @endcan
               @endif
              </p>
              <hr> 
           
             
          
</div>
      @endforeach
    </ul>
    <hr>
     {!! $rs->render() !!} 
  </div>

@endif
@endsection