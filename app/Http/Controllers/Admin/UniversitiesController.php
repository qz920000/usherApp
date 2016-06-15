<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UniverstiesController extends Controller
{
    //
    public function create()
{
return view('admin.schools.create', array('title' => 'Welcome','description' => '','page' => 'addschool'));
//return view('checkout', array('title' => 'Welcome','description' => '','page' => 'home'));
}
public function store()
{
//return view('contact');
}
public function update()
{
//return view('about');
}


public function edit()
{
//return view('about');
}
}
