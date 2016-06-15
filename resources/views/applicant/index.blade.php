@extends('master')
@section('title', 'All users')
@section('content')

<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">{{$pagetitle}}</h1>                                                
                        <span class="subheading"> </span>
                        </p>
                </div>
        </header>
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
@if ($users->isEmpty())
<p> There is no user.</p>
@else
<table class="table-responsive" width="100%">
<thead>
<tr>


<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>City</th>
<th>State</th>
</tr>
</thead>
<tbody>
@foreach($users as $user)
<tr>
<td>
<a href="">{!! $user->firstname .' '.$user->lastname !!} </a>

</td>
<td>{!! $user->email !!}</td>
<td>{!! $user->phone !!}</td>
<td>{!! $user->city !!}</td>
<td>{!! $user->state !!}</td>
</tr>
@endforeach
</tbody>
</table>

<!--@foreach($users as $user)
{!! $user->id !!} -

{!! $user->email !!}-
{!! $user->created_at !!}-

@endforeach
@endif-->

@endsection