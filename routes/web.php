<?php

use App\Http\Controllers\Blog\PostsController;

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

Route::get('/', 'WelcomeController@index')->name('welcome');
//Route::get('/posts/{post}', [PostsController::class, 'show'])->name('blog.show'); // ini akan overwrite bagian 'Route::resource('posts', 'PostsController');', jadi tidak disarankan
Route::get('blog/posts/{post}', [PostsController::class, 'show'])->name('blog.show');
//Route::get('blog/posts/{post}', 'Blog\PostsController@show')->name('blog.show');
Route::get('blog/categories/{category}', [PostsController::class, 'category'])->name('blog.category');
Route::get('blog/tags/{tag}', [PostsController::class, 'tag'])->name('blog.tag');

Auth::routes();

//Route::group(function () {
Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories', 'CategoriesController'); // 'resources' tanpa method
    //Route::resource('posts', 'PostsController')->middleware(['auth', 'verifyCategoriesCount']); // jika seperti ini, maka semua resource yang berhubungan dengan posts akan dicek
    //Route::resource('posts', 'PostsController')->middleware('auth');
    Route::resource('posts', 'PostsController');
    Route::resource('tags', 'TagsController');
    Route::get('trashed-post', 'PostsController@trashed')->name('trashed-posts.index');
    Route::put('restore-post/{post}', 'PostsController@restore')->name('restore-posts');

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
    Route::put('users/profile', 'UsersController@update')->name('users.update-profile'); // karena update, jadi pakai 'put'
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
    Route::post('users/{user}/make-writer', 'UsersController@makeWriter')->name('users.make-writer');
});

