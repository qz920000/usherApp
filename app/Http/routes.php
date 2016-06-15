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
Route::group(['middleware' => ['web']], function () {
Route::get('/', function () {
    return view('welcome');
});
//Route::group(['middleware' => ['web']], function () {
//Route::get('site/extern/{name?}', function () {    return view('external');})->name('extern');
Route::get('site/extern/{name?}', 'PagesController@show_external')->name('extern');
//});

Route::get('/loggedin', 'HomeController@loggedin')->name('loggedin');
Route::get('/servicesd', 'PagesController@services')->name('services');
Route::get('/terms', 'PagesController@terms')->name('terms');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);
Route::get('/home', ['as' => 'home', 'uses' => 'PagesController@home']);
Route::get('blog', ['as' => 'blog', 'uses' => 'PagesController@contact']);
Route::get('/contact', ['as' => 'contact', 'uses' => 'PagesController@contact']);
Route::post('/contact', ['as' => 'contact', 'uses' => 'ContactController@store']);
//Route::get('posts/entry/{name?}', 'posts\PostsController@showposts')->name('showcat_posts');
Route::get('posts/subentry/{name?}', 'PagesController@show_subentry')->name('showsubcat_posts');
Route::get('posts/entry/{name?}', 'PagesController@show_entry')->name('showcat_posts');
Route::get('image/delete/{id?}','ImageController@destroy2');

Route::post('/contact', ['as' => 'contact', 'uses' => 'ContactController@store']);


//Images
Route::get('manageimages', 'ImageController@upload' )->name('uploadform'); //devartisan
//Route::post('imageUploadForm', 'ImageController@storeimage' )->name('storeimage');
Route::get('showlists', 'ImageController@show' )->name('showimage');

Route::post('imageUploadForm', 'ImageController@store' )->name('uploadimage'); 
//Route::get('showlist', function() )->name('listimage');
Route::get('/images/{id?}', ['as' => 'listimage']);
Route::get('images/{id?}/deleteimage', 'ImageController@destroy2')->name('deleteimage');
Route::get('images/{id?}/deleteimage', 'ImageController@getDelete')->name('delete_image');
Route::get('images/{id?}/mainimage', 'ImageController@setMainImage')->name('set_main_image');

Route::get('/services',function(){
    $faker = Faker\Factory::create();

    $limit = 10;

    for ($i = 0; $i < $limit; $i++) {
      echo  $faker->randomElement($array = array ('black','adian','caucasian','hispanic')) . 
              ', Email Address: ' .               $faker->randomElement($array = array ('yes','no'))  . 
              ', Contact No' . $faker->boolean('chance_of_getting_true=50') . ', pppp '.
              $faker->words($nbWords = 3, $variableNbWords = true). 
                
                'title'. $faker->sentence($nbWords = 6, $variableNbWords = true).
                'headline'. $faker->sentence($nbWords = 6, $variableNbWords = true).
                'aboutme'. $faker->paragraph($nbSentences = 3, $variableNbSentences = true).
                'aboutmymatch'. $faker->paragraph($nbSentences = 3, $variableNbSentences = true).
                'description'. $faker->paragraphs($nb= 3, $asText = true) .
                'interests'. $faker->text($maxNbChars = 200).
              '<br>';
    }
});
/*
|--------------------------------------------------------------------------
| Usher Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



//Route::get('users/{id?}/edit', 'users\UsersController@edit')->name('useredit');
//Route::post('users/{id?}/edit','users\UsersController@update')->name('userupdate');
//
Route::get('usher/editprofile', 'usher\UshersController@edit')->name('usherprofileedit');
//Route::post('users/editprofile','users\UserProfileController@update')->name('userprofileupdate');
//
////Route::get('/userprofile/assetsaved','users\UsersController@saveAsset')->name('saveAsset');
Route::get('/usher/{name?}/usersaved','usher\AllController@saveUsher')->name('saveUsher');
Route::get('/usher/{name?}/uusersaved','usher\AllController@deleteSavedUsher')->name('deleteSavedUsher');
Route::get('/client/{name?}/usersaved','usher\AllController@saveClient')->name('saveclient');
Route::get('/client/{name?}/uusersaved','usher\AllController@deleteSavedClient')->name('deleteSavedclient');
Route::get('/event/{name?}/usersaved','usher\AllController@saveUser')->name('saveevent');
Route::get('/event/{name?}/uusersaved','usher\AllController@deleteSavedUser')->name('deleteSavedEvent');

Route::get('/usher/{name?}/h/{ttp?}','usher\AllController@hireUsher')->name('offer');
//Route::get('/usher/{name?}/hire/offer','usher\AllController@offerUsher')->name('offer');
//Route::get('/usher/{name?}/hire/withdraw','usher\AllController@withdrawOffer')->name('withdraw');
//Route::get('/usher/{name?}/hire/waitlist','usher\AllController@waitlist')->name('waitlist');
//Route::get('/usher/{name?}/uusersaved','usher\AllController@deleteSavedUsher')->name('deleteSavedUsher');
//Route::get('/userprofile/{name?}/friendsaved','users\UserProfileController@saveFriend')->name('saveFriend');
//Route::get('/userprofile/{name?}/ufriendsaved','users\UserProfileController@deleteSavedFriend')->name('deleteFriend');
Route::get('/event/{id?}', 'usher\AllController@showevent')->name('showevent');
Route::get('/events/{showtype?}','usher\AllController@showEvents')->name('showevents');
Route::get('/ushert/{showtype?}', 'usher\AllController@showgeneral')->name('showgen');
Route::get('/usher/{name?}', 'usher\UshersController@show')->name('showusher');
Route::post('/usher/{name?}', 'usher\AllController@hireUsher');
Route::get('/ushersm/{showtype?}','usher\AllController@showUsers')->name('showushers');
Route::get('/ushers/browse/','usher\UshersController@index')->name('browseushers');
//
//
//Route::get('/userprofile/{name?}/assetsaved','users\UserProfileController@saveAsset')->name('saveAsset');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------

|
*/

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

Route::get('/applicants', [ 'as' => 'applicants', 'uses' => 'ApplicantController@index']);
Route::get('application/create', 'ApplicantController@create')->name('apply');
Route::post('application/create', 'ApplicantController@store');

/////////////////////////////////////////////////////////////////////

Route::get('user/{user}', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'UserController@index',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);

Route::get('/users', [ 'as' => 'user.index', 'uses' => 'users\UsersController@index']);
//Route::post('/userprofile/{name?}','ContactController@sendEmailtoUser');
//Route::get('/usersprofile', 'Admin\SchoolsController@index')->name('userprofile');
//Route::get('/userprofile/{name?}', 'users\UsersController@show')->name('userprofile');

Route::get('users/{id?}/edit', 'users\UsersController@edit')->name('useredit');
Route::post('users/{id?}/edit','users\UsersController@update')->name('userupdate');

Route::get('users/editprofile', 'users\UserProfileController@edit')->name('userprofileedit');
Route::post('users/editprofile','users\UserProfileController@update')->name('userprofileupdate');

//Route::get('/userprofile/assetsaved','users\UsersController@saveAsset')->name('saveAsset');
Route::get('/userprofile/{name?}/usersaved','users\UserProfileController@saveUser')->name('saveUser');
Route::get('/userprofile/{name?}/uusersaved','users\UserProfileController@deleteSavedUser')->name('deleteSavedUser');
Route::get('/userprofile/{name?}/friendsaved','users\UserProfileController@saveFriend')->name('saveFriend');
Route::get('/userprofile/{name?}/ufriendsaved','users\UserProfileController@deleteSavedFriend')->name('deleteFriend');
Route::get('/userprofile/{name?}', 'users\UserProfileController@show')->name('userprofile');
Route::get('/usersm/{showtype?}','users\UserProfileController@showUsers')->name('showusers');
Route::get('/users/browse/','users\UserProfileController@index')->name('browse');


Route::get('/userprofile/{name?}/assetsaved','users\UserProfileController@saveAsset')->name('saveAsset');
Route::get('posts/userposts/{posttype?}', 'posts\PostsController@showMyPosts')->name('mypost');
Route::get('posts/user/mydrafts', 'posts\PostsController@showMyDrafts')->name('mydraft');
//Route::get('posts/user/mycomments', 'PostsController@showComments')->name('mycomments');
Route::post('/userprofile/{name?}','MailboxController@sendEmailtoUser');
Route::get('/mailbox/{mailfolder?}/mail','MailboxController@index')->name('mailbox');
Route::get('/mailbox/{mailfolder?}/mail/{mid?}/rd/{rd}','MailboxController@markAsRead')->name('markread');
Route::get('/mailbox/{mailfolder?}/mail/{mid?}/fl/{rd}','MailboxController@markAsFlagged')->name('flag');
Route::get('/mailbox/message/{mailid?}/fd/{folder?}','MailboxController@show')->name('showmail');
Route::post('/mailbox/message/{mailid?}/fd/{folder?}','MailboxController@replyEmailtoUser');

Route::get('/mailbox/del_message/{mailid?}/fd/{folder?}','MailboxController@deleteMessage')->name('del_msg');
Route::get('/mailbox/res_message/{mailid?}/fd/{folder?}','MailboxController@restoreMessage')->name('res_msg');
//Route::post('/mailbox/message/{mailid?}/fd/{folder?}','MailboxController@show')->name('showmail');
//Route::get('/2/mailbox','MailboxController@index')->name('sentbox');
//Route::get('/3/mailbox','MailboxController@index')->name('deleted');

/////////////////////////////////////////////////////////////

Route::get('postsdrafts', 'posts\PostsController@showdrafts')->name('showdrafts');
Route::post('posts/{id?}', 'CommentsController@newComment')->name('comment');

Route::get('/faculties', 'Admin\FacultiesController@index')->name('facultieshome');
Route::get('/faculties/{id?}', 'Admin\FacultiesController@show')->name('showfaculty');

Route::get('/courses', 'Admin\CoursesController@index')->name('courseshome');
Route::get('/courses/{id?}', 'Admin\CoursesController@show')->name('showcourse');


    //
//});

/*
|--------------------------------------------------------------------------
| Register/Login Routes
|--------------------------------------------------------------------------

|
*/

//Route::get('/register', 'Auth\AuthController@getRegister')->name('register');
//Route::post('/register', 'Auth\AuthController@postRegister');
////Route::get('register/verify/{activationCode}', [
////    'as' => 'confirmation_path',
////    'uses' => 'Auth\AuthController@confirm'
////]);
//
//Route::get('/login', 'Auth\AuthController@getLogin')->name('login');
//Route::post('/login', 'Auth\AuthController@postLogin');
////Route::post('users/login', 'Auth\SessionsController@postLogin');
//Route::get('/logout', 'Auth\AuthController@getLogout')->name('logout');

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
//Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', ['as' => 'home', 'uses' => 'PagesController@home']);
    

    //Route::get('/home', 'HomeController@index');
});
