@extends('dashboard.layouts.app',['name' => 'Voucher Type'])

@section('content')
    <div class="">
        <div class="card card-secondary card1">
            <div class="card-header">
                <h3 class="card-title">Contra Voucher</h3>
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
                        <div class="col-6">
                            <div class="form-group">
                                <label for="vno">Dr</label>
                                <select class="form-control">
                                    <option>sdfsd</option>
                                    <option>sdfshikb</option>
                                    <option>no</option>
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
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="cr">cr</label>
                                <select class="form-control">
                                    <option>sdfsd</option>
                                    <option>sdfshikb</option>
                                    <option>no</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="addDrNoteBox row" id="addDrNoteBox">

                    </div>
                    <div>
                        <button type="button" id="addDrNote" class="btn btn-primary">add</button>
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
