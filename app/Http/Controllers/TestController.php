<?php

namespace App\Http\Controllers;

use App\Http\Resources\LedgerResource;
use App\Models\Ledger;
use App\Models\LedgerClassification;
use App\Models\LedgerGroup;
use App\Models\LedgerType;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function classification($identifier)
    {
        $classification = LedgerClassification::where('identifier',$identifier)->firstOrFail();
        dd($classification->ledger_groups);
    }
    public function group($identifier)
    {
        $group = LedgerGroup::where('identifier', $identifier)->firstOrFail();
        dd($group->negative_ledger);
    }
    public function ledger($identifier)
    {
        $ledger = Ledger::findOrFail($identifier);
        dd($ledger->ledger_group);
    }
    public function txn($id)
    {
        $txn = Transaction::findOrFail($id);
        $txn_d = $txn->transaction_entries->where('dc',false)->sum('amount');
        $txn_c = $txn->transaction_entries->where('dc',true)->sum('amount');
        echo 'Debit: '.$txn_d;
        echo '</br>';
        echo 'Credit: '.$txn_c;
    }

    public function ledgers_by_type(Request $request)
    {
        $types = $request->types;
        if ($types == null)
        {
            $ledgers = Ledger::all();
        }else
        {
            $ledgers = LedgerController::ledgersByType($types)->get();
        }

        return LedgerResource::collection($ledgers);
    }
}
