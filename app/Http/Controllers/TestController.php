<?php

namespace App\Http\Controllers;

use App\Models\Ledger;
use App\Models\LedgerClassification;
use App\Models\LedgerGroup;
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
}
