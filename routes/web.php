<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LedgerClassificationController;
use App\Http\Controllers\LedgerController;
use App\Http\Controllers\LedgerGroupController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard.pages.activities');
});

Route::get('ledger-classification',[LedgerClassificationController::class,'index']);
Route::post('ledger-classification/save',[LedgerClassificationController::class,'store']);
Route::put('ledger-classification/update',[LedgerClassificationController::class,'update']);
Route::get('ledger-classification/delete/{id}',[LedgerClassificationController::class,'destroy']);

Route::get('ledger',[LedgerController::class,'index']);
Route::post('/ledger/save',[LedgerController::class,'create']);
Route::put('/ledger/update',[LedgerController::class,'update']);
Route::get('role/delete/{id}',[LedgerController::class,'destroy']);
Route::get('/ledger/group_identifier',[LedgerController::class,'group_identifier']);
Route::get('/ledger/classification_identifier',[LedgerController::class,'classification_identifier']);

Route::get('ledger-group',[LedgerGroupController::class,'index']);
Route::post('/ledger-group/save',[LedgerGroupController::class,'store']);
Route::put('/ledger-group/update',[LedgerGroupController::class,'update']);
Route::get('/ledger-group/delete/{id}',[LedgerGroupController::class,'destroy']);


Route::get('/classification/{identifier}',[TestController::class,'classification']);
Route::get('/group/{identifier}',[TestController::class,'group']);
Route::get('/ledger/{identifier}',[TestController::class,'ledger']);
Route::get('/txn/{id}',[TestController::class,'txn']);
