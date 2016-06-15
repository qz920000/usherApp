@extends('master')
@section('title', 'Create A New Post')
@section('content')
<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Create a new post</h1>                                                
                        <span class="subheading"> </span>
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



<div class="well well bs-component">
    
<form class="form-horizontal" method="post" enctype="multipart/form-data">

<input type="hidden" name="_token" value="{!! csrf_token() !!}">
<input type="hidden" name="formtype" value="new">
<fieldset>

<div class="form-group">
<label for="title" class="col-lg-2 control-label">Title</label>
<div class="col-lg-10">
<input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ old('title') }}">
</div>
</div>

<div class="form-group">
<label for="content" class="col-lg-12 control-label">Content</label>
<div class="col-lg-12">
<textarea class="form-control" rows="10" id="content"name="content" >{{ old('content') }}</textarea>
</div>
              <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'content' );
            </script>
</div>

      <div class="form-group">
                <label for="postsource" class="col-lg-2 control-label">Post source</label>
                <div class="col-lg-6">
                    <select class="form-control" id="postsource" name="postsource" id="postsource">
                 
                     <option value="" >Select Source</option>
                         @foreach($postsources as $ps)
                        <option value="{!! $ps->id !!}" >{!! $ps->name !!}
                        </option>
                        @endforeach
                        @foreach($schools as $school)
                        <option value="{!! $school->id !!}" >{!! $school->name !!}
                        </option>
                        @endforeach
                        
                    </select>
                </div>
            </div>
      <div class="form-group">
                <label for="category" class="col-lg-2 control-label">Category</label>
                <div class="col-lg-6">
                    <select class="form-control" id="category" name="category" id="category">
                 
                     <option value="" >Select Category</option>
                        @foreach($categories as $category)
                        <option value="{!! $category->id !!}" >{!! $category->name !!}
                        </option>
                        @endforeach                 
                    </select>
                </div>
            </div>
      <div class="form-group">
                <label for="entrylink" class="col-lg-2 control-label">Link</label>
                <div class="col-lg-6">
                    <select class="form-control" id="entrylink" name="entrylink" id="entrylink">
                        <option value="" >Select link on home page</option>
                    @foreach($entrylinks as $entrylink)
                        <option value="{!! $entrylink->id !!}" >{!! $entrylink->subentry !!}
                        </option>
                        @endforeach
                     
                                     
                    </select>
                </div>
            </div>
    <div class="form-group">
<label for="username" class="col-lg-2 control-label">Username</label>
<div class="col-lg-10">
<input type="text" class="form-control" id="username" placeholder="Username" name="username" value="{{ old('username') }}">
</div>
</div>
    
    <div class="form-group">
<label for="email" class="col-lg-2 control-label">User Email</label>
<div class="col-lg-10">
<input type="text" class="form-control" id="email" placeholder="email" name="email" value="{{ old('email') }}">
</div>
</div>
    
    <div class="form-group">
<label for="tags" class="col-lg-2 control-label">Tags</label>
<div class="col-lg-10">
<textarea class="form-control" rows="2" id="tags"name="tags" value="">{{ old('tags') }}</textarea>
</div>
</div>
    
  <div class="form-group">
    <label for="image" class="col-lg-2 control-label"> Select Image</label>
   <div class="col-lg-10">
    <input type="file"  class="form-control" name="image">
    </div>
  </div>
<div class="form-group">
<div class="col-lg-10 col-lg-offset-2">

<button type="submit" name="save" value="savedraft" class="btn btn-primary" >Save Draft/Preview</button>
<button type="submit" name="save" value="publish" class="btn btn-primary">Publish Post</button>
</div>
</div>
</fieldset>
</form>
</div>
@endsection