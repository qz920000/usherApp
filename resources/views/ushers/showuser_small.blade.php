@extends('master')
@section('title', $pagetitle)
@section('content')

<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">{{ $pagetitle  }}</h1>                                                
                  <span class="subheading">Page {{ $rs->currentPage() }} of {{ $rs->lastPage() }} ({!!  $rs->total()  !!} users)</span>
                  echo 'mmm'
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
    <div class="col-lg-4">
       <ul class="list-unstyled"> <li>
                    <a href="{{ URL::route('showusher', $item->o_name) }}"> {!! $item->o_name !!}  </a>
                         
          <p>

                               <li>Gender: {{ $item->gender }} </li>
                                
                                <li>Age: {{ageCalculator($item->dob)}}   </li>
                                
                                <li>Ethnicity:{{ $item->ethnicity }}
                                </li>
                                <li>Location:{{ $item->city.', '.$item->state.' '.$item->country  }}
                                </li>
                                                    
                 
                            </ul>
    </div>
    <div class="col-lg-4">
        
          <p>
<ul class="list-unstyled">
                               <li>Seeking:Work {{ $item->seeking_gender }} </li>
                                
                                <li> 
                                   
                            </li>
                                
                                <li>
                                </li>
                                <li><span> Last logon: {{ $item->login_status==1? 'Online now' : date((config('site-c.dateformat3')), 
                                            strtotime($item->log_in_time))}}</span>
                                </li>
                                                    
                 
                            </ul>
    </div>
    <div class="col-lg-1">
        
                    
                @if($item->status == "12")
                <span class="glyphicon glyphicon-time"></span> Posted on {!! $item->created_at->format(config('site-c.dateformat')) !!}               
            @can('update-post', $post)                 
             
              <BR>Your post is still in draft stages. Click below to continue editing your post.<BR>
             <a href="{!! action('posts\PostsController@edit', $post->id) !!}">Continue Editing Your Post </a>
                
               @endcan
               @endif
              </p>
              
         </div>
    
</div>
Location:{{ $item->city.', '.$item->state.' '.$item->country  }}
     <hr>                 
               
      @endforeach
    </ul>
    
   
  </div>
 {!! $rs->render() !!} 
@endif
@endsection