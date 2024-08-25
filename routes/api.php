<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\RegisterController;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::post("/Add_products",[ProductController::class,'store']);
Route::post("/update_products",[ProductController::class,'update']);
Route::post("/delete_products",[ProductController::class,'destroy']);


Route::get("/show_category",[ProductController::class,'index']);
Route::get("/show_subCategory",[ProductController::class,'sub']);

