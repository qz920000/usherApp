<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <!-- add header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">TravelZ</a>
        </div>
        <!-- add menu -->
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
            </ul>

            <!-- add search form -->
            <form class="navbar-form navbar-right" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search this site">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</nav>
<nav class="navbar navbar-default" role="navigation">
        
    
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ URL::route('adminhome') }}">Company Name</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Link</a></li>
            <li><a href="{{ URL::route('adminhome') }}">Link</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Exams/Test Prep <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  
                    <li class="{{ set_active2('admin') }}"><a href="{{ URL::route('showsubcat_posts','CBT') }}"">CBT</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ URL::route('showcat_posts','GRE Test Prep') }}">Post UME</a></li>
                    <li><a href="{{ URL::route('adminhome') }}">Separated link</a></li>
                    <li><a href="{{ URL::route('showsubcat_posts','JAMB Prep') }}">JAMB Test Prep</a></li>
                    <li><a href="{{ URL::route('showsubcat_posts','SAT Prep') }}">SAT Test Prep</a></li>                    
                     <li><a href="{{ URL::route('showsubcat_posts','JAMB Prep') }}"">JAMB Prep</a></li>
                    <li><a href="{{ URL::route('showsubcat_posts','JAMB past questions') }}"">JAMB past questions</a> </li>
                    <li><a href="{{ URL::route('showsubcat_posts','UME Past questions') }}"">UME Past questions</a> </li>
                    <li><a href="{{ URL::route('showsubcat_posts','SAT Prep') }}"">SAT Prep</a> </li>
                    <li class="divider"></li>  
               
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Scholarships <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="{{ set_active('admin') }}"><a href="{{ URL::route('showsubcat_posts','undergraduate') }}">-Undergraduate</a></li>
                    <li class="{{ set_active('admin') }}"><a href="{{ URL::route('showsubcat_posts','postgraduate') }}">-Postgraduate</a></li>
                    <li  class="{{ set_active('admin') }}"><a href="{{ URL::route('adminhome') }}">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="">Separated link</a></li>
                    <li class="divider"></li>  
               
                </ul>
            </li>
           
            </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admissions <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="{{ set_active2('admin') }}"><a href="{{ URL::route('showsubcat_posts','predegree') }}">Predegree</a></li>
                    <li class="{{ set_active2('admin') }}"><a href="{{ URL::route('showsubcat_posts','Postgraduate') }}">Postgraduate</a></li>
                    <li class="{{ set_active2('admin') }}"><a href="{{ URL::route('showsubcat_posts','part time') }}">Part time</a></li>
                    <li class="divider"></li>
                    <li class="{{ set_active2('admin') }}"><a href="{{ URL::route('adminhome') }}">Separated link</a></li>
                    <li class="divider"></li>  
               
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Schools <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="{{ set_active2('admin') }}"><a href="{{ URL::route('schoolshome') }}">Universities</a></li>
                    <li class="{{ set_active2('admin') }}"><a href="{{ URL::route('adminhome') }}">Polytechnics</a></li>
                    <li class="{{ set_active2('admin') }}"><a href="{{ URL::route('adminhome') }}">Colleges of Education</a></li>
                    <li class="divider"></li>
                    <li class="{{ set_active2('admin') }}"><a href="{{ URL::route('adminhome') }}">Schools of Nursing</a></li>
                      <li class="{{ set_active2('admin') }}"><a href="{{ URL::route('adminhome') }}">Separated link</a></li>
                    <li class="divider"></li>  
               
                </ul>
            </li>
            <li class="{{ set_active2('admin') }}"><a href="{{ URL::route('adminhome') }}">Adminhome</a></li>
        
        
         <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Guest <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                   <li >
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
               @endif
                </ul>
         </li>
                  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{Auth::check() ? Auth::user()->name : 'Guest'}} <span class="caret"></span></a>
                        
                 @if (Auth::check())
                         <ul class="dropdown-menu" role="menu">
                             
                                                      
 
    
                                <li><a href={{ URL::route('add_post') }}>Create a new post</a></li>
                                
                                
                                <li><a href={{ URL('posts/userposts/myposts') }}>My Posts2 </a></li>
                                <li><a href={{ URL('posts/userposts/mydrafts') }}>My Drafts2 </a></li>
                                <li><a href={{ URL::route('userprofile',Auth::user()->name ) }}>My Profile</a></li>
                                <li><a href={{ URL::route('useredit',Auth::user()->id ) }}>Edit Profile</a></li>
                                <li><a href={{ URL::route('mypost'), 'mydrafts' }}>My Posts </a></li>
                                <li><a href={{ URL::route('mydraft') }}>My Drafts </a></li>
                               
                                <li><a href={{ url('/logout') }}> <span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->name }}</a></li>
                         </ul>
                @else
                        <ul class="dropdown-menu" role="menu">
                                <li class="{{ set_active('Guest') }}">guest</li>                                                        
                             
    <li class="{{ set_active('/register') }}"><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
     <li class="{{ set_active('/login') }}"><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>


                        </ul>
                @endif
                        </li>
                </ul>
                
                        <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
        <div class="col-sm-3 col-md-3 pull-right">
            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="q">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>        
    </div>
    
</nav>


