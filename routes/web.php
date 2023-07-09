<?php

use App\Http\Controllers\Front\ItemsController;
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

Route::group(
    [
        'as' => 'web.',
        'namespace' => 'Front',
    ],
    function () {
        Route::get('items', [ItemsController::class, 'index'])->name('items.index');
    });
