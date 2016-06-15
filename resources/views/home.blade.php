@extends('master')
@section('title', 'About')
@section('content')

<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Welcome to {{config('site-c.Appname')}}</h1>                                                
                        <span class="subheading"> Home page for  {{env('SITE_NAME')}} </span>
                        </p>
                </div>
        </header>
        
          @if (session('status'))
            <div class="alert alert-success">
            {{ session('status') }}
            </div>
          @endif



    <!-- Page Header -->
    <div class="post-preview  text-center">


    <img src="{!! asset('/assets/Lagos_Island.jpg') !!}" class="img-responsive" height="auto" width="100%" >


</div>
@endsection