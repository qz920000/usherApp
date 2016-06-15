@extends('master')
@section('title', 'Preview a post')
@section('content')
<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Preview Your Post</h1>                                                
                        <span class="subheading"> </span>
                        </p>
                </div>
        </header>
    @if(session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
@foreach($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach


  
<div class="post-preview">Here is a preview of your post, your post has not yet been published. To Publish this post click Publish, but if you still want to make more changes please click Edit.<HR>
<h2 class="header">{!! $post->title !!}</h2>
<em>Post created at ({{ $post->created_at->format('M jS Y g:ia') }}), updated at {{ $post->updated_at->format(config('site-c.dateformat')) }} </em>
           and posted by <a href={{ URL::route('userprofile', $post->username) }}>{!! $post->username !!}</a>
            <!-- Preview Image -->
                @foreach( $images as $image )

                        <div class="table table-bordered bg-success">
                     <img src="{!! asset('/images/'.$image->filePath) !!}" alt="" class="img-responsive" height="auto" width="100%" />
                    @can('update-post', $post)
                       <br><a href="{!! action('ImageController@destroy2', $image->id) !!}">Delete Image {{$image->id}}</a>
                    @endcan
                    </div>
                
                    @endforeach      
<p> {!! $post->content !!} </p>


    <div class="clearfix">Tags: 

<p> {!! $post->tags !!} </p>
</div>
<div class="well well bs-component">
<form class="form-horizontal" method="post" >

<fieldset>
<input type="hidden" name="_token" value="{!! csrf_token() !!}">
<input type="hidden" name="id" value="{!! $post->id !!}">

    <a href="{!! action('posts\PostsController@edit', $post->id) !!}" class="btn btn-default btn-raised">Edit Posting </a>
    <a href={!! action('posts\PostsController@show', $post->id) !!}  class="btn btn-primary btn-raised">Publish Post</a>
    </fieldset>
</form>

</div>
</div>
@endsection