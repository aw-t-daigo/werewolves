<?php

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

Route::get('/', function () {
    session()->flush();
    return view('top');
});

Route::group(['middleware' => ['web']], function () {
    Route::prefix('/')->group(function () {
        Route::get('create', 'CreateRoomController@show');
        Route::post('create', 'CreateRoomController@createRoom');
        Route::get('enter/{roomId?}', 'EntranceRoomController@show');
        Route::post('enter', 'EntranceRoomController@enter');
        Route::prefix('night/')->group(function () {
            Route::get('1', 'VillagerController@show');
            Route::get('2', 'WerewolfController@show');
            Route::get('3', 'SeerController@show');
            Route::get('4', 'MediumController@show');
            Route::get('5', 'SharerController@show');
            Route::get('6', 'HunterController@show');
            // 7は狂人なので村人と共用
            Route::get('7', 'VillagerController@show');
        });
    });
});
