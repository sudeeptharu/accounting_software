<?php

namespace App\Http\Controllers;

use App\Models\VoucherType;
use Illuminate\Http\Request;

class VoucherTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voucher_types=VoucherType::all();
        return view('dashboard.pages.voucher_types',compact('voucher_types'));
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
            'identifier'=>'required|string|unique:voucher_types',
            'active'=>'boolean'
        ]);
        $data['active']=$request->input('active',0);
        VoucherType::create($data);
        return redirect('voucher-type');
    }

    /**
     * Display the specified resource.
     */
    public function show(VoucherType $voucherType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VoucherType $voucherType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VoucherType $voucherType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VoucherType $voucherType)
    {
        //
    }
}
