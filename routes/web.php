<?php

use App\Http\Controllers\Blog\PostsController;  //
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


/*
//welcome page define by laravel
Route::get('/', function () {
    return view('welcome');
});*/






Route::get('/','WelcomeController@index')->name('welcome');

Route::get('blog/posts/{post}',[PostsController::class,'show'])->name('blog.show');

Route::get('blog/categories/{category}',[PostsController::class,'category'])->name('blog.category');

Route::get('blog/tags/{tag}',[PostsController::class,'tag'])->name('blog.tag');  //Post controller class is define the above



Auth::routes();
/*
create automatic

this is used to define list of route:
php artisan route:list

and it is made by passing command
php artisan  make:auth

and this route help us register bunch of other route in our App

it also provide login and register option in our application
*/

 
 Route::middleware(['auth'])->group(function () {
   
    Route::get('/home', 'HomeController@index')->name('home');
  
    Route::resource('categories','CategoriesController');
    /*
    hear we not use method like CategoriesController@index or any other because hear we use resource so it automitacally use all
    method
    */
  
    Route::resource('posts','PostsController'); 
    /*middle ('auth') page to check the coustomer is login or not
    or here we check the mst be redirect;
    */
   Route::resource('tags','TagsController');
  
    Route::get('trashed-posts','PostsController@trashed')->name('trashed-posts.index');
  
    Route::put('restore-post/{post}','PostsController@restore')->name('restore-posts');
    //here we use put for the security purpose  
});


Route::middleware(['auth','admin'])->group(function () {
     
    Route::get('users/profile','UsersController@edit')->name('users.edit-profile');

    Route::put('users/profile','UsersController@update')->name('users.update-profile');

    Route::get('users','UsersController@index')->name('users.index');
    
    Route::post('users/{user}/make-admin','UsersController@makeAdmin')->name('users.make-admin');

});





