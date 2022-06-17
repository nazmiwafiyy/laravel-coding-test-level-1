<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function() {

    Route::group(['prefix' => 'events'], function() {
        Route::get('/active-events', [EventController::class, 'active']);
        Route::get('/', [EventController::class, 'index']);
        Route::get('{event}', [EventController::class, 'show']);
        Route::post('/', [EventController::class, 'store']);
        Route::patch('{event}', [EventController::class, 'update']);
        Route::delete('{event}', [EventController::class, 'destroy']);
        Route::put('{event}', [EventController::class, 'updateOrCreate']);
    });

});
 