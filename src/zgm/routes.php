<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

// HomeController
Route::get('/login','HomeController@getLogin');
Route::get('/register','HomeController@getRegister');
Route::get('/contact','HomeController@contact');
Route::post('/login','HomeController@postLogin');
Route::post('/register','HomeController@postRegister');
Route::get('/logout', 'HomeController@getLogout');
Route::get('/help', 'HomeController@help');

// AccountController
Route::get('/account','AccountController@Index');
Route::get('/account/view','AccountController@getAccount');
Route::get('/account/view/{name}','AccountController@getShowAccount');
Route::get('/account/profile','AccountController@getProfile');
Route::get('/account/add/{name}','AccountController@getAddAccount');
Route::post('/account/add/{name}','AccountController@postAddAccount');
Route::post('/account/profile', 'AccountController@updateProfile');

// NewsController
Route::get('/news/{id}','NewsController@read');
Route::get('/news/add','NewsController@add');
Route::get('/news/edit','NewsController@edit');
Route::post('/news/edit','NewsController@update');
Route::get('/news/view','NewsController@view');

// AdminController

Route::get('admin/','AdminController@index');
Route::get('/admin/member','AdminController@getAccounts');
Route::get('/admin/member/json','AdminController@getAccountsJson');
Route::get('/admin/member/{id}','AdminController@editAccount');
Route::get('admin/test','AdminController@Test');
Route::post('/admin/member/{id}/del','AdminController@postDelAccount');
Route::post('/admin/member/{id}/edit','AdminController@postEditAccount');

Route::get('admin/member/register','AdminController@getRegister');
Route::post('admin/member/register','AdminController@postRegister');

//Route::get();