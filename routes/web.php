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

Route::get('/', function () {
	return view('welcome');
});
Auth::routes();
Route::get('/dashboard', 'HomeController@index');
//machine routes
Route::get('/machinery', 'MachineController@index');
Route::get('/add_machine', 'MachineController@add');
Route::post('/create', 'MachineController@create');
Route::get('/edit_machine/{id}', 'MachineController@edit');
Route::post('/create/{id}', 'MachineController@update');
Route::get('/delete_machine/{id}', 'MachineController@destroy');
//enquiry routes
Route::get('/enquiries', 'EnquiryController@index');
Route::get('/add_enquiry', 'EnquiryController@add');
Route::post('/create_enquiry', 'EnquiryController@create');
Route::get('/edit_enquiry/{id}', 'EnquiryController@edit');
Route::post('/create_enquiry/{id}', 'EnquiryController@update');
Route::get('/delete_enquiry/{id}', 'EnquiryController@destroy');
//customer routes
Route::get('/customers', 'CustomerController@index');
Route::get('/add_customer', 'CustomerController@add');
Route::post('/create_customer', 'CustomerController@create');
Route::get('/edit_customer/{id}', 'CustomerController@edit');
Route::post('/create_customer/{id}', 'CustomerController@update');
Route::get('/delete_customer/{id}', 'CustomerController@destroy');
//user routes
Route::get('/users', 'UserController@index');
Route::get('/add_user', 'UserController@add');
Route::post('/create_user', 'UserController@create');
Route::get('/edit_user/{id}', 'UserController@edit');
Route::post('/create_user/{id}', 'UserController@update');
Route::get('/delete_user/{id}', 'UserController@destroy');
//Country routes
Route::get('/country', 'CountryController@index');
Route::get('/add_country', 'CountryController@add');
Route::post('/create_country', 'CountryController@create');
Route::get('/edit_country/{id}', 'CountryController@edit');
Route::post('/create_country/{id}', 'CountryController@update');
Route::get('/delete_country/{id}', 'CountryController@destroy');










//********************========== API Routes ==========********************//
/*Route::group(['prefix' => 'api/v1' ], function()
{
	Route::get('/home', 'Api\ApiController@index');
});*/
