<?php

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
    return view('welcome');
});

//Route::get('/', function () {
//    return view('welcome');
//})->middleware(['auth']);
//або middleware(['app/Http/Middleware/Authenticate']);

//Route::get('users/{user}', [\App\Http\Controllers\Controller::class, 'show']);

//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//Route::name('cart.')->prefix('cart')->group(function() {
//    Route::get('/', [\App\Http\Controllers\CartController::class, ]);
//});
//
//Route::get('checkout', []);
