<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\v1\Customers\CustomersApiController;
use App\Http\Controllers\Api\v1\ProductCategories\ProductCategoriesApiController;
use App\Http\Controllers\Api\v1\ParentProductCategories\ParentProductCategoriesApiController;
use App\Http\Controllers\Api\v1\Branches\BranchesApiController;
use App\Http\Controllers\Api\v1\Brands\BrandsApiController;
use App\Http\Controllers\Api\v1\Units\UnitsApiController;
use App\Http\Controllers\Api\v1\Products\ProductsApiController;
use App\Http\Controllers\Api\v1\Suppliers\SuppliersApiController;






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
Route::post('/product_categories/{id}', [ProductCategoriesApiController::class, 'update']);
// delete product category
Route::delete('/product_categories/{id}', [ProductCategoriesApiController::class, 'destroy']);

// branches
// ..................................................................

// add branch
Route::post('/branches/create', [BranchesApiController::class, 'store']);
// all branch
Route::get('/branches', [BranchesApiController::class, 'index']);
// single branch
Route::get('/branches/{id}', [BranchesApiController::class, 'show']);
// update branch
Route::put('/branches/{id}', [BranchesApiController::class, 'update']);
// delete branch
Route::delete('/branches/{id}', [BranchesApiController::class, 'destroy']);


// branches
// ..................................................................

// add branch
Route::post('/branches/create', [BranchesApiController::class, 'store']);
// all branch
Route::get('/branches', [BranchesApiController::class, 'index']);
// single branch
Route::get('/branches/{id}', [BranchesApiController::class, 'show']);
// update branch
Route::put('/branches/{id}', [BranchesApiController::class, 'update']);
// delete branch
Route::delete('/branches/{id}', [BranchesApiController::class, 'destroy']);


// brands
// ..................................................................

// add brand
Route::post('/brands/create', [BrandsApiController::class, 'store']);
// all brand
Route::get('/brands', [BrandsApiController::class, 'index']);
// single brand
Route::get('/brands/{id}', [BrandsApiController::class, 'show']);
// update brand
Route::put('/brands/{id}', [BrandsApiController::class, 'update']);
// delete brand
Route::delete('/brands/{id}', [BrandsApiController::class, 'destroy']);

// units
// ..................................................................

// add unit
Route::post('/units/create', [UnitsApiController::class, 'store']);
// all unit
Route::get('/units', [UnitsApiController::class, 'index']);
// single unit
Route::get('/units/{id}', [UnitsApiController::class, 'show']);
// update unit
Route::put('/units/{id}', [UnitsApiController::class, 'update']);
// delete unit
Route::delete('/units/{id}', [UnitsApiController::class, 'destroy']);


// products
// ..................................................................
// add product
Route::post('/products/create', [ProductsApiController::class, 'store']);
// all product
Route::get('/products', [ProductsApiController::class, 'index']);
// single product
Route::get('/products/{id}', [ProductsApiController::class, 'show']);
// update product
Route::put('/products/{id}', [ProductsApiController::class, 'update']);
// delete product
Route::delete('/products/{id}', [ProductsApiController::class, 'destroy']);

// suppliers
// ..................................................................
// add supplier
Route::post('/suppliers/create', [SuppliersApiController::class, 'store']);
// all supplier
Route::get('/suppliers', [SuppliersApiController::class, 'index']);
// single supplier
Route::get('/suppliers/{id}', [SuppliersApiController::class, 'show']);
// update supplier
Route::put('/suppliers/{id}', [SuppliersApiController::class, 'update']);
// delete supplier
Route::delete('/suppliers/{id}', [SuppliersApiController::class, 'destroy']);













});
// End Prefix - v1 : [version routes]


