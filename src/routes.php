<?php

use EscolaLms\Dictionaries\Http\Controllers\DictionaryAdminApiController;
use EscolaLms\Dictionaries\Http\Controllers\DictionaryWordAdminApiController;
use EscolaLms\Dictionaries\Http\Controllers\DictionaryWordApiController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:api'], 'prefix' => 'api/admin/dictionaries'], function () {
    Route::get('/', [DictionaryAdminApiController::class, 'index']);
    Route::post('/', [DictionaryAdminApiController::class, 'store']);
    Route::put('{id}', [DictionaryAdminApiController::class, 'update']);
    Route::get('{id}', [DictionaryAdminApiController::class, 'show']);
    Route::delete('{id}', [DictionaryAdminApiController::class, 'delete']);
});

Route::group(['middleware' => ['auth:api'], 'prefix' => 'api/admin/dictionary-words'], function () {
    Route::get('/', [DictionaryWordAdminApiController::class, 'index']);
    Route::post('/', [DictionaryWordAdminApiController::class, 'store']);
    Route::put('{id}', [DictionaryWordAdminApiController::class, 'update']);
    Route::get('{id}', [DictionaryWordAdminApiController::class, 'show']);
    Route::delete('{id}', [DictionaryWordAdminApiController::class, 'delete']);
});

Route::group(['prefix' => 'api/dictionaries/{slug}/words'], function () {
    Route::get('/', [DictionaryWordApiController::class, 'index']);
    Route::get('/categories', [DictionaryWordApiController::class, 'categories']);
});
