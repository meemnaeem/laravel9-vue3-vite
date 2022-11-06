<?php
namespace routes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RestoController;
use App\Http\Controllers\RestoOrderController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/restos', [RestoController::class, 'index'])->name('restos');
    Route::get('/restos/menu/{id}', [MenuController::class, 'index'])->name('resto.menu');
    Route::get('/restos/orders/{id}', [RestoOrderController::class, 'index'])->name('resto.orders');
    Route::get('/restos/orders/{id}/add', [RestoOrderController::class, 'add'])->name('resto.orders.add');
});
