<?php

use Illuminate\Support\Facades\Route;
use app\http\controllers\admin\categorycontroller;
use app\http\controllers\Frontend\CheckoutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\frontend\FrontendController::class, 'index']);
Route::get('/home', [App\Http\Controllers\frontend\FrontendController::class, 'index']);
Route::get('/category', [App\Http\Controllers\frontend\FrontendController::class, 'category']);
Route::get('view-category/{slug}', [App\Http\Controllers\frontend\FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [App\Http\Controllers\frontend\FrontendController::class, 'productview']);
Route::get('category/{cate_slug}/{prod_slug}/{id}', [App\Http\Controllers\frontend\FrontendController::class, 'productviewr'])->name('lien');






Auth::routes();

Route::post('/add-to-cart', [App\Http\Controllers\frontend\CartController::class, 'addproduct']);
Route::post('/add-to-cartr', [App\Http\Controllers\frontend\CartController::class, 'addproductr']);


Route::middleware(['auth'])->group(function () {
Route::get('/cart', [App\Http\Controllers\frontend\CartController::class, 'viewcart']);
Route::get('/delete-cart/{id}', [App\Http\Controllers\frontend\CartController::class, 'destroy']);
Route::get('/checkout', [App\Http\Controllers\frontend\CheckoutController::class, 'index']);
Route::post('/checkout-order', [App\Http\Controllers\frontend\CheckoutController::class, 'pay']);
Route::get('/earn-money/{id}', [App\Http\Controllers\frontend\FrontendController::class, 'earn']);
Route::put('/receveur/{id}', [App\Http\Controllers\frontend\FrontendController::class, 'role']);
Route::put('/tresfert-money/{id}', [App\Http\Controllers\frontend\MoneyController::class, 'money']);




});


 Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin_dashboard', [App\Http\Controllers\admin\FrontendController::class, 'index']);
     Route::get('/categories', [App\Http\Controllers\admin\CategoriesController::class, 'index']);
     Route::get('/add-category', [App\Http\Controllers\admin\CategoriesController::class, 'add']);
     Route::post('insert-category',[App\Http\Controllers\admin\CategoriesController::class, 'insert']);
     Route::get('edit-category/{id}' ,[App\Http\Controllers\admin\CategoriesController::class, 'edit']);
     Route::put('update-category/{id}',[App\Http\Controllers\admin\CategoriesController::class, 'update']);
     Route::get('delete-category/{id}',[App\Http\Controllers\admin\CategoriesController::class, 'destroy']);


     Route::get('products',[App\Http\Controllers\admin\ProductController::class, 'index']);
     Route::get('add-products',[App\Http\Controllers\admin\ProductController::class, 'add']);
     Route::post('insert-product',[App\Http\Controllers\admin\ProductController::class, 'insert']);

     Route::get('edit-product/{id}' , [App\Http\Controllers\admin\ProductController::class, 'edit']);
     Route::put('update-product/{id}' ,[App\Http\Controllers\admin\ProductController::class, 'update']);
     Route::get('delete-product/{id}',[App\Http\Controllers\admin\ProductController::class, 'destroy']);
     Route::get('receveur_money',[App\Http\Controllers\frontend\MoneyController::class, 'index']);
     Route::put('/accepted_money/{id}', [App\Http\Controllers\frontend\MoneyController::class, 'accepted']);


     });



