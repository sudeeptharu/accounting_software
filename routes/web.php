<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LedgerClassificationController;
use App\Http\Controllers\LedgerController;
use App\Http\Controllers\LedgerGroupController;
use App\Http\Controllers\LedgerTypeController;
use App\Http\Controllers\VoucherTypeController;

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
    return view('welcome');
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

Route::get('ledger-type',[LedgerTypeController::class,'index']);
Route::post('ledger-type/save',[LedgerTypeController::class,'store']);
Route::put('ledger-type/update',[LedgerTypeController::class,'update']);
Route::get('ledger-type/delete/{id}',[LedgerTypeController::class,'destroy']);

Route::get('voucher-type',[VoucherTypeController::class,'index']);
Route::post('voucher-type/save',[VoucherTypeController::class,'store']);
Route::put('voucher-type/update',[VoucherTypeController::class,'update']);
Route::get('voucher-type/delete/{id}',[VoucherTypeController::class,'destroy']);


Route::get('getData',[LedgerTypeController::class,'getData']);
