<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RestoController;
use App\Http\Controllers\RestoOrderController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('api/item/save', 'MenuController@saveMenuItem');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::post('/restos', [RestoController::class, 'store']);
    Route::post('/menu-items', [MenuController::class, 'getRestoMenu']);
    // Route::post('/menu-items', [MenuController::class, 'getRestoMenu']);
    Route::post('/order/save', [RestoOrderController::class, 'store']);
    Route::post('/order/complete', [RestoOrderController::class, 'complete']);
    Route::post('/order/remove', [RestoOrderController::class, 'remove']);
});
Route::post('/item', [MenuController::class, 'addMenuItem']);
