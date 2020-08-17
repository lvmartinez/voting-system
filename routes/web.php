<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'CategoryController@index')->name('home');

Auth::routes(['verify' => true]);

Route::get('/login', function(){
   return view('election-home');
})->name('login');

Route::get('/home', 'CategoryController@index')->middleware('verified');

Route::get('/', 'CategoryController@index')->middleware('auth');

//1
//only admin and moderator can access
/*Route::middleware('moderator')->group(function () {

    Route::resource('nominationUsers', 'NominationUserController');

    //users
    Route::get('users', 'UserController@index');
    Route::get('users/{id}/edit', 'UserController@edit');
    Route::delete('users/{id}', 'UserController@destroy');
    Route::match( ['put', 'patch'], 'users/{id}', 'UserController@update');



    //categories
    Route::match(['put', 'patch'], 'categories/{id}', 'CategoryController@update');
    Route::delete('categories/{id}', 'CategoryController@destroy');
    Route::get('categories/create', 'CategoryController@create');
    Route::post('categories', 'CategoryController@store');



    //nominations
    Route::match(['put', 'patch'], 'nominations/{id}', 'NominationController@update');
    Route::delete('nominations/{id}', 'NominationController@destroy');

    //votings
    Route::match(['put', 'patch'], 'votings/{id}', 'VotingController@update');
    Route::delete('votings/{id}', 'VotingController@destroy');

    Route::resource('categories', 'CategoryController');

    Route::resource('nominations', 'NominationController');

    Route::resource('votings', 'VotingController');

});*/

//only admin can see this
Route::middleware(['admin'])->group(function () {

        Route::resource('settings', 'SettingController');
        Route::resource('roles', 'RoleController');
        Route::resource('users', 'UserController');
        Route::resource('categories', 'CategoryController');
        Route::resource('nominations', 'NominationController');
        Route::resource('nominationUsers', 'NominationUserController');
        Route::resource('votings', 'VotingController');
});

//must be logged in
Route::middleware('auth')->group(function () {

    Route::resource('nominations', 'NominationController', [
        'except' => ['edit', 'update', 'destroy']
    ]);

    Route::resource('votings', 'VotingController', [
        'except' => ['index','edit', 'update', 'destroy']
    ]);

    Route::resource('users', 'UserController', [
        'only' => ['show', 'edit', 'update']
    ]);

    Route::resource('categories', 'CategoryController', [
        'except' => ['create', 'store', 'update', 'destroy','edit']
    ]);

});
