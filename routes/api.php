<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Store;
use App\Product;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    Log::debug();
    return $request->user();
});
Route::get('stores', 'StoreController@Stores');
Route::get('stores/{store}', 'StoreController@Show');
Route::post('stores', 'StoreController@CreateStore');
Route::post('stores/update/{store}', 'StoreController@UpdateStore');
Route::delete('stores/{store}', 'StoreController@DeleteStore');
Route::get('stores/{store}/products', 'StoreController@ProductsForStore');
//Routes products
Route::get('products', 'ProductController@AllProducts');
Route::post('products', 'ProductController@SaveProduct');
Route::delete('products/{product}', 'ProductController@DeleteProduct');
Route::get('products/{product}', 'ProductController@GetProduct');
Route::post('products/update/{product}', 'ProductController@UpdateProduct');
