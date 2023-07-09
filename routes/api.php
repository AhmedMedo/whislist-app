<?php

use App\Http\Controllers\Api\ItemsController;
use Illuminate\Http\Request;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(
    [
        'as' => 'api.',
        'namespace' => 'Api',
    ],
    function () {
        Route::get('items', [ItemsController::class, 'index'])->name('items.index');
        Route::post('items', [ItemsController::class, 'store'])->name('items.store');
        Route::get('items/show/{id}', [ItemsController::class, 'show'])->name('items.show');
        Route::put('items/{id}', [ItemsController::class, 'update'])->name('items.update');
        Route::get('items/statistics', [ItemsController::class, 'statistics'])->name('items.statistics');
        Route::delete('items/{id}', [ItemsController::class, 'destroy'])->name('items.destroy');

    });
