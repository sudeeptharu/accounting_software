<?php

namespace App\Http\Controllers;

use App\Models\LedgerClassification;
use App\Models\LedgerGroup;
use App\Models\LedgerType;
use App\Models\VoucherType;
use Illuminate\Http\Request;

class LedgerGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ledger_classifications=LedgerClassification::all();
        $ledger_types=LedgerType::all();
        $voucher_types=VoucherType::all();
        $ledger_groups=LedgerGroup::with('classification')->with('parent')->with('negative_ledger')->get();
        return view('dashboard.pages.ledger_groups',compact('ledger_groups','voucher_types','ledger_types','ledger_classifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'title' => 'required|string',
            'identifier'=>'required|string',
            'classification_identifier' => 'nullable|string',
            'parent_identifier' => 'nullable|string',
            'negative_identifier' => 'nullable|string',
            'affects_gross_profit' => 'boolean',
            'voucher_type'=>'required',
            'ledger_type'=>'required'
        ]);
        LedgerGroup::create($data);
        return redirect('ledger-group');

    }

    /**
     * Display the specified resource.
     */
    public function show(LedgerGroup $ledgerGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LedgerGroup $ledgerGroup)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LedgerGroup $ledgerGroup)
    {
        $id=$request->id;
        $data = $request->validate([
            'title' => 'required|string',
            'identifier' => 'required|string',
            'classification_identifier' => 'nullable|string',
            'parent_identifier' => 'nullable|string',
            'negative_identifier' => 'nullable|string',
            'affects_gross_profit' => 'boolean',
            'voucher_type'=>'required',
            'ledger_type'=>'required'
        ]);
        $ledgerGroup = LedgerGroup::findOrFail($id);
        $ledgerGroup->update($data);
        return redirect('ledger-group');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        LedgerGroup::where(['id'=>$id])->delete();
        return redirect('ledger-group');
    }
}
