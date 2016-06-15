

<header class="" style="">    
                  <div class="">
                        <p>  <h3 class="page-header">Comments</h3>                                                
                        <span class="subheading"> </span>
                        </p>
                </div>
        </header>  






            <!-- Blog Post Content Column -->
            <div class="post-preview">

                <!-- Blog Post -->
<hr>
      
                
        

                <!-- Comments Form@  /if (Auth::check()) -->
                 
                <div class="well">
                    <fieldset>
                    <h4>Leave a Comment:</h4>
                    <form class="form-horizontal" method="post" >
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <input type="hidden" name="post_id" value="{!! $post->id !!}">
                    <input type="hidden" name="post_type" value="{!! $post_type !!}">
                     <input type="hidden" name="post_owner_id" value="{!! $post->user_id !!}">
                       <div class="form-group">
                        <textarea class="form-control" rows="3" id="content" name="content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post Comment</button>
                      </fieldset>
                    </form>
                    </div>
                   <!--  @ else-->
                    <div class="clearfix">Please <a href={{ URL::route('adminhome') }}>login</a> to add your comment to this post.</div>
                   <!--  @ endif-->
                <hr>

                <!-- Posted Comments -->

                   
                
                <!-- Comment -->
                 @foreach($comments as $comment)
                    <div class="media-body">
                        <h4 class="media-heading">{!! $comment->username !!}
                            <small>  {!! $comment->created_at->format('F d, Y H:i e') !!}</small>
                        </h4>
                        <div class="content">
                          <p>   {!! $comment->content !!} <p>
                        </div>
                            </div>
                 <hr>
                            @endforeach
                                   
                       

            </div>
       
    
    