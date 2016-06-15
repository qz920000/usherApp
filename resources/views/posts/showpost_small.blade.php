@extends('master')
@section('title', $pagetitle)
@section('content')

<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">{{ $pagetitle  }}</h1>                                                
                       <span class="subheading">Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }} ({!!  $posts->total()  !!}) items</span>
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



@if ($posts->isEmpty())
<p> There is no post.</p>
@else

 

                   <!-- Blog Entries Column -->
            <div class="post-preview">
@foreach ($posts as $post)

                    
               <li>
                    <a href="{!! action('posts\PostsController@show', $post->id) !!}"> {!! $post->title !!}  </a>
                         ({!! $post->comments->count()!!} comments
              
        
          <p>
             Image file:{{$post->filename ? $post->filename : 'None'}}
            <p class="">
                    by <a href={{ URL::route('userprofile', $post->username) }}>{!! $post->username !!}</a>
                </p>
                <span class="glyphicon glyphicon-time"></span> Posted on {!! $post->created_at->format(config('site-c.dateformat')) !!}               
              
                   
                   @if($post->status != "1")
              @can('update-post', $post)                   
             
              <BR>Your post is still in draft stages. Click below to continue editing your post.<BR>
             <a href="{!! action('posts\PostsController@edit', $post->id) !!}">Continue Editing Your Post </a>
                
               @endcan
               @endif
              </p>
              <hr> 
           
             
          
        </li>
      @endforeach
    </ul>
    <hr>
     {!! $posts->render() !!} 
  </div>

@endif
@endsection