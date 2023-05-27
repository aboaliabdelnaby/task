<?php

use App\Http\Controllers\Api\Admin\Employee\CompanyEmployees;
use App\Http\Controllers\Api\Admin\Employee\CompanyInternedEmployeeController;
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
Route::get('company-employees/{company_id}', CompanyEmployees::class)
    ->where('company_id', '[0-9]+');
Route::get('company-interned-employees', CompanyInternedEmployeeController::class);

