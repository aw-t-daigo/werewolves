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

Route::post('/punishment', 'VillagerController@punishment')
    ->middleware('gameover');

Route::middleware(['completed'])->group(function () {
    Route::post('/raid', 'WerewolfController@raid');
    Route::post('/seer', 'SeerController@seer');
    Route::post('/guard', 'HunterController@guard');
});

Route::get('/live', 'PlayerController@getLivingPlayer');
Route::prefix('chat')->group(function () {
    Route::post('werewolves', 'WerewolfController@chat');
    Route::post('sharer', 'SharerController@chat');
});

Route::get('/room-id', 'PlayerController@getPlayerInfo');

Route::post('/start', 'PlayerController@startGame');
