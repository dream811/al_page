<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserAuthController;
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
///agent
// Route::get('/', [UserAuthController::class, 'index'])->name('user.home')->middleware("auth:web");
Route::get('/login', [UserAuthController::class, 'login'])->name('user.login');
Route::get('/logout', [UserAuthController::class, 'logout'])->name('user.logout');
Route::post('/login', [UserAuthController::class, 'handleLogin'])->name('user.handleLogin');
Route::middleware("auth:web")->name('user.')->group(
    function () {
        Route::get('/', [UserAuthController::class, 'index'])->name('home');
        
        Route::get('/mypage',                       [App\Http\Controllers\Agent\HomeController::class, 'mypage'])->name('mypage');
        Route::post('/changeMyInfo/{type}',         [App\Http\Controllers\Agent\HomeController::class, 'changeMyInfo'])->name('changeMyInfo');
        
        Route::get('/dailyReport',                  [App\Http\Controllers\Agent\HomeController::class, 'dailyReport'])->name('dailyReport');
        Route::get('/notifications',                [App\Http\Controllers\Agent\HomeController::class, 'notifications'])->name('notifications');
        Route::get('/user/betHistory',              [App\Http\Controllers\Agent\User\BetController::class, 'betHistory'])->name('user.betHistory');
        Route::get('/user/userList',                [App\Http\Controllers\Agent\User\UserController::class, 'userList'])->name('user.userList');
        Route::get('/user/userEdit',                [App\Http\Controllers\Agent\User\UserController::class, 'userEdit'])->name('user.userEdit');
        Route::get('/user/paymentsHistory',         [App\Http\Controllers\Agent\User\PaymentsController::class, 'paymentsHistory'])->name('user.paymentsHistory');
        
        //User
        Route::get('/ruser/users',                  [App\Http\Controllers\Agent\User\UserController::class, 'index'])->name('ruser.users');        
        Route::get('/ruser/transactions',           [App\Http\Controllers\Agent\User\TransactionController::class, 'index'])->name('ruser.transactions');

        Route::get('/agent/agentTree',              [App\Http\Controllers\Agent\Agent\AgentController::class, 'agentTree'])->name('agent.agentTree');
        Route::get('/agent/agentList',              [App\Http\Controllers\Agent\Agent\AgentController::class, 'agentList'])->name('agent.agentList');
        Route::get('/agent/agentDetail/{id}',       [App\Http\Controllers\Agent\Agent\AgentController::class, 'agentDetail'])->name('agent.agentDetail');
        // Route::get('/agent/paymentHistory',         [App\Http\Controllers\Agent\Agent\PaymentsController::class, 'paymentHistory'])->name('agent.paymentHistory');
        Route::get('/agent/cashHistory',            [App\Http\Controllers\Agent\Agent\TransactionController::class, 'cashHistory'])->name('agent.cashHistory');
        Route::get('/agent/pointHistory',           [App\Http\Controllers\Agent\Agent\TransactionController::class, 'pointHistory'])->name('agent.pointHistory');
        // Route::get('/agent/exchange',               [App\Http\Controllers\Agent\Agent\ExchangeController::class, 'exchange'])->name('agent.exchange');
        // Route::get('/agent/payments',               [App\Http\Controllers\Agent\Agent\PaymentsController::class, 'payments'])->name('agent.payments');

        Route::get('/game/gameHistory',             [App\Http\Controllers\Agent\Game\GameController::class, 'gameHistory'])->name('game.gameHistory');
        Route::get('/game/betLimit',                [App\Http\Controllers\Agent\Game\GameController::class, 'betLimit'])->name('game.betLimit');
        // Route::get('/agent/request',                [App\Http\Controllers\Agent\Agent\AgentController::class, 'request'])->name('agent.request');
        // Route::get('/agent/deposit',                [App\Http\Controllers\Agent\Agent\AgentController::class, 'deposit'])->name('agent.deposit');
        // Route::get('/agent/withdraw',               [App\Http\Controllers\Agent\Agent\AgentController::class, 'withdraw'])->name('agent.withdraw');
        // Route::get('/agent/transaction',            [App\Http\Controllers\Agent\Agent\AgentController::class, 'transaction'])->name('agent.transaction');
        // Route::get('/agent/agent',                  [App\Http\Controllers\Agent\Agent\AgentController::class, 'agent'])->name('agent.agent');
        // Route::get('/agent/list',                   [App\Http\Controllers\Agent\Agent\AgentController::class, 'list'])->name('agent.list');
        // Route::get('/agent/pointTransaction',       [App\Http\Controllers\Agent\Agent\AgentController::class, 'pointTransaction'])->name('agent.pointTransaction');
        // Route::get('/agent/cashTransaction',        [App\Http\Controllers\Agent\Agent\AgentController::class, 'cashTransaction'])->name('agent.cashTransaction');
        
        // Route::get('/stats/agentDailyStats',        [App\Http\Controllers\Agent\Stats\AgentController::class, 'agentDailyStats'])->name('stats.agentDailyStats');
        // Route::get('/stats/childAgentStats',        [App\Http\Controllers\Agent\Stats\AgentController::class, 'childAgentStats'])->name('stats.childAgentStats');
        // Route::get('/stats/agetnDistributionStats', [App\Http\Controllers\Agent\Stats\AgentController::class, 'agetnDistributionStats'])->name('stats.agetnDistributionStats');
        // Route::get('/stats/casino',                 [App\Http\Controllers\Agent\Stats\CasinoController::class, 'casino'])->name('stats.casino');
        // Route::get('/stats/user',                   [App\Http\Controllers\Agent\Stats\UserController::class, 'user'])->name('stats.user');

        Route::get('/vendor/vendors',                [App\Http\Controllers\Agent\Vendor\VendorController::class, 'index'])->name('vendor.vendors');

        Route::get('/developer/openApi',            [App\Http\Controllers\Agent\Developer\DeveloperController::class, 'openApi'])->name('developer.openApi');
        Route::get('/developer/callbackOpenApiTest',[App\Http\Controllers\Agent\Developer\DeveloperController::class, 'callbackOpenApiTest'])->name('developer.callbackOpenApiTest');
        Route::get('/developer/callbackOpenApiLog', [App\Http\Controllers\Agent\Developer\DeveloperController::class, 'callbackOpenApiLog'])->name('developer.callbackOpenApiLog');
        Route::get('/developer/callbackOpenApi',    [App\Http\Controllers\Agent\Developer\DeveloperController::class, 'callbackOpenApi'])->name('developer.callbackOpenApi');
        Route::get('/developer/apiErrorLog',        [App\Http\Controllers\Agent\Developer\DeveloperController::class, 'apiErrorLog'])->name('developer.apiErrorLog');
    }
);
///admin

Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::post('/admin/login', [AdminAuthController::class, 'handleLogin'])->name('admin.handleLogin');
Route::prefix('admin')->name('admin.')->middleware('auth:webadmin')->group(//
    function () {
        Route::get('/', [AdminAuthController::class, 'index'])->name('home');
    }
);
