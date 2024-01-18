<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\CategoryApiController;
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



Route::post('/product/save', [ProductApiController::class, 'save'])->name('save.product');
Route::post('/product/delete/{id}', [ProductApiController::class, 'delete'])->name('delete.product');


Route::post('/category/save', [CategoryApiController::class, 'save'])->name('save.category');
Route::post('/category/delete/{id}', [CategoryApiController::class, 'delete'])->name('delete.category');
