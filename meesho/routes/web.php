<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\MainAddressController;

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

Route::get('/logout', function () {
    session()->forget('user');
    return redirect()->back();
});
Route::get('/', function () {
    return view('home');
});
Route::get('/addaddressform', function () {
    return view('addaddressform');
});
Route::get('/address', function () {
    return view('address');
});
Route::get('/default_address/{addressid}',[MainAddressController::class,'index']);
Route::get('/add/address',[AddressController::class, 'AddAddress']);
Route::get('/register', function () {
    return view('registerformpage');
});

Route::get('/login', function () {
    return view('registerformpage');
});
Route::get('/cart', function () {
    return view('cart');
});

Route::post('/submit', [RegistrationController::class, 'registrationSubmit']);
Route::get('/addedintocart/{product_id}/{size}', [CartController::class, 'AddToCartAction']);

Route::get('/navbar', function () {
    return view('navbar');
});

Route::get('/wom', function () {
    return view('women');
});

Route::get('{name}/{category}/{id}/buy', function ($name, $category, $id) {
    $data = compact('id', 'category');
    return view('buy')->with($data);
});
