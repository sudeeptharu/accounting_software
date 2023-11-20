@extends('dashboard.layouts.app',['name' => 'Journal Voucher'])

@section('content')
    <div class="">
        <div class="card card-secondary card1">
            <div class="card-header">
                <h3 class="card-title">Journal Voucher</h3>
            </div>


            <form class="form-horizontal"  method="post" action="{{url('journal-voucher/save')}}">
                @csrf
                <input type="hidden" name="voucher_type_identifier" value="JV" >
                @if(Session::has('message'))
                    <p class="alert alert-danger">{{ Session::get('message') }}</p>
                @endif
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
                            <div class="form-group">
                                <label for="vno">Dr/Cr</label>
                                <select class="form-control" name="dc[]">
                                    <option value="1">Dr</option>
                                    <option value="0">Cr</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="vno">Ledgers</label>
                                <select class="form-control ledger-selector" name="ledger_id[]">

                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control" name="amount[]" id="amount"  autocomplete="off">
                            </div>
                        </div>

                    </div>

                    <div id="addLedgerBoxInJournal">

                    </div>
                    <div>
                        <button type="button" id="addDcJournal" class="btn btn-primary">add</button>
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
                            <button type="submit" class="btn btn-lg btn-block btn-primary">Submit</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>


@endsection
