<html>
<head>
<title> @yield('title') </title>
<link rel="shortcut icon" href={{ url("favicon.ico") }}>
  <!-- Custom CSS -->
<!--<link href={{ url("css/comsen.css") }} rel="stylesheet">

<link href={{ url("css/main.css") }} rel="stylesheet">
  
   
   <link href={{ url("css/patros.css") }} rel="stylesheet">-->
   
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"rel="stylesheet">
<!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
<link href={{ url("css/roboto.min.css") }} rel="stylesheet">
      
<link href={{ url("css/material.min.css") }} rel="stylesheet">
<link href={{ url("css/ripples.min.css") }} rel="stylesheet">
<link href={{ url("css/blog-home.css") }}  rel="stylesheet">
<link href={{ url("css/blog-post.css") }}  rel="stylesheet">


<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    
    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
   <!-- Bootstrap Core CSS -->
   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 <script src={{ url("js/ckeditor_std/ckeditor.js") }}></script>
    

<style>
hr { 
    display: block;
    margin-top: 0em;
    margin-bottom: 0em;
    margin-left: auto;
    margin-right: auto;
    line-style: solid;
    
    border: none;
    height: 2px;
    /* Set the hr color */
    color: #000; /* old IE */
    background-color: #000; /* Modern Browsers */
} 
h1.page-header {
    border-width: 4px;
    size: 3px;
    border-color: #2f9254; 
    color: #16226c;
    line-style: none
}
.well-b {
  background-color: #16226c; 
    background-color: #009C00;
  border-color: #83c02b;
  color:#ffffff;
}
.navbar-default{
      background-color: #009C00;
      background-color: #2f9254; 
      background-color: #16226c; 
    background-color: #009C00;             
          
      color:#ffffff;
  background-image: kkkkurl("css/bluesky.jpg");
  background-repeat: no-repeat;
}
.panel-default{
      backgroundcolor: #009C00;
      backgroundcolor: #2c5da3;     
      colors:#ffffff;
          padding-top: 0;
    padding-bottom: 0;
}

.panel > .panel-heading {
    background-image: none;
    background-color: #1c70ae;
    background-color: #009C00; 
  

    color: white;

}
.panel > .panel-body {

  
    padding-top: 0;
    padding-bottom: 0;
    color: black;

}

.navbar .nav > li > a {
   
    color:  #fff;
}
h1 {
    font-size: 250%;
    
}

h2 {
    font-size: 200%;
    
}
h3 {
    font-size: 150%;
  }
.blogtitle {
    font-size: 150%;
    background-color: #2f9254;
    background-color: #009C00;
    background-color: #16226c; 
    //background-color: #2f9254;
    padding-top: 1%;
    padding-bottom: 5;
    padding-left: 10;
    padding-right: 5%;
    
    //border-radius:5px;
    border-top-left-radius:5px; 
border-top-right-radius:5px; 
border-bottom-left-radius:5px; 
border-bottom-right-radius:5px;
}
.titlecolor{
    color: #fff;
    hover: #CC2804;
}
.titlecolor:hover{
        color: #CC2804;
        color: #16226c;
}
.pageheader {
    font-size: 150%;
    background-color: #2f9254;
    background-color: #009C00;
        padding-top: 1%;
    padding-bottom: 5;
        padding-left: 10;
    padding-right: 5%;
    
    //border-radius:5px;
    border-top-left-radius:5px; 
border-top-right-radius:5px; 
border-bottom-left-radius:5px; // i use percentage  u can use pix.
border-bottom-right-radius:5px;
}

p {
    font-size: 100%;
}
.btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited {

    background-color: #16226c; 
    background-color: #2f9254;
    background-color: #009C00;
    border-color: #2f9254;
}
a {
    color: #009C00;
    color: #CC2804;
    color: #16226c;
}
.wps{
    word-spacing: 30px;
}

</style>


<style>
hrhhh { 
    display: block;
    margin-top: 0em;
    margin-bottom: 0em;
    margin-left: auto;
    margin-right: auto;
    border-style: solid;
    border-width: 3px;
} 
.displaybox { 
    padding: 5px;
    display: block;
    border-style: solid;
    border-width: 2px;
    border-color: #83c02b;
    border-color: #2f9254;
    border-radius:5px; 
} 

.well{
  background-color: #3b4045;
 // background-color: #2f9254;
     // background-color: #16226c;
      //background-color:#0a420a;
      background-color: #f5f5f5;
  border-color: #83c02b;
  border-color: #f5f5f5;
  //color:#ffffff;
   padding: 9px 10px 11px;
}
.navbar-default{
      background-color: #009C00;
      background-color: #2f9254; 
      background-color: #16226c; 
         //  background-color:#90ee90;
      color:#ffffff;
  background-image: kkkkurl("css/bluesky.jpg");
  background-repeat: no-repeat;
   padding-bottom: 0;
}
.wellxx,.navbar-default, .dropdown{
  
           background-color:#072c07;//#0e580e; //#148514; //#1bb11b;
 
}

.panel-default{
      backgroundcolor: #009C00;
      backgroundcolor: #2f9254;     
      colors:#ffffff;
}

.panel > .panel-heading {
    background-image: none;
    background-color: #1c70ae;
          background-color: #009C00;

    color: white;

}
.navbar .nav > li > a {
  
    color:  #fff;
}
.btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited {

    background-color: #16226c; 
        background-color: #009C00;
    //background-color: #2f9254;
    border-color: #2f9254;
}
.navbarnnn .navkk > li > a {
    float: none;
    line-height: 19px;
    padding: 9px 10px 11px;
    text-decoration: none;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
    color:  #fff;
}

a {
    color: #009C00;
    
    color: #16226c;
    color: #2f9254;
    color: #CC2804;
}
.wps{
    word-spacing: 30px;
}
input { 
height:23px !important;
height: 27px !important; 
}
select { 
height:23px !important;
height: 30px !important; 
color:#000000;
}
.nmcolor { 

color:#000000;
}
.inputheight { 
height:23px !important;
height: 28px !important; 
}

.normal {
    font-weight: normal;
}

.l_field {
    font-weight: bold;
    text-transform: capitalize;
    
}

.lbl {
   white-space:nowrap;
    
}


.thicker {
    font-weight: 900;
}
.ws30 {
    word-spacing: 100px;
    
}




</style>   
</head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>

<script>
$(document).ready(function() {
// This command is used to initialize some elements and make them work properly
$.material.init();
});
</script>

<body>
    
   <!-- <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">-->
 


 <!-- Page Content -->
    <div class="container">
            
        <div class="row">        
              <div class="col-lg-10  col-lg-offset-1">
@include('shared.navbar')  
            <!-- Blog Post Content Column -->
            <div class="col-lg-9  col-lg-offset-0">
                                        @yield('content')
                
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">
          <div class="well">
                    <h4>Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control  inputheight">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>
                <div class="well2">
                    
                     @section('sidebar')
                     @show
                      start sectio  heremaster sidebar.
                                   end the master sidebar.
                            
                   
                </div>
              

                <!-- Side Widget Well -->
                            <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore,
                        perspiciatis adipisci accusamus laudantium odit aliquam repellat 
                        tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
            </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
       

    </div>
    <!-- /.container -->


 <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
  <!-- @ include('shared.footer')<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">-->               
 @include('shared.footer') 
                </div>
            </div>
        </div>

</body>

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src={{ url("js/ripples.min.js") }}></script>
<script src={{ url("/js/material.min.js") }}></script>
</html>
