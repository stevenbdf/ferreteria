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

Route::get('/transactions/export/', 'TransactionController@export');

Route::get('/products/export/', 'ProductController@export');

Route::get('/invoices/pdf/{invoice_id}', 'InvoiceController@printInvoice');

Route::get('/fiscal-credit/pdf/{fiscal_credit_id}', 'FiscalCreditController@printInvoice');

Route::get('/quotes/pdf/{quote_id}', 'QuoteController@printInvoice');

Route::get('cashOut/{cashOut}/export', 'CashOutController@export');

Route::middleware(['auth:api'])->group(function () {
    Route::apiResource('users', 'UserController');

    Route::apiResource('offices', 'OfficeController');

    Route::apiResource('departments', 'DepartmentController');

    Route::apiResource('suppliers', 'SupplierController');

    Route::apiResource('customers', 'CustomerController');

    Route::post('products/getProductId','ProductController@getProductId');

    Route::apiResource('products', 'ProductController');

    Route::get('/transactions/office/{office_id}', 'TransactionController@transactionsByOffice');

    Route::apiResource('transactions', 'TransactionController')->except([
        'update'
    ]);

    Route::apiResource('invoices', 'InvoiceController')->except([
        'update', 'destroy'
    ]);

    Route::apiResource('quotes', 'QuoteController')->except([
        'update', 'destroy'
    ]);

    Route::apiResource('fiscalCredits', 'FiscalCreditController')->except([
        'update', 'destroy'
    ]);

    Route::get('cashOut/current', 'CashOutController@current');

    Route::apiResource('cashOut', 'CashOutController')->except([
        'update', 'show'
    ]);
});
