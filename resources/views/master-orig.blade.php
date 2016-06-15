<html>
<head>
<title> @yield('title') </title>
  <!-- Bootstrap Core CSS -->
    
@include('css-js')  
    <!-- Custom CSS -->
 
</head>



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
              <div class="col-lg-12  col-lg-offset-0">
@include('shared.navbar')  
            <!-- Blog Post Content Column -->
            <div class="col-lg-8  col-lg-offset-0">
                                        @yield('content')
                
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
          <div class="well">
                    <h4>Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>
                <div class="well">
                    <h4>Categories</h4>
                     @section('sidebar')
                     @show
                      start master sidebar.
                      @include('shared.rightside')    
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

                </div>
            </div>
        </div>

</body>


</html>
