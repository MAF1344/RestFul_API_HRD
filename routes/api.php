<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Get All Resource
Route::get('/employees', [EmployeeController::class, 'index'])->middleware('auth:sanctum');
// Add Resource
Route::post('/employees', [EmployeeController::class, 'store'])->middleware('auth:sanctum');
// Get Detail Resource
Route::get('/employees/{id}', [EmployeeController::class, 'show'])->middleware('auth:sanctum');
// Edit Resource
Route::put('/employees/{id}', [EmployeeController::class, 'update'])->middleware('auth:sanctum');
// Delete Resource
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->middleware('auth:sanctum');
// Search Resource by Name
Route::get('/employees/search/{nama}', [EmployeeController::class, 'search'])->middleware('auth:sanctum');
// Get Active Resource
Route::get('/employees/status/active', [EmployeeController::class, 'active'])->middleware('auth:sanctum');
// Get Inactive Resource
Route::get('/employees/status/inactive', [EmployeeController::class, 'inactive'])->middleware('auth:sanctum');
// Get Terminated Resource
Route::get('/employees/status/terminated', [EmployeeController::class, 'terminated'])->middleware('auth:sanctum');


// Route untuk autentikasi
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);