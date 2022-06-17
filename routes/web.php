<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\EventController;
use App\Http\Controllers\Web\ExternalApiController;

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

Route::get('/', [EventController::class, 'index'])->name('event.index');
Route::get('/external-api', [ExternalApiController::class, 'index'])->name('external-api');

Route::group(['prefix' => 'event'], function() {
    Route::get('/', [EventController::class, 'index'])->name('event.index');
    Route::get('/create', [EventController::class, 'create'])->name('event.create')->middleware('auth');;
    Route::post('/', [EventController::class, 'store'])->name('event.store')->middleware('auth');;
    Route::get('/{event}', [EventController::class, 'show'])->name('event.show');
    Route::get('/{event}/edit', [EventController::class, 'edit'])->name('event.edit')->middleware('auth');
    Route::put('/{event}', [EventController::class, 'update'])->name('event.update')->middleware('auth');
    Route::delete('/{event}', [EventController::class, 'destroy'])->name('event.destroy')->middleware('auth');
});

Auth::routes();

