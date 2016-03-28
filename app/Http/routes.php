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
Route::resource('building', 'BuildingController');
Route::resource('employee', 'EmployeeController');
Route::resource('fee', 'FeeController');
Route::resource('equipment', 'EquipmentController');
Route::resource('room', 'RoomController');
Route::resource('supplier', 'SupplierController');
Route::resource('drug', 'DrugController');
Route::resource('discount', 'DiscountController');
Route::resource('admission', 'AdmissionController');
Route::resource('checkup', 'CheckupController');
Route::resource('cashier', 'CashierController');
Route::resource('laboratory', 'LabController');
Route::resource('pharmacy', 'PharmacyController');
Route::resource('transaction/room', 'RoomTransactionController');
Route::resource('nurse-station', 'NurseStationController');
Route::resource('bed', 'BedController');
Route::resource('items', 'ItemsController');
Route::resource('requirement', 'RequirementController');

Route::get('logout', 'LogoutController@logout');
Route::post('building/changed', 'BuildingAjaxController@retrieveFloors');

Route::post('employee/update', 'EmployeeController@updateEmployee');
Route::post('position/create', 'PositionController@createPosition');
Route::post('fee-type/create', 'FeeTypeController@createFeeType');
Route::post('supplier/update', 'SupplierController@updateSupplier');
Route::post('room-type/create', 'RoomTypeController@createRoomType');
Route::get('test', function() {
	return view('maintenance-building');
});

