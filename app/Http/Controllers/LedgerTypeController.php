<?php

namespace App\Http\Controllers;

use App\Models\LedgerGroup;
use App\Models\LedgerType;
use App\Models\Ledger;
use App\Models\Transaction;
use App\Models\TransactionEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class LedgerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ledger_types= LedgerType::with('ledger_groups.ledgers')->get();
        return view('dashboard.pages.ledger_types',compact('ledger_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=>'required|string',
            'identifier'=>'required|string|unique:ledger_types'
        ]);
        LedgerType::create($data);
        return redirect('ledger-type');

    }

    /**
     * Display the specified resource.
     */
    public function show(LedgerType $ledgerType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LedgerType $ledgerType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LedgerType $ledgerType)
    {

        $id=$request->id;
        $data=$request->validate([
            'title'=>'required|string',
            'identifier'=>'required|string'
        ]);
        $ledger = LedgerType::findOrFail($id);
        $ledger->update($data);
        return redirect('ledger-type');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        LedgerType::where(['id'=>$id])->delete();
        return redirect('ledger-type');
    }
    public function getData()
    {
        $data = LedgerType::with('ledger_groups.ledgers')->get();
        return view('dashboard.pages.data', ['data' => $data]);
    }
    public function contraVoucher(){
        $contravouchers=Transaction::where('voucher_type_identifier','CT')->get();
        return view('dashboard.pages.contra_vouchers',compact('contravouchers'));
    }

    public function journalVoucher(){
        $journalvouchers=Transaction::where('voucher_type_identifier','JV')->get();
        return view('dashboard.pages.journal_vouchers',compact('journalvouchers'));
    }

    public function creditSalesReturn(){
        $creditnotesalesvouchers=Transaction::where('voucher_type_identifier','CN')->get();
        return view('dashboard.pages.credit_note_sales_vouchers',compact('creditnotesalesvouchers'));
    }

    public function debitNotePurchase(){
        $debitnotepurchasevouchers=Transaction::where('voucher_type_identifier','DN')->get();
        return view('dashboard.pages.debit_note_purchase_vouchers',compact('debitnotepurchasevouchers'));
    }

    public function receiptVoucher(){
        $receiptvouchers=Transaction::where('voucher_type_identifier','RC')->get();
        return view('dashboard.pages.receipt_vouchers',compact('receiptvouchers'));
    }

    public function purchaseVoucher(){
        $purchasevouchers=Transaction::where('voucher_type_identifier','PC')->get();
        return view('dashboard.pages.purchase_vouchers',compact('purchasevouchers'));
    }

    public function salesVoucher(){
        $salesvouchers=Transaction::where('voucher_type_identifier','SL')->get();
        return view('dashboard.pages.sales_vouchers',compact('salesvouchers'));
    }

    public function paymentVoucher(){
        $paymentvouchers=Transaction::where('voucher_type_identifier','PY')->get();
        return view('dashboard.pages.payment_vouchers',compact('paymentvouchers'));
    }
    public function VoucherSave(Request $request){
        Transaction::insert([

                'transaction_no'=>$request->transaction_no,
                'transaction_date'=>$request->transaction_date,
                'voucher_type_identifier'=>$request->voucher_type_identifier,
                'narration'=>$request->narration,
                'remarks'=>$request->remarks
        ]);
        $transaction_id=Transaction::where(['transaction_no'=>$request->transaction_no])->first();
        for($i=0; $i<count($request->dc); $i++){

            if(!isset($request->ledger_id[$i])){
                TransactionEntry::insert([
                    'transaction_id'=>$transaction_id->id,
                    'ledger_id'=>0,
                    'dc'=>$request->dc[$i],
                    'amount'=>$request->amount[$i]
                ]);
            }else{
                TransactionEntry::insert([
                    'transaction_id'=>$transaction_id->id,
                    'ledger_id'=>$request->ledger_id[$i],
                    'dc'=>$request->dc[$i],
                    'amount'=>$request->amount[$i]
                ]);
            }
        }
        $previousurl=session()->get('previousurl');
        return redirect($previousurl);
        echo "kjhkj";
    }

}

