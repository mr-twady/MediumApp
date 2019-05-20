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

/**
 * Controllers for Frontend Views
 */
Route::get("/{index?}", "ArticlesController@index")->where("index", "(/|index|articles|logout)"); //displays view that shows a list of admin's posts/articles
Route::post("/articles", "ArticlesController@create"); //create posts/articles
Route::get("/articles/{id}", "ArticlesController@show"); //displays view that shows detail of a post/article
Route::get("/users/{id}", "UserController@show"); //displays an admin's profile
Auth::routes(); //handles create admin and admin login

/**
 * Controllers for Backend Views
 */
Route::get('/home', 'HomeController@index')->name('home'); //admin dashboard
Route::post("/home", "ArticlesController@create"); //create posts/articles

