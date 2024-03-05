<?php

use EscolaLms\Dictionaries\Http\Controllers\DictionaryAdminApiController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:api'], 'prefix' => 'api/admin/dictionaries'], function () {
    Route::get('/', [DictionaryAdminApiController::class, 'index']);
    Route::post('/', [DictionaryAdminApiController::class, 'store']);
    Route::put('{id}', [DictionaryAdminApiController::class, 'update']);
    Route::get('{id}', [DictionaryAdminApiController::class, 'show']);
    Route::delete('{id}', [DictionaryAdminApiController::class, 'delete']);
});
