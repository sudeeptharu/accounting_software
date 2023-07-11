@extends('dashboard.layouts.app',['name' => 'Purchase Voucher'])

@section('content')
    <div class="">
        <div class="card card-secondary card1">
            <div class="card-header">
                <h3 class="card-title">Purchase Voucher</h3>
            </div>


            <form class="form-horizontal" action="{{url('purchase-voucher/save')}}" method="post" >
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="vno">V.no</label>
                                <input type="number" class="form-control" name="transaction_no" id="transaction_no"  autocomplete="off">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" name="transaction_date" id="transaction_date"  autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="voucher_type_identifier" value="PC" >

                    <div class="row">
                        <div class="col-1">
                            <select class="form-control" name="dc[]" >
                                <option selected value="0">Cr</option>

                            </select>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <select class="form-control cash-bank-creditor-debitor-ledger-selector" name="ledger_id[]">

                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="amount[]" id="amount" placeholder="Enter Amount"  autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <select class="form-control" name="dc[]" >
                                <option selected value="1">Dr</option>

                            </select>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <select class="form-control purchase-tax-ledger-selector" name="ledger_id[]" >

                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="amount[]" id="amount"placeholder="Amount"  autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="addDrBoxInPurchase " id="addDrBoxInPurchase">

                    </div>
                    <div>
                        <button type="button" id="addDrPurchase" class="btn btn-primary">add</button>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="narration">Narration</label>
                                <textarea class="form-control" name="narration" id="narration"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="remarks">Remarks</label>
                                <textarea class="form-control" name="remarks" id="remarks"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" id="submit" class="btn btn-lg btn-block btn-primary">Submit</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>

@endsection
