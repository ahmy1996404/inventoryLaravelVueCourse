<?php

use App\Http\Controllers\Api\EmployeeController;
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

