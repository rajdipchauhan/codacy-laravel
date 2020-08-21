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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false, // register routes
]);

// company controller
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/getCompany','CompanyController@index');
Route::get('/addCompany','CompanyController@create');
Route::post('/storeCompany','CompanyController@store');
Route::get('/editCompany/{id}','CompanyController@edit');
Route::post('/updateCompany','CompanyController@update');
Route::get('/deleteCompany/{id}','CompanyController@destroy');

// employee controller
Route::get('/getEmployee','EmployeeController@index');
Route::get('/addEmployee','EmployeeController@create');
Route::post('/storeEmployee','EmployeeController@store');
Route::get('/editEmployee/{id}','EmployeeController@edit');
Route::post('/updateEmployee','EmployeeController@update');
Route::get('/deleteEmployee/{id}','EmployeeController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
