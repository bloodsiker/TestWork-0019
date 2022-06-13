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

Route::apiResource('countries', \App\Http\Controllers\Api\CountryController::class);
Route::get('countries/{country}/cities', [\App\Http\Controllers\Api\CountryController::class, 'cities']);

Route::apiResource('cities', \App\Http\Controllers\Api\CityController::class);

Route::apiResource('companies', \App\Http\Controllers\Api\CompanyController::class);
