@extends('master')
@section('title', $pagetitle )
@section('content')

<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">{{ $pagetitle  }}</h1>                                                
                        <span class="subheading">  </span>
                        </p>
                </div>
        </header>




    <!-- Page Header -->
    <div class="post-preview  text-center">
        <h1>{{ $pagetext  }}</h1>
                        
                        <span class="subheading"></span>
                    </div>
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" >
        <div class="container">
            <div class="row">
                
                    <div class="site-heading text-center">
                        <h1>{{ $pagetitle  }}</h1>
                        
                        <span class="subheading"></span>
                    </div>
               
            </div>
        </div>
    </header>

@endsection