<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\JobListController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\AccountController;

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
// routes/web.php
Route::get('/categories', [CategoryController::class, 'fetchMainCategories']);
Route::get('/categories/{parentId}/subcategories', [CategoryController::class, 'fetchSubCategories']);
Route::get('/categories/{parentId}/children', [CategoryController::class, 'fetchChildCategories']);
Route::get('/providers/map', [MapController::class, 'getProviders']);

//Servic Provider Action 
Route::post('/provider/jobs/start', [JobListController::class, 'startMission']);
Route::post('/provider/jobs/resolve', [JobListController::class, 'resolveMission']);
Route::post('/provider/jobs/confirm-delivery', [JobListController::class, 'confirmDelivery']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


    
// Account information routes

//Cancel Mission
Route::post('/mission/cancel', [ServiceRequestController::class, 'cancelMissionRequest']);
Route::post('/mission/cancel/by-provider', [ServiceRequestController::class, 'providerCancelMisssion']);

//Get Filtered Transactions
Route::get('transactions/filter', [TransactionController::class, 'filterTransactions']);
