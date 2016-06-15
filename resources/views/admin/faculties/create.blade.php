@extends('master')
@section('title')
@section('content')
<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Add Colleges/Faculties </h1>                                                
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

        <form class="form-horizontal" method="post">

        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <input type="hidden" name="formtype" value="new">
        <fieldset>
            <div class="form-group">
                <label for="select" class="col-lg-3 control-label">School </label>
                    <div class="col-lg-6">
                        <select class="form-control" id="schoolid" name="schoolid">
                        @foreach($schools as $school)
                        <option value="{!! $school->id !!}" >{!! $school->name !!}
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
        <th> <div class="col-lg-2">  Contact   </div></th>
        <th><div class="col-lg-5">  Email   </div></th>
        <th><div class="col-lg-3">  Phone  </div></th>
      </tr>
    </thead>
    <tbody>
      <tr>
            <input type="hidden" name="schl_id[]" value="{!! $school->id !!}">
          <td  class="col-lg-2">
              <input type="text" class="form-control" id="name" placeholder="Faculty Name" name="name[]" value="{{ old('name[]') }}">
       </td>
          <td  class="col-lg-3">             
                <input type="text" class="form-control" id="contact" placeholder="contact" name="contact[]" value="{{ old('contact[]') }}">
           </td>
          <td class="col-md-5">              
                 <input type="text" class="form-control" id="email" placeholder="email" name="email[]" value="{{ old('email[]') }}">
           </td>
          <td  class="col-lg-3">           
                 <input type="text" class="form-control" id="phone" placeholder="phone" name="phone[]" value="{{ old('phone[]') }}">
           </td>
         </tr>
         
      <tr>
          <input type="hidden" name="schl_id[]" value="{!! $school->id !!}">
          <td  class="col-lg-2">
              <input type="text" class="form-control" id="name" placeholder="Faculty Name" name="name[]" value="{{ old('name[]') }}">
       </td>
          <td  class="col-lg-3">             
                <input type="text" class="form-control" id="contact" placeholder="contact" name="contact[]" value="{{ old('contact[]') }}">
           </td>
          <td class="col-md-5">              
                 <input type="text" class="form-control" id="email" placeholder="email" name="email[]" value="{{ old('email[]') }}">
           </td>
          <td  class="col-lg-3">           
                 <input type="text" class="form-control" id="phone" placeholder="phone" name="phone[]" value="{{ old('phone[]') }}">
           </td>
         </tr>
         <tr>
             <input type="hidden" name="schl_id[]" value="{!! $school->id !!}">
          <td  class="col-lg-2">
              <input type="text" class="form-control" id="name" placeholder="Faculty Name" name="name[]" value="{{ old('name[]') }}">
       </td>
          <td  class="col-lg-3">             
                <input type="text" class="form-control" id="contact" placeholder="contact" name="contact[]" value="{{ old('contact[]') }}">
           </td>
          <td class="col-md-5">              
                 <input type="text" class="form-control" id="email" placeholder="email" name="email[]" value="{{ old('email[]') }}">
           </td>
          <td  class="col-lg-3">           
                 <input type="text" class="form-control" id="phone" placeholder="phone" name="phone[]" value="{{ old('phone[]') }}">
           </td>
         </tr>
         
          <tr>
            <input type="hidden" name="schl_id[]" value="{!! $school->id !!}">
          <td  class="col-lg-2">
              <input type="text" class="form-control" id="name" placeholder="Faculty Name" name="name[]" value="{{ old('name[]') }}">
       </td>
          <td  class="col-lg-3">             
                <input type="text" class="form-control" id="contact" placeholder="contact" name="contact[]" value="{{ old('contact[]') }}">
           </td>
          <td class="col-md-5">              
                 <input type="text" class="form-control" id="email" placeholder="email" name="email[]" value="{{ old('email[]') }}">
           </td>
          <td  class="col-lg-3">           
                 <input type="text" class="form-control" id="phone" placeholder="phone" name="phone[]" value="{{ old('phone[]') }}">
           </td>
         </tr>
         
      <tr>
          <input type="hidden" name="schl_id[]" value="{!! $school->id !!}">
          <td  class="col-lg-2">
              <input type="text" class="form-control" id="name" placeholder="Faculty Name" name="name[]" value="{{ old('name[]') }}">
       </td>
          <td  class="col-lg-3">             
                <input type="text" class="form-control" id="contact" placeholder="contact" name="contact[]" value="{{ old('contact[]') }}">
           </td>
          <td class="col-md-5">              
                 <input type="text" class="form-control" id="email" placeholder="email" name="email[]" value="{{ old('email[]') }}">
           </td>
          <td  class="col-lg-3">           
                 <input type="text" class="form-control" id="phone" placeholder="phone" name="phone[]" value="{{ old('phone[]') }}">
           </td>
         </tr>
         <tr>
             <input type="hidden" name="schl_id[]" value="">
          <td  class="col-lg-2">
              <input type="text" class="form-control" id="name" placeholder="Faculty Name" name="name[]" value="{{ old('name[]') }}">
       </td>
          <td  class="col-lg-3">             
                <input type="text" class="form-control" id="contact" placeholder="contact" name="contact[]" value="{{ old('contact[]') }}">
           </td>
          <td class="col-md-5">              
                 <input type="text" class="form-control" id="email" placeholder="email" name="email[]" value="{{ old('email[]') }}">
           </td>
          <td  class="col-lg-3">           
                 <input type="text" class="form-control" id="phone" placeholder="phone" name="phone[]" value="{{ old('phone[]') }}">
           </td>
         </tr>
         
          <tr>
            <input type="hidden" name="schl_id[]" value="">
          <td  class="col-lg-2">
              <input type="text" class="form-control" id="name" placeholder="Faculty Name" name="name[]" value="{{ old('name[]') }}">
       </td>
          <td  class="col-lg-3">             
                <input type="text" class="form-control" id="contact" placeholder="contact" name="contact[]" value="{{ old('contact[]') }}">
           </td>
          <td class="col-md-5">              
                 <input type="text" class="form-control" id="email" placeholder="email" name="email[]" value="{{ old('email[]') }}">
           </td>
          <td  class="col-lg-3">           
                 <input type="text" class="form-control" id="phone" placeholder="phone" name="phone[]" value="{{ old('phone[]') }}">
           </td>
         </tr>
         
      <tr>
          <input type="hidden" name="schl_id[]" value="">
          <td  class="col-lg-2">
              <input type="text" class="form-control" id="name" placeholder="Faculty Name" name="name[]" value="{{ old('name[]') }}">
       </td>
          <td  class="col-lg-3">             
                <input type="text" class="form-control" id="contact" placeholder="contact" name="contact[]" value="{{ old('contact[]') }}">
           </td>
          <td class="col-md-5">              
                 <input type="text" class="form-control" id="email" placeholder="email" name="email[]" value="{{ old('email[]') }}">
           </td>
          <td  class="col-lg-3">           
                 <input type="text" class="form-control" id="phone" placeholder="phone" name="phone[]" value="{{ old('phone[]') }}">
           </td>
         </tr>
         <tr>
             <input type="hidden" name="schl_id[]" value="">
          <td  class="col-lg-2">
              <input type="text" class="form-control" id="name" placeholder="Faculty Name" name="name[]" value="{{ old('name[]') }}">
       </td>
          <td  class="col-lg-3">             
                <input type="text" class="form-control" id="contact" placeholder="contact" name="contact[]" value="{{ old('contact[]') }}">
           </td>
          <td class="col-md-5">              
                 <input type="text" class="form-control" id="email" placeholder="email" name="email[]" value="{{ old('email[]') }}">
           </td>
          <td  class="col-lg-3">           
                 <input type="text" class="form-control" id="phone" placeholder="phone" name="phone[]" value="{{ old('phone[]') }}">
           </td>
         </tr>
         
          <tr>
            <input type="hidden" name="schl_id[]" value="">
          <td  class="col-lg-2">
              <input type="text" class="form-control" id="name" placeholder="Faculty Name" name="name[]" value="{{ old('name[]') }}">
       </td>
          <td  class="col-lg-3">             
                <input type="text" class="form-control" id="contact" placeholder="contact" name="contact[]" value="{{ old('contact[]') }}">
           </td>
          <td class="col-md-5">              
                 <input type="text" class="form-control" id="email" placeholder="email" name="email[]" value="{{ old('email[]') }}">
           </td>
          <td  class="col-lg-3">           
                 <input type="text" class="form-control" id="phone" placeholder="phone" name="phone[]" value="{{ old('phone[]') }}">
           </td>
         </tr>
         
      <tr>
          <input type="hidden" name="schl_id[]" value="">
          <td  class="col-lg-2">
              <input type="text" class="form-control" id="name" placeholder="Faculty Name" name="name[]" value="{{ old('name[]') }}">
       </td>
          <td  class="col-lg-3">             
                <input type="text" class="form-control" id="contact" placeholder="contact" name="contact[]" value="{{ old('contact[]') }}">
           </td>
          <td class="col-md-5">              
                 <input type="text" class="form-control" id="email" placeholder="email" name="email[]" value="{{ old('email[]') }}">
           </td>
          <td  class="col-lg-3">           
                 <input type="text" class="form-control" id="phone" placeholder="phone" name="phone[]" value="{{ old('phone[]') }}">
           </td>
         </tr>
         <tr>
             <input type="hidden" name="schl_id[]" value="">
          <td  class="col-lg-2">
              <input type="text" class="form-control" id="name" placeholder="Faculty Name" name="name[]" value="{{ old('name[]') }}">
       </td>
          <td  class="col-lg-3">             
                <input type="text" class="form-control" id="contact" placeholder="contact" name="contact[]" value="{{ old('contact[]') }}">
           </td>
          <td class="col-md-5">              
                 <input type="text" class="form-control" id="email" placeholder="email" name="email[]" value="{{ old('email[]') }}">
           </td>
           <td  class="col-lg-3">           
                 <input type="text" class="form-control" id="phone" placeholder="phone" name="phone[]" value="{{ old('phone[]') }}">
           </td>
         </tr>
    </tbody>
  </table>
  </div>
   <div class="form-group">
                <div class="col-lg-6 col-lg-offset-3">
            
                <button type="submit" name="save" value="savefaculty" class="btn btn-primary">Save Faculties</button>
                </div>
            </div>
        </fieldset>
        </form>
    </div>
@endsection