@extends('master')
@section('title')
@section('content')
<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Add Courses </h1>                                                
                        <span class="subheading"><h3> Add courses for {!! $schools->name !!} </h3></span>
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

  

        <form class="form-horizontal" method="post">

        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <input type="hidden" name="formtype" value="new">
        <fieldset>
            

               <div class="form-group">
                <label for="select" class="col-lg-3 control-label">Select Faculty </label>
                    <div class="col-lg-6">
                        <select class="form-control" id="facultyid" name="facultyid">
                        @foreach($faculties as $faculty)
                        <option value="{!! $faculty->id !!}" >{!! $faculty->name !!}
                        </option>
                        @endforeach
                        </select>                        
                    </div>
            </div>

            <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th> <div class="col-lg-2">  Dept/Course   </div>
        </th>
         <th><div class="col-lg-5">  Email   </div></th>
        <th><div class="col-lg-3">  Phone  </div></th>
      </tr>
    </thead>
    <tbody>
        
         <tr>
            <input type="hidden" name="schoolid[]" value="{{$schools->id }}">
          <td  class="col-lg-2"> 
              <label for="bachelors" class="control-label">Course/Dept Name
              <input type="text" class="form-control" id="name" placeholder="Course Name" name="name[]" value="{{ old('name[]') }}">
              </label>
           </td>
         
       <td  class="col-lg-5 inline" >            
                 <label for="bachelors" class="col-lg-3 control-label">Bachelors
                <div class="col-lg-3">
                    <select class="" id="bachelors" name="bachelors[]">                 
                     <option value="" >Select</option>
                     <option value="BSc" >BSc</option>
                     <option value="BA">BA</option>
                     <option value="Beng" >BEng</option>
                     <option value="bachelor" >Bachelor</option>
                     </select>
                </div>
                 </label>
           
               <label for="masters" class="col-lg-3 control-label">Masters
                <div class="col-lg-3">
                    <select class="" id="masters" name="masters[]" >            
                     <option value="" >Select</option>
                     <option value="MSc" >MSc</option>
                     <option value="MA">MA</option>
                     <option value="Meng" >MEng</option>
                     <option value="Master" >Master</option>
                     </select>
                </div></label>
           
           
                  <label for="doctorate" class="col-lg-3 control-label">Doctorate
                <div class="col-lg-3">
                    <select class="" id="doctorate" name="doctorate[]" >                 
                     <option value="" >Select</option>
                     <option value="PhD" >PhD</option>
                     <option value="Doctorate">Doctorate</option>
                      </select>
                </div></label>
                                   
                </td>
                    <td  class="col-lg-3"> Other Degrees          
              <input type="text" class="form-control" id="degree1" placeholder="other degrees" name="degree1[]" value="{{ old('degree1[]') }}">
           </td>
         </tr>
          <tr>
                    
          <td  class="col-lg-3">Contact             
                <input type="text" class="form-control" id="contact" placeholder="contact" name="contact[]" value="{{ old('contact[]') }}">
           </td>
          <td class="col-md-5"> Email              
                 <input type="text" class="form-control" id="email" placeholder="email" name="email[]" value="{{ old('email[]') }}">
           </td>
          <td  class="col-lg-3"> Phone          
                 <input type="text" class="form-control" id="phone" placeholder="phone" name="phone[]" value="{{ old('phone[]') }}">
           </td>
         </tr>
         
          <tr>
               <input type="hidden" name="schoolid[]" value="{{$schools->id }}">
          <td  class="col-lg-2"> 
              <label for="bachelors" class="control-label">Course/Dept Name
              <input type="text" class="form-control" id="name" placeholder="Course Name" name="name[]" value="{{ old('name[]') }}">
              </label>
       </td>
         
       <td  class="col-lg-5 inline" >            
                 <label for="bachelors" class="col-lg-3 control-label">Bachelors
                <div class="col-lg-3">
                    <select class="" id="bachelors" name="bachelors[]">                 
                     <option value="" >Select</option>
                     <option value="BSc" >BSc</option>
                     <option value="BA">BA</option>
                     <option value="BEng" >BEng</option>
                     <option value="Bachelors" >Bachelor</option>
                     </select>
                </div>
                 </label>
           
                       <label for="masters" class="col-lg-3 control-label">Masters
                <div class="col-lg-3">
                    <select class="" id="masters" name="masters[]" >            
                     <option value="" >Select</option>
                     <option value="MSc" >MSc</option>
                     <option value="MA">MA</option>
                     <option value="MEng" >MEng</option>
                     <option value="Masters" >Master</option>
                     </select>
                </div></label>
           
           
                  <label for="doctorate" class="col-lg-3 control-label">Doctorate
                <div class="col-lg-3">
                    <select class="" id="doctorate" name="doctorate[]" >                 
                     <option value="" >Select</option>
                     <option value="PhD" >PhD</option>
                     <option value="Doctorate">Doctorate</option>
                      </select>
                </div></label>
                                   
                </td>
                    <td  class="col-lg-3"> Other Degrees          
              <input type="text" class="form-control" id="degree1" placeholder="other degrees" name="degree1[]" value="{{ old('degree1[]') }}">
           </td>
         </tr>
          <tr>
                    
          <td  class="col-lg-3">Contact             
                <input type="text" class="form-control" id="contact" placeholder="contact" name="contact[]" value="{{ old('contact[]') }}">
           </td>
          <td class="col-md-5"> Email              
                 <input type="text" class="form-control" id="email" placeholder="email" name="email[]" value="{{ old('email[]') }}">
           </td>
          <td  class="col-lg-3"> Phone          
                 <input type="text" class="form-control" id="phone" placeholder="phone" name="phone[]" value="{{ old('phone[]') }}">
           </td>
         </tr>
      <tr>
               <input type="hidden" name="schoolid[]" value="{{$schools->id }}">
          <td  class="col-lg-2"> 
              <label for="bachelors" class="control-label">Course/Dept Name
              <input type="text" class="form-control" id="name" placeholder="Course Name" name="name[]" value="{{ old('name[]') }}">
              </label>
       </td>
         
       <td  class="col-lg-5 inline" >            
                 <label for="bachelors" class="col-lg-3 control-label">Bachelors
                <div class="col-lg-3">
                    <select class="" id="bachelors" name="bachelors[]">                 
                     <option value="" >Select</option>
                     <option value="BSc" >BSc</option>
                     <option value="BA">BA</option>
                     <option value="Beng" >BEng</option>
                     <option value="bachelor" >Bachelor</option>
                     </select>
                </div>
                 </label>
           
                       <label for="masters" class="col-lg-3 control-label">Masters
                <div class="col-lg-3">
                    <select class="" id="masters" name="masters[]" >            
                     <option value="" >Select</option>
                     <option value="MSc" >MSc</option>
                     <option value="MA">MA</option>
                     <option value="Meng" >MEng</option>
                     <option value="Master" >Master</option>
                     </select>
                </div></label>
           
           
                  <label for="doctorate" class="col-lg-3 control-label">Doctorate
                <div class="col-lg-3">
                    <select class="" id="doctorate" name="doctorate[]" >                 
                     <option value="" >Select</option>
                     <option value="PhD" >PhD</option>
                     <option value="Doctorate">Doctorate</option>
                      </select>
                </div></label>
                                   
                </td>
                    <td  class="col-lg-3"> Other Degrees          
              <input type="text" class="form-control" id="degree1" placeholder="other degrees" name="degree1[]" value="{{ old('degree[]') }}">
           </td>
         </tr>
          <tr>
                   
          <td  class="col-lg-3">Contact             
                <input type="text" class="form-control" id="contact" placeholder="contact" name="contact[]" value="{{ old('contact[]') }}">
           </td>
          <td class="col-md-5"> Email              
                 <input type="text" class="form-control" id="email" placeholder="email" name="email[]" value="{{ old('email[]') }}">
           </td>
          <td  class="col-lg-3"> Phone          
                 <input type="text" class="form-control" id="phone" placeholder="phone" name="phone[]" value="{{ old('phone[]') }}">
           </td>
         </tr>
         
          
         </tbody>
  </table>
  </div>
   <div class="form-group">
                <div class="col-lg-6 col-lg-offset-3">
            
                <button type="submit" name="save" value="savefaculty" class="btn btn-primary">Save Courses</button>
                </div>
            </div>
        </fieldset>
        </form>
    </div>
@endsection