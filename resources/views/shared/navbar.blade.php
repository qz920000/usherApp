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
            <a class="navbar-brand" href="#">{{config('site-c.Appname')}}</a>
        </div>
        <!-- add menu -->
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav">
                
                 <li class="{{ set_active('home') }}"><a href="{{ URL::route('home') }}">Home</a></li>
                
                              
                 <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Browse <span class="caret"></span></a>                      
                          <ul class="dropdown-menu" role="menu">   
                                <li><a href={{ URL::route('browseushers') }}>Browse Ushers</a></li>
                                <li><a href={{ URL::route('browseushers') }}>Browse Clients</a></li>
                                 <li><a href={{ URL::route('showevents','browseevents' ) }}>Browse Events</a></li>
                         </ul>
                  </li>
                          
                           @if (Auth::check())
                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            My Usher Account <span class="caret"></span></a> 
                            <ul class="dropdown-menu" role="menu">                       
                                 <li><a href={{ URL::route('usherprofileedit',Auth::user()->id ) }}>Create/Edit My Usher Profile</a></li>
                                 <li><a href="">Manage images</a></li>
<!--                                <li><a href={{ URL::route('showusers','saved_clients' ) }}>Saved Clients</a></li>
                                 <li><a href={{ URL::route('showushers','saved_events' ) }}>Saved Events</a></li>-->
                        <li><a >Saved Clients</a></li>
                                 <li>Saved Events</li>
                                <li><a href={{ URL::route('showevents','myevents' ) }}>My Events</a></li>
                                 <li><a href={{ URL::route('showgen','myaccount' ) }}>My Account</a></li>
                                  <li>Deactivate account</li>
                              </ul>
                        </li>
                            
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            My Client Account <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">  
                                <li><a href={{ URL::route('usherprofileedit',Auth::user()->id ) }}>Create/Edit My Client Account</a></li>
                                 <li><a href={{ URL::route('showgen','manageimages' ) }} )}}>Manage images</a></li>
                                <li><a href={{ URL::route('showushers','saved_ushers' ) }}>Saved Ushers</a></li>
                                <li class="divider"></li>  
                                <li class="divider"></li>  
                                 <li><a href={{ URL::route('showgen','addevents' ) }}>Add Event</a></li>
                                <li><a href={{ URL::route('showevents','listedevents' ) }}>Manage Events</a></li>
                                 <li><a href={{ URL::route('showgen','myaccount' ) }}>My Account</a></li>
                                 <li><a href={{ URL::route('showusers','viewed_me' ) }}>Cart</a></li>
                                 <li class="divider"></li>  
                                  <li>Deactivate account</li>
                              </ul>
                      </li>
                           
                           @endif
                          
                  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{Auth::check() ? Auth::user()->name : 'Guest'}} <span class="caret"></span></a>                        
                 @if (Auth::check())
                         <ul class="dropdown-menu" role="menu">              
                                <li><a href={{ URL::route('showusher',Auth::user()->name ) }}>My Profile</a></li>
                                <li><a href={{ URL::route('usherprofileedit',Auth::user()->id ) }}>Edit My info</a></li>
                                 <li><a href={{ url('/logout') }}> <span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                                
                         </ul>
                @else
                        <ul class="dropdown-menu" role="menu">
                                                                                      
                             
    <li class="{{ set_active('/register') }}"><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
     <li class="{{ set_active('/login') }}"><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>


                        </ul>
                @endif
                        </li>
            </ul>

            <!-- add search form -->
            
        </div>
    </div>
</nav>

