@extends('master')
@section('title')
@section('content')
<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Edit Course </h1>                                                
                        <span class="subheading">School({{ $schools->name}}) </span>
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

        <form class="form-horizontal" method="post">

        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <input type="hidden" name="formtype" value="new">
        <fieldset>

            
            
            
            <div class="form-group">
                <label for="select" class="col-lg-3 control-label">Faculty </label>
                    <div class="col-lg-6">
                        <select class="form-control" id="facultyid" name="facultyid">
                        @foreach($faculties as $faculty)
                        <option value="{!! $faculty->id !!}" 
                                @if($faculty->id == $courses->faculty_id) selected="selected"  @endif  >{!! $faculty->name !!}
                        </option>
                        @endforeach
                        </select>
                    </div>

            </div>
            <div class="form-group">
                <label for="Name" class="col-lg-3 control-label">Course Name</label>
                <div class="col-lg-6">
                <input type="text" class="form-control" id="name" placeholder="School Name" name="name" value="{{ $courses->name}}">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-lg-3 control-label">Email</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="email" placeholder="email" name="email" value="{{ $courses->email}}">
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-lg-3 control-label">Phone</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="phone" placeholder="phone" name="phone" value="{{ $courses->phone}}">
                </div>
            </div>
             <div class="form-group">
                
                 <label for="bachelors" class="col-lg-3 control-label">Bachelors</label>
                <div class="col-lg-6">
                    <select class="form-control" id="bachelors" name="bachelors">                 
                     <option value="" >Select</option>
                     <option @if($courses->bachelors == "BSc") selected="selected"  @endif value="BSc" >BSc</option>
                     <option value="BA" @if($courses->bachelors == "BA") selected="selected"  @endif >BA</option>
                     <option value="BEng"@if($courses->bachelors == "BEng") selected="selected"  @endif  >BEng</option>
                     <option value="Bachelors" @if($courses->bachelors == "Bachelors") selected="selected"  @endif >Bachelor</option>
                     </select>
                </div>
                 
                 </div>
             <div class="form-group">
                       <label for="masters" class="col-lg-3 control-label">Masters</label>
                <div class="col-lg-6">
                    <select class="form-control" id="masters" name="masters" >            
                     <option value="" >Select</option>
                     <option value="MSc"@if($courses->masters == "MSc") selected="selected"  @endif  >MSc</option>
                     <option value="MA" @if($courses->masters == "MA") selected="selected"  @endif >MA</option>
                     <option value="MEng" @if($courses->masters == "MEng") selected="selected"  @endif >MEng</option>
                     <option value="Masters" @if($courses->masters == "Masters") selected="selected"  @endif >Master</option>
                     </select>
                </div>      
            </div>
            <div class="form-group">
                  <label for="doctorate" class="col-lg-3 control-label">Doctorate</label>
                <div class="col-lg-6">
                    <select class="form-control" id="doctorate" name="doctorate" >                 
                     <option value="" >Select</option>
                     <option value="PhD" @if($courses->doctorate == "PhD") selected="selected"  @endif >PhD</option>
                     <option value="Doctorate" @if($courses->doctorate == "Doctorate") selected="selected"  @endif >Doctorate</option>
                      </select>
                </div>
                                   
                
              
            </div>
            <div class="form-group">
                <label for="contact" class="col-lg-3 control-label">Contact</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="contact" placeholder="contact" name="contact" value="{{ $courses->contact}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="faculty_head" class="col-lg-3 control-label">Other Degree</label>
                <div class="col-lg-6">
                 <input type="text" class="form-control" id="degree1" placeholder="other degree" name="degree1" value="{{ $courses->other_degree}}">
                </div>
            </div>
          
            <div class="form-group">
                <div class="col-lg-6 col-lg-offset-3">
                
                <button type="submit" name="save" value="updatefaculty" class="btn btn-primary">Update Course</button>
                </div>
            </div>
        </fieldset>
        </form>
    </div>
@endsection