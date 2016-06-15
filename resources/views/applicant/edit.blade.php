@extends('master')
@section('title', $pagetitle)
@section('content')
<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">{{$pagetitle}}</h1>                                                
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
                <label for="email" class="col-lg-2 control-label">User Email</label>
                <div class="col-lg-10">
                <input type="text" class="form-control" id="email" placeholder="email" name="email"  value="{{ $user->email }}">
                </div>
            </div>  
           <div class="form-group">
                    <label for="firstname" class="col-lg-2 control-label">Firstname</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="firstname" placeholder="Firstname" name="firstname" value="{{ $user->firstname }}">
                    </div>
            </div>
            
          <div class="form-group">
                    <label for="lastname" class="col-lg-2 control-label">Lastname</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="lastname" placeholder="Lastname" name="lastname" value="{{ $user->lastname }}">
                    </div>
            </div>    
            

          <div class="form-group">
                    <label for="phone" class="col-lg-2 control-label">Phone number</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="phone" placeholder="phone" name="phone" value="{{ $user->phone }}">
                    </div>
            </div>

            <div class="form-group">
                <label for="address" class="col-lg-2 control-label">Address</label>
                <div class="col-lg-10">
                <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="{{ $user->address }}">
                </div>
            </div>
    
    
           <div class="form-group">
               <label for="city" class="col-lg-2 control-label">City</label>
                <div class="col-lg-10">
                <input type="text" class="form-control" id="city" placeholder="city" name="city" value="{{ $user->city }}">
                </div>
            </div>   

     
      <div class="form-group">
                <label for="role" class="col-lg-2 control-label">Role</label>
                <div class="col-lg-6">
                    <select class="form-control"  name="role" id="role">
                 
                     <option value="" >Select Role</option>
                        @foreach($roles as $role)
                        <option value="{!! $role->id !!}"  
                                @if($user->role_id == $role->id) selected="selected"  @endif>{!! $role->name !!}
                        </option>
                        @endforeach
                 
                    </select>
                </div>
            </div>
    



        <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">

        <button type="submit" name="save" value="" class="btn btn-primary" >Apply</button>
        
        </div>
        </div>
</fieldset>
</form>
</div>
@endsection