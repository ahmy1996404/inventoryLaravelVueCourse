<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\ExpenseController;
use App\Http\Controllers\Api\PosController;
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

Route::resource('customer',CustomerController::class );


Route::post('/salary/paid/{id}', [SalaryController::class,'Paid']);
Route::get('/salary', [SalaryController::class,'AllSalary']);
Route::get('/salary/view/{id}', [SalaryController::class,'viewSalary']);
Route::get('/edit/salary/{id}', [SalaryController::class,'editSalary']);
Route::post('/salary/update/{id}', [SalaryController::class,'salaryUpdate']);

Route::post('/stock/update/{id}', [ProductController::class,'stockUpdate']);

Route::get('/get/product/{id}', [PosController::class,'GetProduct']);

Route::get('/addToCart/{id}', [CartController::class,'AddToCart']);
Route::get('/cart/product', [CartController::class,'CartProduct']);
Route::get('/remove/cart/{id}', [CartController::class,'removeCart']);

Route::get('/increment/{id}', [CartController::class,'increment']);
Route::get('/decrement/{id}', [CartController::class,'decrement']);

Route::get('/vats', [CartController::class,'Vats']);
Route::post('/orderdone', [PosController::class,'orderDone']);


