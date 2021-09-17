<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Models\User;
Use Illuminate\Support\Facades\DB;

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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', [ContactController::class, 'index'])->name('con');


//Category Controller
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');

Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');

Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);

Route::post('/category/update/{id}', [CategoryController::class, 'Update']);

Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);

Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);

Route::get('/pdelete/category/{id}', [CategoryController::class, 'Pdelete']);

//Brand Route
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

//Multi Image Route
Route::get('/multi/image', [BrandController::class, 'Multipic'])->name('multi.image');
Route::post('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    // $users = User::all();
    $users = DB::table('users')->get();
    return view('dashboard', compact('users'));
})->name('dashboard');


//FOR PRODUCT
Route::get('/product/all', [ProductController::class, 'AllProd'])->name('all.prod');
Route::post('/product/add', [ProductController::class, 'StoreProd'])->name('store.prod');
Route::get('/product/edit/{id}', [ProductController::class, 'Edit']);
Route::post('/product/update/{id}', [ProductController::class, 'Update']);
Route::get('/product/delete/{id}', [ProductController::class, 'Delete']);

//FOR ORDER
Route::get('/order/all', [OrderController::class, 'AllOrder'])->name('all.order');
Route::post('/cart/add', [CartController::class, 'StoreCart'])->name('store.cart');
Route::get('/cart/remove/{id}', [CartController::class, 'RemoveCart']);
Route::get('/cart/clear', [CartController::class, 'ClearCart'])->name('clear.cart');
Route::get('/order/add', [OrderController::class, 'StoreOrder'])->name('store.order');

Route::get('/order/edit/{id}', [OrderController::class, 'Edit']);
Route::post('/order/update/{id}', [OrderController::class, 'Update']);
Route::get('/order/delete/{id}', [OrderController::class, 'Delete']);

//reports
Route::get('/reports/all', [OrderController::class, 'AllReport'])->name('all.report');
