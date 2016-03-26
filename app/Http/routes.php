<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('/', 'LoginController');
Route::resource('employee', 'EmployeeController');
Route::resource('fee', 'FeeController');
Route::resource('equipment', 'EquipmentController');
Route::resource('room', 'RoomController');
Route::resource('supplier', 'SupplierController');
Route::resource('drug', 'DrugController');
Route::resource('discount', 'DiscountController');
Route::resource('admission', 'AdmissionController');

Route::get('logout', 'LogoutController@logout');
Route::get('test', function() {
	return view('transaction-cashier');
});
