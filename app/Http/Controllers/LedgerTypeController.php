<?php

namespace App\Http\Controllers;

use App\Models\LedgerType;
use Illuminate\Http\Request;

class LedgerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ledger_types=LedgerType::all();
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
}
