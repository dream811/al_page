<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//api/V1
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function ()
{
    Route::apiResource('user', UserController::class);
    Route::apiResource('user', UserController::class);
    //Route::apiResource('customers', CustommersController::class);
    ///////////////////////* 블레스4벳 START *////////////////////////////
    Route::get('/b4b/launchGame', [App\Http\Controllers\Api\V1\Bless4BetSendController::class, 'LaunchGame']);
    Route::get('/b4b/getGameList', [App\Http\Controllers\Api\V1\Bless4BetSendController::class, 'GetGameList']);

    //Seamless
    Route::post('/b4b/Seamless/GetBalance',         [App\Http\Controllers\Api\V1\Bless4BetRecvController::class, 'GetBalance']);
    Route::post('/b4b/Seamless/PlaceBet',           [App\Http\Controllers\Api\V1\Bless4BetRecvController::class, 'PlaceBet']);
    Route::post('/b4b/Seamless/GameResult',         [App\Http\Controllers\Api\V1\Bless4BetRecvController::class, 'GameResult']);
    Route::post('/b4b/Seamless/RollBack',           [App\Http\Controllers\Api\V1\Bless4BetRecvController::class, 'RollBack']);
    Route::post('/b4b/Seamless/CancelBet',          [App\Http\Controllers\Api\V1\Bless4BetRecvController::class, 'CancelBet']);
    Route::post('/b4b/Seamless/Bonus',              [App\Http\Controllers\Api\V1\Bless4BetRecvController::class, 'Bonus']);
    Route::post('/b4b/Seamless/MobileLogin',        [App\Http\Controllers\Api\V1\Bless4BetRecvController::class, 'MobileLogin']);
    Route::post('/b4b/Seamless/BuyIn',              [App\Http\Controllers\Api\V1\Bless4BetRecvController::class, 'BuyIn']);
    Route::post('/b4b/Seamless/BuyOut',             [App\Http\Controllers\Api\V1\Bless4BetRecvController::class, 'BuyOut']);
    Route::post('/b4b/Seamless/PushBet',            [App\Http\Controllers\Api\V1\Bless4BetRecvController::class, 'PushBet']);
    ///////////////////////* 블레스4벳 END *////////////////////////////
    ///////////////////////* 아너링크 START *////////////////////////////

    Route::get('/honorlink/launchGame',             [App\Http\Controllers\Api\V1\HonorLinkSendController::class, 'LaunchGame']);
    Route::get('/honorlink/getEAGameList',          [App\Http\Controllers\Api\V1\HonorLinkSendController::class, 'getEAGameList']);
    Route::get('/honorlink/getAgentInfo',           [App\Http\Controllers\Api\V1\HonorLinkSendController::class, 'GetAgentInfo']);
    Route::get('/honorlink/getAgentInfo',           [App\Http\Controllers\Api\V1\HonorLinkSendController::class, 'GetAgentInfo']);
    Route::get('/honorlink/getAgentInfo',           [App\Http\Controllers\Api\V1\HonorLinkSendController::class, 'GetAgentInfo']);
    Route::get('/honorlink/getAgentInfo',           [App\Http\Controllers\Api\V1\HonorLinkSendController::class, 'GetAgentInfo']);

    Route::get('/honorlink/Seamless/balance',       [App\Http\Controllers\Api\V1\HonorLinkRecvController::class, 'GetBalance']);
    Route::post('/honorlink/Seamless/changeBalance',[App\Http\Controllers\Api\V1\HonorLinkRecvController::class, 'ChangeBalance']);
    ///////////////////////* 아너링크 END *////////////////////////////
});