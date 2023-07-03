<?php

namespace App\Http\Controllers;

use App\Models\LedgerClassification;
use Illuminate\Http\Request;

class LedgerClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ledgerClassifications=LedgerClassification::all();
        return view('dashboard.pages.ledger_classification',compact('ledgerClassifications'));
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
           'identifier'=>'required|string'
        ]);
        LedgerClassification::create($data);
        return redirect('ledger-classification');
    }

    /**
     * Display the specified resource.
     */
    public function show(LedgerClassification $ledgerClassification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LedgerClassification $ledgerClassification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LedgerClassification $ledgerClassification)
    {
        $id=$request->id;
        $data=$request->validate([
            'title'=>'required|string',
            'identifier'=>'required|string'
        ]);
        $ledger = LedgerClassification::findOrFail($id);
        $ledger->update($data);
        return redirect('ledger-classification');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        LedgerClassification::where(['id'=>$id])->delete();
        return redirect('ledger-classification');
    }
}
