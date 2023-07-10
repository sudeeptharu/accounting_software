<?php

namespace App\Http\Controllers;

use App\Models\LedgerGroup;
use App\Models\LedgerType;
use App\Models\Ledger;
use App\Models\Transaction;
use App\Models\TransactionEntry;
use Illuminate\Http\Request;

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

        return view('dashboard.pages.contra_voucher');
    }

    public function journalVoucher(){

        return view('dashboard.pages.journal_voucher');
    }

    public function creditSalesReturn(){

        return view('dashboard.pages.credit_note_sales_returnn');
    }

    public function debitNotePurchase(){

        return view('dashboard.pages.debit_note_purchase_return');
    }

    public function receiptVoucher(){

        return view('dashboard.pages.receipt_voucher');
    }

    public function purchaseVoucher(){

        return view('dashboard.pages.purchase_voucher');
    }

    public function salesVoucher(){

        return view('dashboard.pages.sales_voucher');
    }

    public function paymentVoucher(){

        return view('dashboard.pages.payment_voucher');
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
        echo "created successfully";
    }

}

