@extends('dashboard.layouts.app',['name' => 'Journal Voucher'])

@section('content')
    <div class="">
        <div class="card card-secondary card1">
            <div class="card-header">
                <h3 class="card-title">Journal Voucher</h3>
            </div>


            <form class="form-horizontal"  >
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="vno">V.no</label>
                                <input type="text" class="form-control" name="vno" id="vno"  autocomplete="off">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" name="date" id="date"  autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="vno">Dr/Cr</label>
                                <select class="form-control">
                                    <option>Dr</option>
                                    <option>Cr</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="vno">Ledgers</label>
                                <select class="form-control">
                                    <option>zdadf</option>
                                    <option>Cr</option>
                                    <option>Cradf</option>
                                    <option>aaaCr</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" class="form-control" name="amount" id="amount"  autocomplete="off">
                            </div>
                        </div>

                    </div>

                    <div class="addLedgerBox " id="addLedgerBox">

                    </div>
                    <div>
                        <button type="button" id="addLedger" class="btn btn-primary">add</button>
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
