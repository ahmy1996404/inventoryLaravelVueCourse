<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\ExpenseController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SalaryController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('signup', [AuthController::class, 'signup']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'] );
    Route::post('refresh', [AuthController::class, 'refresh'] );
    Route::post('me', [AuthController::class, 'me'] );

});
Route::resource('employee',EmployeeController::class );

Route::resource('supplier',SupplierController::class );

Route::resource('category',CategoryController::class );

Route::resource('product',ProductController::class );

Route::resource('expense',ExpenseController::class );

Route::post('/salary/paid/{id}', [SalaryController::class,'Paid']);
