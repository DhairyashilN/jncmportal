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
	// return view('auth.login');
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
Route::post('/getcount', 'MachineController@getMachineCount');
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
Route::post('/getcustomerbyCountry', 'CustomerController@getcustomerbyCountry');
Route::post('/getcustomerbyCity', 'CustomerController@getcustomerbyCity');
//user routes
Route::get('/users', 'UserController@index');
Route::get('/add_user', 'UserController@add');
Route::post('/create_user', 'UserController@create');
Route::post('checkuser', 'UserController@check');
Route::get('/edit_user/{id}', 'UserController@edit');
Route::post('/create_user/{id}', 'UserController@update');
Route::get('/delete_user/{id}', 'UserController@destroy');
Route::post('/checkuseremail', 'UserController@checkuseremail');
//Country routes
Route::get('/country', 'CountryController@index');
Route::get('/add_country', 'CountryController@add');
Route::post('/create_country', 'CountryController@create');
Route::get('/edit_country/{id}', 'CountryController@edit');
Route::post('/create_country/{id}', 'CountryController@update');
Route::get('/delete_country/{id}', 'CountryController@destroy');
Route::post('/getstate', 'CountryController@getstate');
//State routes
Route::get('/state', 'StateController@index');
Route::get('/add_state', 'StateController@add');
Route::post('/create_state', 'StateController@create');
Route::get('/edit_state/{id}', 'StateController@edit');
Route::post('/create_state/{id}', 'StateController@update');
//City routes
Route::get('/city', 'CityController@index');
Route::get('/add_city', 'CityController@add');
Route::post('/create_city', 'CityController@create');
Route::get('/edit_city/{id}', 'CityController@edit');
Route::post('/create_city/{id}', 'CityController@update');
Route::get('/delete_city/{id}', 'CityController@destroy');
Route::post('/getcity', 'CityController@getcity');
//********************========== API Routes ==========********************//
/*Route::group(['prefix' => 'api/v1' ], function()
{
	Route::get('/home', 'Api\ApiController@index');
});*/
