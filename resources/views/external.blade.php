@extends('master2')
@section('title', '{{$pagetitle}}')
@section('content')
<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header"></h1>                                                
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


  <script language="JavaScript">
<!--
function autoResize(id){
    var newheight;
    var newwidth;

    if(document.getElementById){
        newheight = document.getElementById(id).contentWindow.document.body.scrollHeight;
        newwidth = document.getElementById(id).contentWindow.document.body.scrollWidth;
    }

    document.getElementById(id).height = (newheight) + "px";
    document.getElementById(id).width = (newwidth) + "px";
}
//-->
</script>

<iframe src="{{$site}}" width="100%" height="200px" id="iframe1" marginheight="0" frameborder="0" onLoad="autoResize('iframe1');"></iframe>

    
    <iframe src="http://www.nysc.gov.ng" 
            frameborder="0" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:150%;width:100%;position:static;top:0px;left:0px;right:0px;bottom:0px" height="150%" width="150%">
        
  <p>Your browser does not support iframes.</p>
</iframe>




@endsection