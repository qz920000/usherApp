<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\School;

class AdminPagesController extends Controller
{
    //
    public function home()
        {
                $schools =School::all(); 
                return view('admin.adminhome',compact('schools'));
        }
public function create()
{
return view('admin.schools.create');
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
