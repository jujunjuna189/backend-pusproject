<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Posting\PostingController;
use App\Http\Controllers\Api\V1\User\UserAboutController;
use App\Http\Controllers\Api\V1\User\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    // User
    Route::group(['prefix' => 'user'], function ($router) {
        $router->get('/', [UserController::class, 'show']);
    });
    // User About
    Route::group(['prefix' => 'user-about'], function ($router) {
        $router->get('/', [UserAboutController::class, 'show']);
        $router->post('/store', [UserAboutController::class, 'store']);
    });
    // Posting
    Route::group(['prefix' => 'posting'], function ($router) {
        $router->get('/', [PostingController::class, 'show']);
        $router->get('/by-user', [PostingController::class, 'showByUser']);
        $router->post('/store', [PostingController::class, 'store']);
    });
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('register/google', [AuthController::class, 'registerGoogle']);
