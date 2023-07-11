@extends('dashboard.layouts.app',['name' => 'Payment'])

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Payment</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Payment</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="payment-voucher/add" class="btn btn-primary">
                                    Add Payment Voucher
                                </a>

                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr class="table-info text-center">
                                        <th>Transaction ID</th>
                                        <th>Voucher Type Identifier </th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($paymentvouchers as $paymentvoucher)

                                        <tr class="text-center">
                                            <td>{{$paymentvoucher->transaction_no}}</td>
                                            <td>{{$paymentvoucher->voucher_type_identifier}}</td>
                                            <td>{{$paymentvoucher->transaction_date}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    </div>


@endsection
