@extends('master')
@section('title', 'post')
@section('content')
   <link href="{{ url("css/blog-post.css") }}" rel="stylesheet">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=525232860979564";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>!function(d,s,id){
var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
if(!d.getElementById(id)){js=d.createElement(s);
    js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
    fjs.parentNode.insertBefore(js,fjs);
    }}
    (document, 'script', 'twitter-wjs');
</script>
<!-- Place this tag in your head or just google before your close body tag. -->
<script src="https://apis.google.com/js/platform.js" async defer></script>

<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">{!! $post->title!!}</h1>                                                
                        <span class="subheading"> </span>
                        </p>
                </div>
        </header>  




<div class="content">
<ul class="list-inline">
<li><div class="fb-share-button" data-href= {{ URL::current() }} data-layout="button">
</div></li>
<li>
<a href="https://twitter.com/share" class="twitter-share-button"  data-size="large" {count}>Tweet</a></li>


<li><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
<script type="IN/Share" data-url={{ URL::current() }} }}></script></li>


<li><span class="a2a_kit">
    <a class="a2a_button_google_plus_share" data-action="share" data-annotation="none" data-href={{ URL::current() }}></a>
</span></li>
</ul>
<ul class="list-inline">
<li><script async src="//static.addtoany.com/menu/page.js"></script>

<!-- Place this tag where you want the share button to render. -->





</ul>

</div>





  
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
                

                <!-- Author -->
                <p class="lead">
                    by <a href={{ URL::route('showpost', $post->username) }}>{!! $post->username !!}</a>
                   
                </p>
                 ({!! $post->username !!} comments)

                

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on {!! $post->created_at->format(config('site-c.dateformat')) !!}
</p>

                
<hr>
                <!-- Preview Image -->
            <!-- Preview Image -->
                @foreach( $images as $image )

                        <div class="table table-bordered bg-success">
                     <img src="{!! asset('/images/'.$image->thumb_filename) !!}" alt="" class="img-responsive" height="auto" width="100%" />
                    @can('update-post', $post)
                       <br><a href="{!! action('ImageController@destroy2', $image->id) !!}">Delete Image {{$image->id}}</a>
                    @endcan
                    </div>
                
                    @endforeach      
                <!-- Post Content -->
                <p class="lead"> {!! $post->content !!} </p>
                <hr>

                <!-- update sections -->
             

                <!-- Comments Form -->
              
                <hr>

                <!-- Posted Comments -->

                   
                
                <!-- Comment -->
                                   
                @include('shared.comments')  
                           
                 
                    <div class="">
                        <h4 class="">Tags for this post:
                            <small>Tags</small>
                        </h4>
   
                    </div>
                

            </div>
       
    @endsection
    