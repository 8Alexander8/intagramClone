<?php

use App\Profile;
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Builder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

//Post
Route::get('/', 'PostController@index');
Route::get('/p/create', 'PostController@create');
Route::get('/p/{post}', 'PostController@show');
Route::post('/p', 'PostController@store');

//Profile
Route::get('/profiles', 'ProfilesController@profilesList')->name('profiles.show');
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

//Follow
Route::post('/follow/{user}', 'FollowController@store');

//Search User
Route::any('/search', function () {
    $searchInput = Request::input('searchInput');

    // $user = User::where('username', 'LIKE', '%' . $searchInput . '%')->get();
    $user = Profile::whereHas('user', function (Builder $query) {
        $searchInput = Request::input('searchInput');
        $query->where('username', 'like', '%' . $searchInput . '%');
    })->get();
    if (count($user) > 0)
        return view('profiles.searchProfile')->withDetails($user)->withQuery($searchInput);
    else return view('profiles.searchProfile')->withMessage('No Details found. Try to search again !');
});
