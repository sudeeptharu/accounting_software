<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LedgerClassificationController;
use App\Http\Controllers\LedgerController;
use App\Http\Controllers\LedgerGroupController;
use App\Http\Controllers\LedgerTypeController;
use App\Http\Controllers\VoucherTypeController;
use Illuminate\Support\Facades\URL;

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
    return redirect('ledger');
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
Route::get('/assetsAndLiabilities',[LedgerController::class,'assetsAndLiabilities']);

Route::get('ledger-group',[LedgerGroupController::class,'index']);
Route::post('/ledger-group/save',[LedgerGroupController::class,'store']);
Route::put('/ledger-group/update',[LedgerGroupController::class,'update']);
Route::get('/ledger-group/delete/{id}',[LedgerGroupController::class,'destroy']);

/*Tests*/
Route::get('/classification/{identifier}',[TestController::class,'classification']);
Route::get('/group/{identifier}',[TestController::class,'group']);
Route::get('/ledger/{identifier}',[TestController::class,'ledger']);
Route::get('/txn/{id}',[TestController::class,'txn']);

Route::get('/ledgerbytype',[TestController::class,'ledgers_by_type']);

Route::get('ledger-type',[LedgerTypeController::class,'index']);
Route::post('ledger-type/save',[LedgerTypeController::class,'store']);
Route::put('ledger-type/update',[LedgerTypeController::class,'update']);
Route::get('ledger-type/delete/{id}',[LedgerTypeController::class,'destroy']);

Route::get('voucher-type',[VoucherTypeController::class,'index']);
Route::post('voucher-type/save',[VoucherTypeController::class,'store']);
Route::put('voucher-type/update',[VoucherTypeController::class,'update']);
Route::get('voucher-type/delete/{id}',[VoucherTypeController::class,'destroy']);


Route::get('getData',[LedgerTypeController::class,'getData']);
Route::get('contra-voucher',[LedgerTypeController::class,'contraVoucher']);
Route::get('contra-voucher/add',function (){
    $previousurl=URL::previous();
    session()->put('previousurl',$previousurl);
    return view('dashboard.pages.add_contra_voucher');
});
Route::post('contra-voucher/save',[LedgerTypeController::class,'VoucherSave']);

Route::get('journal-voucher',[LedgerTypeController::class,'journalVoucher']);
Route::get('journal-voucher/add',function (){
    $previousurl=URL::previous();
    session()->put('previousurl',$previousurl);
    return view('dashboard.pages.add_journal_voucher');
});
Route::post('journal-voucher/save',[LedgerTypeController::class,'VoucherSave']);

Route::get('payment-voucher',[LedgerTypeController::class,'paymentVoucher']);
Route::get('payment-voucher/add',function (){
    $previousurl=URL::previous();
    session()->put('previousurl',$previousurl);
    return view('dashboard.pages.add_payment_voucher');
});
Route::post('payment-voucher/save',[LedgerTypeController::class,'VoucherSave']);

Route::get('purchase-voucher',[LedgerTypeController::class,'purchaseVoucher']);
Route::get('purchase-voucher/add',function (){
    $previousurl=URL::previous();
    session()->put('previousurl',$previousurl);
    return view('dashboard.pages.add_purchase_voucher');
});
Route::post('purchase-voucher/save',[LedgerTypeController::class,'VoucherSave']);

Route::get('receipt-voucher',[LedgerTypeController::class,'receiptVoucher']);
Route::get('receipt-voucher/add',function (){
    $previousurl=URL::previous();
    session()->put('previousurl',$previousurl);
    return view('dashboard.pages.add_receipt_voucher');
});
Route::post('receipt-voucher/save',[LedgerTypeController::class,'VoucherSave']);

Route::get('sales-voucher',[LedgerTypeController::class,'salesVoucher']);
Route::get('sales-voucher/add',function (){
    $previousurl=URL::previous();
    session()->put('previousurl',$previousurl);
    return view('dashboard.pages.add_sales_voucher');
});

Route::post('sales-voucher/save',[LedgerTypeController::class,'VoucherSave']);

Route::get('credit-sales-return',[LedgerTypeController::class,'creditSalesReturn']);
Route::get('credit-sales-return/add',function (){
    $previousurl=URL::previous();
    session()->put('previousurl',$previousurl);
    return view('dashboard.pages.add_credit_note_sales_return_voucher');
});
Route::post('credit-sales-return/save',[LedgerTypeController::class,'VoucherSave']);

Route::get('debit-note-purchase',[LedgerTypeController::class,'debitNotePurchase']);
Route::get('debit-note-purchase-voucher/add',function (){
    $previousurl=URL::previous();
    session()->put('previousurl',$previousurl);
    return view('dashboard.pages.add_debit_note_purchase_return_voucher');
});

Route::post('debit-note-purchase/save',[LedgerTypeController::class,'VoucherSave']);
