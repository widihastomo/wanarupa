<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'WelcomeController@index');
Route::get('/account', function(){
    return view('account.index');
});
Route::model('user', 'User');
Route::bind('user', function($value, $route)
{
    $user =  App\User::where('username', $value)->first();
    if (is_null($user)){
        throw new NotFoundHttpException;
    }
    return $user;
});

//Route::resource('artist', 'ArtistController');
Route::get('artist/{user}','ArtistController@show');

Route::get('boss', 'AdminController@index');
Route::get('home', 'HomeController@index');
Route::get('dashboard', 'DashboardController@index');
Route::get('dashboard/nav/{id}', 'DashboardController@getcontent');
Route::get('upload', 'UploadController@create');

Route::post('upload',[
    'as' => 'upload',
    'uses' => 'UploadController@store'
]);

Route::get('/artworks/{slug}', [
    'as' => 'artwork',
    'uses' => 'ArtworksController@show'
]);

Route::get('/images/{filename}/{type}', [
    'as' => 'images',
    'uses' => 'ImagesController@get'
]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
