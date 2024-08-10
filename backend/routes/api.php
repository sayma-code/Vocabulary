<?php

use App\Http\Controllers\API\V1\WordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => 'v1'], function(){
    Route::apiResource('words', WordController::class);
});