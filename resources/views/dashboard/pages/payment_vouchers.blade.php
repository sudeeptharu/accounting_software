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
                                        <th>V.no</th>
                                        <th>Amount </th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($paymentvouchers as $paymentvoucher)

                                        <tr class="text-center">
                                            <?php $total = 0; ?>
                                            <td>{{$paymentvoucher->transaction_no}}</td>
                                            @foreach($paymentvoucher->transaction_entries as $transaction_entry)
                                                <?php $total += $transaction_entry->amount; ?>

                                            @endforeach

                                            <td>{{ $amount=$total/2 }}</td>
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
