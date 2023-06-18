<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\v1\Customers\CustomersApiController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Prefix - v1 : [version routes]
Route::group(['prefix'=> "v1"], function(){

// customers api routes
// all customers
Route::get('/customers', [CustomersApiController::class, 'index']);
// single customer





});
// End Prefix - v1 : [version routes]


