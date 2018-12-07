<?php

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
// DB::table('posts')->insert([
//     'title' => 'My first post',
//     'body' => 'Lorem ipsum dolor sit amet',
// ]);

Route::resource('products','ProductController')->middleware('auth');

// Route::get('/', function () {
//     return view('index', ['name' => 'John']);
// });

Route::get('/blog/post', ['middleware' => 'auth', function () {
    return view('post');
}]);
//
// Route::get('/blog/post', function () {
//     return view('post');
// });

Route::get('/', function () {
    return view('welcome');
});
//
// Route::get('/contact', function () {
//     return view('contact');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
