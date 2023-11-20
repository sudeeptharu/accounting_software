<?php

namespace App\Http\Controllers;

use App\Models\Ledger;
use App\Models\LedgerClassification;
use App\Models\LedgerGroup;
use App\Models\Transaction;
use App\Models\TransactionEntry;
use Illuminate\Http\Request;

class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ledgers=Ledger::with('group')->get();
        $ledger_groups=LedgerGroup::all();
        return view('dashboard.pages.ledgers',compact('ledgers','ledger_groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data=$request->validate([
            'title'=>'required|string',
            'group_identifier'=>'nullable|string'
        ]);
        $ledger=Ledger::create($data);
        $transactions=Transaction::where('transaction_no',1)->first();
        if($transactions){
            $this->createTransactionEntry($transactions->id,$ledger->id,$request->openingBalance,$ledger->getLedgerClassification());
        }
        else{
            $transaction=new Transaction();
            $transaction->transaction_no='1';
            $transaction->voucher_type_identifier='JV';
            $transaction->transaction_date='2023';
            $transaction->narration='balance';
            $transaction->remarks='okay';
            $transaction->save();
            $transaction_id=Transaction::where('transaction_no','1')->first();
            if($transaction_id){
                $this->createTransactionEntry($transaction_id->id,
                    $ledger->id,
                    $request->openingBalance,
                    $ledger->getLedgerClassification());

            }
//

        }
       return redirect('ledger');
    }


    public function group_identifier(Ledger $ledger)
    {
        $ledger_groups=LedgerGroup::all();
        return response()->json($ledger_groups);
    }
    public function classification_identifier(Ledger $ledger)
    {
        $ledger_classification=LedgerClassification::all();
        return response()->json($ledger_classification);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ledger $ledger)
    {
        $id=$request->id;
        $data=$request->validate([
            'title'=>'required|string',
            'group_identifier'=>'nullable|string'
        ]);
        $ledger = Ledger::findOrFail($id);
        $ledger->update($data);
        $tran=Transaction::where('transaction_no',1)
            ->first();

        if($tran){
            $transactionEntities=TransactionEntry::where('transaction_id',$tran->id)->where('ledger_id',$id)->first();
            if($transactionEntities){
                $transactionEntities->amount = $request->openingBalance ?? 0;
                $transactionEntities->dc=0;
                $transactionEntities->transaction_id=$tran->id;
                $transactionEntities->ledger_id=$id;
                $transactionEntities->save();

            }else{
                $this->createTransactionEntry($tran->id,$id,$request->openingBalance,$ledger->getLedgerClassification());
            }

        }else{
            $this->createTransactionEntry($tran->id,$id,$request->openingBalance,$ledger->getLedgerClassification());
        }


        return redirect('ledger');

    }
    public function createTransactionEntry($transactionId,
                                           $ledgerId,
                                           $openingBalance,
                                           $ledgerClassification)
    {
        $transactionEntry=new TransactionEntry();
        if($ledgerClassification=='Liabilities'||$ledgerClassification=='Assets'){
            $transactionEntry->transaction_id=$transactionId;
            $transactionEntry->ledger_id=$ledgerId;
            $transactionEntry->amount = $openingBalance?? 0;
//            $transactionEntry->dc = $ledgerClassification === 'Liabilities' ? 1 : ($ledgerClassification === 'Assets' ? 0 : null);
            $transactionEntry->dc = ($ledgerClassification == 'Liabilities') ? 1 : 0;
            $transactionEntry->save();
        }
        return $transactionEntry;

    }
    public function assetsAndLiabilities()
    {
        $classification=new LedgerClassification();
        $assets=$classification->getLedgers('assets');
        $liabilities=$classification->getLedgers('liabilities');
        dd($assets);
        return view('dashboard.pages.assets_liabilities',compact('assets','liabilities'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Ledger::where(['id'=>$id])->delete();
        return redirect('ledger');
    }

    public static function ledgersByType($ledgerTypes = null)
    {
        if ($ledgerTypes != null)
        {

            return Ledger::with('group.ledger_type')
                ->whereHas('group.ledger_type', function ($query) use ($ledgerTypes) {
                    $query->whereIn('ledger_type', $ledgerTypes);
                })->orderBy('title');
        }
        else
        {
            return Ledger::orderBy('title');
        }
    }
}
