<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

//home pages
Route::get('/',[HomeController::class,'index']);
Route::get('adminHome',[HomeController::class,'adminHome'])->name('adminHome')->middleware('auth');

//user
Route::get('/display',[AdminController::class,'display'])->name('display')->middleware('auth');
Route::get('user/delete/{user}', [AdminController::class,'destroy' ])->name('user_delete')->middleware('auth');
//food
Route::get('/displayfood',[AdminController::class,'displayfood'])->name('displayfood')->middleware('auth');
Route::get('/createfood',[AdminController::class,'createfood'])->name('createfood')->middleware('auth');
Route::get('food/deletefood/{food}',[AdminController::class,'deletefood'])->name('deletefood')->middleware('auth');
Route::post('/storefood',[AdminController::class,'storefood'])->name('storefood')->middleware('auth');
Route::post('/update/{food}' , [AdminController::class , 'updatefood'])->name('updatefood')->middleware('auth');
Route::get('food/editfood/{food}' , [AdminController::class , 'editfood'])->name('editfood')->middleware('auth');
//cart
Route::post('food/addcart/{food}' , [HomeController::class , 'addcart']);
Route::get('showcart/{userid}' , [HomeController::class , 'showcart'])->name('show')->middleware('auth');
Route::get('cart/deleteproduct/{cartid}',[HomeController::class,'deleteproduct'])->name('deleteproduct')->middleware('auth');
//reservation
Route::post('/reservation',[AdminController::class,'reservation'])->name('reservation');
Route::get('/adminreservation',[AdminController::class,'adminreservation'])->middleware('auth');
//chefs
Route::get('/displaychef',[AdminController::class,'displaychef'])->name('displaychef')->middleware('auth');
Route::get('/createchef',[AdminController::class,'createchef'])->name('createChef')->middleware('auth');
Route::get('chef/deletechef/{chef}',[AdminController::class,'deletechef'])->name('deletechef')->middleware('auth');
Route::post('/storechef',[AdminController::class,'storechef'])->name('storechef')->middleware('auth');
Route::post('/updatechef/{chef}' , [AdminController::class , 'updatechef'])->name('update')->middleware('auth');
Route::get('chef/editchef/{chef}' , [AdminController::class , 'editchef'])->name('editchef')->middleware('auth');
//order
Route::post('/orderconfirm/{userid}' , [HomeController::class , 'orderconfirm'])->name('order')->middleware('auth');
Route::get('/adminorder',[AdminController::class,'adminorder'])->middleware('auth');
Route::get('/search',[AdminController::class,'search'])->name('search')->middleware('auth');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
