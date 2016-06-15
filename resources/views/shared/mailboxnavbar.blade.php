<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- add header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
        </div>
        <!-- add menu -->
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav">
                
                
                  @if (Auth::check())
                              
                 <li class="{{ set_active('inbox') }}"><a href={{ URL::route('mailbox','inbox') }}>Inbox</a></li>
                <li class="{{ set_active('Sent') }}"><a href={{ URL::route('mailbox','sentbox') }}>Sent Message</a></li>
                 <li class="{{ set_active('deleted') }}"><a href={{ URL::route('mailbox','deleted' ) }}>Deleted</a></li>
               
                          @endif
                          
                          
               
            </ul>

            <!-- add search form -->
           
        </div>
    </div>
</nav>

