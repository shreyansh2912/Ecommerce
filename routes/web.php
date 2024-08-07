<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/login',[RegisterController::class,'login'])->name('login');
Route::post('/login',[RegisterController::class,'login_validation']);

Route::get('/home',[HomeController::class,'index']);

Route::get("/product_details/{id?}",[ProductDetailsController::class,'fetch']);

Route::get("/women's",[HomeController::class,'Women']);

Route::get('/show',[CategoryController::class,'index']);
Route::get('/show_Sub',[CategoryController::class,'sub']);

Route::get('/cart',[CartController::class,'index']);

Route::prefix('/admin')->group(function(){
    
    Route::get('/dashboard',[AdminController::class,'index'])->name("admin_dashboard")->middleware('auth');

    Route::get('/users',[AdminController::class,'users'])->name("admin_users")->middleware('auth');

    Route::get('/products',[AdminProductController::class,'index'])->name("admin_products");

    Route::get("/show_products",[ProductController::class,'index']);
    
    Route::get('/addProducts',[AdminProductController::class,'addProducts'])->name("admin_addProducts");
    Route::post('/addProducts',[AdminProductController::class,'store']);

    Route::get('/category',[AdminProductController::class,'catagory'])->name("admin_category");
    Route::post('/category',[AdminProductController::class,'catagory_create'])->name("admin_category");
    Route::delete('/category/{id?}',[AdminProductController::class,'catagory_delete'])->name("admin_category");
    
    Route::get('/subCategory',[AdminProductController::class,'sub_catagory'])->name("admin_subCategory");
    Route::post('/subCategory',[AdminProductController::class,'sub_catagory_create'])->name("admin_subCategory");

});


// Route::get('/sendEmail',[MailController::class,'index']);
