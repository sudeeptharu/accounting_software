<?php

namespace App\Http\Controllers;

use App\Models\Ledger;
use App\Models\LedgerClassification;
use App\Models\LedgerGroup;
use Illuminate\Http\Request;

class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ledgers=Ledger::paginate(10);
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
        Ledger::create($data);

       return redirect('ledger');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ledger $ledger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ledger $ledger)
    {
        //
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
        return redirect('ledger');

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
                })
                ->get();
        }
        else
        {
            return Ledger::all();
        }
    }
}
