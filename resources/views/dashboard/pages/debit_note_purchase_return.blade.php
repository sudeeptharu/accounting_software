@extends('dashboard.layouts.app',['name' => 'Voucher Type'])

@section('content')
    <div class="">
        <div class="card card-secondary card1">
            <div class="card-header">
                <h3 class="card-title">Debit Note Purchase Return</h3>
            </div>
            <form class="form-horizontal"  method="post"  action="{{url('')}}" >
                @csrf
                <input type="hidden" name="voucher_type_identifier" value="DN" >

                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="vno">V.no</label>
                                <input type="number" class="form-control" name="transaction_no" id="vno"  autocomplete="off">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" name="transaction_date" id="date"  autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <select class="form-control" name="dc[]" disabled>
                                <option selected value="1">Dr</option>

                            </select>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <select class="form-control cash-bank-creditor-debitor-ledger-selector"
                                        name="ledger_id[]">
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="amount[]" id="amount" placeholder="Amount" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <select class="form-control" name="dc[]" >
                                <option selected value="0">Cr</option>

                            </select>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <select class="form-control purchase-tax-ledger-selector" name="ledger_id[]">

                                </select>
                            </div>
                        </div>

                    </div>

                    <div  id="addCrBoxInDebitNote">

                    </div>
                    <div>
                        <button type="button" id="addCrDebitNote" class="btn btn-primary">add</button>
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
                            <button type="button" class="btn btn-lg btn-block btn-primary">Submit</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>


@endsection
