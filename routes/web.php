<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeCpntroller;
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

Route::get('/',[HomeCpntroller::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//admin
Route::get('/redirect',[HomeCpntroller::class,'redirect'])->middleware('auth','verified');
Route::get('/view_category',[AdminController::class,'view_category']);
Route::post('/add_category',[AdminController::class,'add_category']);
Route::get('/delete_category/{id}',[AdminController::class,'delete_category']);
Route::get('/view_product',[AdminController::class,'view_product']);
Route::post('/add_product',[AdminController::class,'add_product']);
Route::get('/show_product',[AdminController::class,'show_product']);
Route::get('/delete_product/{id}',[AdminController::class,'delete_product']);
Route::post('/update_product/{id}',[AdminController::class,'update_product']);
Route::get('/edit_product/{id}',[AdminController::class,'edit_product']);
Route::get('/order',[AdminController::class,'order']);
Route::get('/delete_order/{id}',[AdminController::class,'delete_order']);
Route::get('/order_delivery/{id}',[AdminController::class,'order_delivery']);
Route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);
Route::get('/search',[AdminController::class,'search']);







#user
Route::get('/product_details/{id}',[HomeCpntroller::class,'product_details']);
Route::post('/add_cart/{id}',[HomeCpntroller::class,'add_cart']);
Route::get('/show_cart',[HomeCpntroller::class,'show_cart']);
Route::get('/delete_cart/{id}',[HomeCpntroller::class,'delete_cart']);
Route::get('/show_order',[HomeCpntroller::class,'show_order']);
Route::get('/delete_order/{id}',[HomeCpntroller::class,'delete_order']);
Route::get('/cash_order',[HomeCpntroller::class,'cash_order']);
Route::get('/stripe/{totalprice}',[HomeCpntroller::class,'stripe']);
Route::post('/stripe/{totalprice}',[HomeCpntroller::class,'stripePost'] )->name('stripe.post');
Route::post('/add_comment',[HomeCpntroller::class,'add_comment']);
Route::post('/add_reply',[HomeCpntroller::class,'add_reply']);
Route::get('/searchProduct',[HomeCpntroller::class,'searchProduct']);


