<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['web']], function () {
Route::get('nysc', function () {
    return view('external');
})->name('extern');
});

Route::get('/about', 'PagesController@about')->name('about');
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);
Route::get('/home', ['as' => 'home', 'uses' => 'PagesController@home']);
Route::get('blog', ['as' => 'blog', 'uses' => 'PagesController@contact']);
Route::get('/contact', ['as' => 'contact', 'uses' => 'PagesController@contact']);
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------

|
*/
Route::group(['middleware' => ['web']], function () {
Route::group(array('prefix' => 'admin', 'namespace' => 'Admin'), function () {
Route::get('/', ['as' => 'adminhome', 'uses' => 'AdminPagesController@home']);
Route::get('schools/create', 'SchoolsController@create')->name('add_school');
Route::post('schools/create', 'SchoolsController@store')->name('create_school');
Route::get('schools/{id?}/edit', 'SchoolsController@edit')->name('edit_school');
Route::post('schools/{id?}/edit','SchoolsController@update')->name('update-school');
Route::get('schools/{id?}/editprofile', 'SchoolsController@editSchoolProfile')->name('edit_school_profile');
Route::post('schools/{id?}/editprofile','SchoolsController@updateSchoolProfile')->name('update_school_profile');
        
Route::get('faculties/create', 'FacultiesController@create')->name('add_faculty');
Route::post('faculties/create', 'FacultiesController@store')->name('create_faculty');
Route::get('faculties/{id?}/edit', 'FacultiesController@edit')->name('edit_faculty');
Route::post('faculties/{id?}/edit', 'FacultiesController@update')->name('update_faculty');

Route::get('courses/create0', 'CoursesController@pre_create')->name('add_course_prepage');
Route::post('courses/create0', 'CoursesController@pre_create2')->name('add_course_prepage2');
Route::get('courses/{id?}/create', 'CoursesController@create')->name('add_course');
Route::post('courses/{id?}/create', 'CoursesController@store')->name('create_course');
Route::get('courses/{id?}/edit', 'CoursesController@edit')->name('edit_course');
Route::post('courses/{id?}/edit', 'CoursesController@update')->name('update_course');



//Route::get('categories', 'CategoriesController@index')->name('category_home');
});

Route::get('/schools', 'Admin\SchoolsController@index')->name('schoolshome');
Route::get('/school/{id?}', 'Admin\SchoolsController@show')->name('showschool');

Route::get('posts/create', 'posts\PostsController@create')->name('add_post');
Route::post('posts/create', 'posts\PostsController@store')->name('create_post');
Route::get('posts/{id?}', 'posts\PostsController@show')->name('showpost');
Route::get('posts/{id?}/preview', 'posts\PostsController@showpreview')->name('showpreview');
Route::get('posts/{id?}/edit', 'posts\PostsController@edit');
Route::post('posts/{id?}/edit','posts\PostsController@update');
Route::get('allposts', 'posts\PostsController@index')->name('showposts');
Route::get('posts/entry/{name?}', 'posts\PostsController@showposts')->name('showcat_posts');


Route::get('postsdrafts', 'posts\PostsController@showdrafts')->name('showdrafts');
Route::post('posts/{id?}', 'CommentsController@newComment')->name('comment');

Route::get('/faculties', 'Admin\FacultiesController@index')->name('facultieshome');
Route::get('/faculties/{id?}', 'Admin\FacultiesController@show')->name('showfaculty');

Route::get('/courses', 'Admin\CoursesController@index')->name('courseshome');
Route::get('/courses/{id?}', 'Admin\CoursesController@show')->name('showcourse');

Route::get('/users', 'Admin\SchoolsController@index')->name('userprofile');
    //
});

/*
|--------------------------------------------------------------------------
| Register/Login Routes
|--------------------------------------------------------------------------

|
*/

/*
|--------------------------------------------------------------------------
| Post Routes
|--------------------------------------------------------------------------

|
*/

/*
|--------------------------------------------------------------------------
| Blog Routes
|--------------------------------------------------------------------------

|
*/

/*
|--------------------------------------------------------------------------
| General menu Routes
|--------------------------------------------------------------------------

|
*/