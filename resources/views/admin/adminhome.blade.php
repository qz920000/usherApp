@extends('master')
@section('title', 'Admin Control Panel')

@section('content')
@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
<div class="row-action-primary">
<i class="mdi-social-person"></i>
</div>

<div class="row-content">
<div class="action-secondary"><i class="mdi-social-info"></i></div>
<h4 class="list-group-item-heading">Manage User</h4>
<a href="{{ url('/users') }}" class="btn btn-default btn-raised">All Users</a>
</div>


<div class="list-group-separator"></div>
<div class="list-group-item">
<div class="row-action-primary">
<i class="mdi-social-group"></i>
</div>
<div class="row-content">
<div class="action-secondary"><i class="mdi-material-info"></i></div>
<h4 class="list-group-item-heading">Manage Universities</h4>
<a href="{{ URL::route('schoolshome') }}" class="btn btn-default btn-raised">View Universities</a>
<a href="{{ URL::route('add_school') }}" class="btn btn-primary btn-raised">Add University</a>


<a href="{{ URL::route('edit_school') }}" class="btn btn-primary btn-raised">Edit University</a>

</div>
</div>


<div class="list-group-separator"></div>
<div class="list-group-item">
<div class="row-action-primary">
<i class="mdi-social-group"></i>
</div>
<div class="row-content">
<div class="action-secondary"><i class="mdi-material-info"></i></div>
<h4 class="list-group-item-heading">Manage Faculties</h4>
<a href="{{ URL::route('facultieshome') }}" class="btn btn-default btn-raised">View Faculties</a>
<a href="{{ URL::route('add_faculty') }}" class="btn btn-primary btn-raised">Add Faculty</a>

    

          
<a href="{{ URL::route('schoolshome') }}" class="btn btn-primary btn-raised">Edit Faculty</a>
      </div>   
</div>




<div class="list-group-separator"></div>
<div class="list-group-item">
<div class="row-action-primary">
<i class="mdi-social-group"></i>
</div>
<div class="row-content">
<div class="action-secondary"><i class="mdi-material-info"></i></div>
<h4 class="list-group-item-heading">Manage Courses</h4>
<span><a href="{{ URL::route('courseshome') }}" class="btn btn-default btn-raised">View/Edit Courses</a>
 
     <a href="{{ URL::route('add_course_prepage') }}" class="btn btn-primary btn-raised">Add Course</a>
</span>
</div>
</div>

    
    
    
<div class="list-group-separator"></div>
<div class="list-group-item">
<div class="row-action-primary">
<i class="mdi-editor-border-color"></i>
</div>
<div class="row-content">
<div class="action-secondary"><i class="mdi-material-info"></i></div>
<h4 class="list-group-item-heading">Manage Posts</h4>

<a href={{ URL::route('add_post') }} class="btn btn-primary btn-raised">Create A Post</a>
<a href={{ URL::route('showposts') }}  class="btn btn-default btn-raised">All Posts</a>

<a href={{ URL::route('showdrafts') }} class="btn btn-default btn-raised">View Draft Posts</a>

</div>
</div>
<div class="list-group-separator"></div>

<div class="list-group-item">
<div class="row-action-primary">
<i class="mdi-file-folder"></i>
</div>
<div class="row-content">
<div class="action-secondary"><i class="mdi-material-info"></i></div>
<h4 class="list-group-item-heading">Manage Categories</h4>
<a href={{ URL::route('adminhome') }}  class="btn btn-default btn-raised">All Categories</a>
<a href={{ URL::route('adminhome') }} class="btn btn-primary btn-raised">Create A Category</a>
</div>
</div>
<div class="list-group-separator"></div>



@endsection