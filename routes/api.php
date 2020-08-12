<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'UserController@login');

Route::post('register', 'UserController@register');

Route::get('logout', 'UserController@logout');

Route::middleware(['auth:api'])->group(function () {
    Route::apiResource('users', 'UserController');

    Route::apiResource('offices', 'OfficeController');

    Route::apiResource('departments', 'DepartmentController');

    Route::apiResource('suppliers', 'SupplierController');

    Route::apiResource('customers', 'CustomerController');

    Route::apiResource('products', 'ProductController');

    Route::apiResource('transactions', 'TransactionController')->except([
        'update'
    ]);
});
