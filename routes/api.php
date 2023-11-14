<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\v1\Customers\CustomersApiController;
use App\Http\Controllers\Api\v1\ProductCategories\ProductCategoriesApiController;
use App\Http\Controllers\Api\v1\ParentProductCategories\ParentProductCategoriesApiController;


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
// ..................................................................

// add customers
Route::post('/customers/create', [CustomersApiController::class, 'store']);
// all customers
Route::get('/customers', [CustomersApiController::class, 'index']);
// single customer
Route::get('/customers/{id}', [CustomersApiController::class, 'show']);
// update customer
Route::put('/customers/{id}', [CustomersApiController::class, 'update']);
// delete customer
Route::delete('/customers/{id}', [CustomersApiController::class, 'destroy']);

// parent product category
// ..................................................................

// add parent product category
Route::post('/parent_product_categories/create', [ParentProductCategoriesApiController::class, 'store']);
// all parent product category
Route::get('/parent_product_categories', [ParentProductCategoriesApiController::class, 'index']);
// single parent product category
Route::get('/parent_product_categories/{id}', [ParentProductCategoriesApiController::class, 'show']);
// update parent product category
Route::put('/parent_product_categories/{id}', [ParentProductCategoriesApiController::class, 'update']);
// delete parent product category
Route::delete('/parent_product_categories/{id}', [ParentProductCategoriesApiController::class, 'destroy']);


// product category
// ..................................................................

// add product category
Route::post('/product_categories/create', [ProductCategoriesApiController::class, 'store']);
// all product category
Route::get('/product_categories', [ProductCategoriesApiController::class, 'index']);
// single product category
Route::get('/product_categories/{id}', [ProductCategoriesApiController::class, 'show']);
// update product category
Route::put('/product_categories/{id}', [ProductCategoriesApiController::class, 'update']);
// delete product category
Route::delete('/product_categories/{id}', [ProductCategoriesApiController::class, 'destroy']);








});
// End Prefix - v1 : [version routes]


