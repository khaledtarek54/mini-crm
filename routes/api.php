<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->withoutMiddleware([RoleMiddleware::class]);


Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);


    Route::post('/admin/add-employee', [AdminController::class, 'addEmployee']);
    Route::post('/admin/assign-customer/{customerId}', [AdminController::class, 'assignCustomerToEmployee']);

    Route::post('/employee/add-customer', [EmployeeController::class, 'addCustomer']);
    Route::post('/employee/add-action/{customerId}', [EmployeeController::class, 'addAction']);
    Route::post('/employee/change-result', [EmployeeController::class, 'changeResult']);

    
});
