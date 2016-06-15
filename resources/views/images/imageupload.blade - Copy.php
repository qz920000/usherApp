@extends('master')
@section('title', 'Update post')
@section('content')

<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Manage Images</h1>                                                
                        <span class="subheading"> </span>
                        </p>
                </div>
        </header>

 
@if(session('status'))
<div class="alert alert-success">
    
<h3 class="header">{{ session('status') }}</h2>
</div>
@endif
@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach


  <div class="post-preview">
      
<h2 class="header">{!! Auth::user()->name  !!}</h2>

<div class="" style="max-width:400px">
   
  
<div class="w3-row-paddinglllw3-section">
<!--    {!!$i=1!!}cc do not delete-->
     @foreach( $images as $image )   
     
  <div class="wbb3-col s4">
      <img class="demo w3-border w3-hover-shadow" src="{!! asset('/images/'.$image->filePath) !!}" style="width:100%"style="max-height: 150px;min-height: 150px;" onclick="currentDiv({{$i}})">
    
        <p>{{$image->description}}</p>
        <p>Created date:  {{ date("d F Y",strtotime($image->created_at)) }} at {{ date("g:ha",strtotime($image->created_at)) }}
        <a href="{{URL::route('delete_image',array('id'=>$image->id))}}" onclick="return confirm('Are yousure?')">
            <button type="button" class="btnbtn-danger btn-small">Delete Image</button></a>
      <a href="{{URL::route('set_main_image',array('id'=>$image->id))}}" >
          @if ($user->website == $image->id)
          Main Image
          @else
            <button type="button" class="btnbtn-danger btn-small">Set Main Image imageid {{$image->id }}</button></a>
          @endif
      </p></div>
<!--     {{$i++}}mm do not delete-->
@endforeach
</div>
      
</div>
<link rel="stylesheet" href="">
<style>
    {content:"";display:table;clear:both}
.wbb3-col{float:left;width:100%}
    .wbb3-col.s4{width:33.33333%}
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


@foreach( $images as $image )

    <div class="table table-bordered bg-success">
 <img src="{!! asset('/images/'.$image->filePath) !!}" alt="" class="img-responsive"   height="100" width="100" />
 <img src="{!! asset('/images/thumbs/'.$image->thumb_filename) !!}" alt="" class="img-responsive"  height="100" width="100" />

<br><a href="{!! action('ImageController@destroy2', $image->id) !!}">Delete Image {{$image->id}}</a>
</div>

@endforeach

@foreach( $images as $image )
hhhh {{$user->id }} website {{$user->website }}
   <div class="">
       
    <div class="thumbnail" style="max-height: 350px;min-height: 350px;">
    <img alt="{{$image->thumb_filename}}" src="{!! asset('/images/thumbs/'.$image->thumb_filename) !!}" alt="" class="img-responsive">
      <div class="caption">
        <p>{{$image->description}}</p>
        <p><p>Created date:  {{ date("d F Y",strtotime($image->created_at)) }} at {{ date("g:ha",strtotime($image->created_at)) }}</p></p>
        <a href="{{URL::route('delete_image',array('id'=>$image->id))}}" onclick="return confirm('Are yousure?')">
            <button type="button" class="btnbtn-danger btn-small">Delete Image</button></a>
      <a href="{{URL::route('set_main_image',array('id'=>$image->id))}}" onclick="return confirm('Are yousure?')">
          @if ($user->website == $image->id)
          Main Image
          @else
            <button type="button" class="btnbtn-danger btn-small">Set Main Image imageid {{$image->id }}</button></a>
          @endif
      </div>
    </div>
  </div>
@endforeach

<div>
<legend></legend>
<p>


<h4>Add Image</h4>  
@if( $images->count() < 6 )
    <div class="well well bs-component">    
  
      <form class="form-inline" action="{{route('uploadimage', [])}}" method="post" enctype="multipart/form-data" role="form">
          <div class="form-group">
            <label for="image"></label>   
            <input type="file"  class="form-control" name="image">
          </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">        
                <button type="submit" class="btn btn-primary">Upload Image</button>
    </form>
    </div>
@else  
   <div class="quote"><p>You have uploaded the maximum number of images.!<br>
           You can delete some images</p></div>
@endif

</div>
</div>
@endsection