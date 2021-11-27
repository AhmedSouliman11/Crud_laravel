<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\HelloController;
//use App\Http\Controllers\TestController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', 'PostController@index')->name('posts.index');

Route::get('/posts/create' , 'PostController@create')->name('posts.create');

Route::post('/posts', 'PostController@store')->name('posts.store');

Route::get('/posts/{post}/edit' , 'PostController@edit')->name('posts.edit');

Route::put('/posts/{post}' , 'PostController@update')->name('posts.update');

Route::get('/posts/{post}', 'PostController@show')->name('posts.show') ;

Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy') ;
/*
to store the posts that you are created
1-submit the form to url
2-store the data in db
3-make a redirection to /post
*/
/*
to make a table of posts :-
1- define a new route for the user in order to hit the url in browser
2- define a new controller
3- define a new view
4- define $posts array and pass it to the view
*/
/*
1-define a new route
2-define a new action
3- query db and then return view
*/
/*
Add description posts
1-column in the db
2-modify in the show
*/
/*
Create a post
1-define a new route
2-define a new action
3- query db and then return a view
*/
