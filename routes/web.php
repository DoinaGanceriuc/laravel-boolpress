<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('guest.welcome');
});

Route::get('/posts', function () {
    return view('guest.blog.index');
})->name('guest.blog.index');

Auth::routes();

Route::get('guest/posts/index', 'PostController@index')->name('guest.posts.index');
Route::get('guest/posts/{post:slug}', 'PostController@show')->name('guest.posts.show');

Route::get('categories/{category:slug}/posts', 'CategoryController@posts')->name('categories.posts');
Route::get('tags/{tag:slug}/posts', 'TagController@posts')->name('tags.posts');

Route::get('guest/contacts', 'PageController@index')->name('guest.contacts');
Route::post('guest/contacts', 'ContactController@store')->name('guest.contacts.send');

Route::namespace ('Admin')->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController');
    Route::resource('contacts', 'ContactController')->only('index', 'show', 'destroy');

});
