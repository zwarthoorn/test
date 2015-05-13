<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\User;


Route::get('/', 'MainController@index');
Route::get('/catagory/{slug}', 'MainController@catagory');
Route::get('/cart/{slug}', 'MainController@putCart');
Route::group(['middleware'=>'authAdmin'],function()
{
	Route::get('adminDashboard','Test2Controller@index');
	Route::get('admin/members','MembersController@index');
	Route::get('admin/members/delete/{id}','MembersController@destroy');
	Route::get('admin/members/edit/{id}','MembersController@show');
	Route::get('admin/members/{email}','MembersController@emailSend');
	Route::post('admin/members/sendEmail','MembersController@fullEmailSend');
	Route::get('admin/logout','Test2Controller@logout');
	Route::resource('admin/catagory', 'CatagoryController');
	Route::resource('admin/brand', 'BrandController');
	Route::resource('admin/product', 'ProductController');
});

	Route::get('rankcheck',function ()
	{
		if (Auth::check()) {
			$user = User::find(Auth::user()->id);
			$user->online = 1;
			$user->save();

			if (Auth::user()->state_id == 1) {
				return redirect('/adminDashboard');
			}else{
				return redirect('/');
			}
		}else{
			return redirect('/auth/login');
		}
	});

Route::group(['middleware'=>'authUser'],function()
{
	Route::get('account','UserInfoController@index');
	Route::post('account/update','UserInfoController@store');
	Route::get('account/email','UserInfoController@ChangeEmail');
	Route::post('account/email','UserInfoController@postChangeEmail');
	Route::get('account/password','UserInfoController@ChangePassword');
	Route::post('account/password','UserInfoController@PostChangePassword');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('logout',function ()
{
});

Route::get('register', 'UserController@registerForm');
Route::post('register', 'UserController@registerPut');