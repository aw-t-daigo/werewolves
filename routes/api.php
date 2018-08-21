<?php

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

Route::post('/punishment', 'VillagerController@punishment');
Route::get('/live', 'PlayerController@getLivingPlayer');
Route::post('/raid', 'WerewolfController@raid');
Route::prefix('chat')->group(function () {
    Route::post('werewolves', 'WerewolfController@chat');
});

