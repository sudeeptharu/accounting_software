@extends('dashboard.layouts.app',['name' => 'Credit Note Sales'])

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Credit Note Sales</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Credit Note Sales</a></li>
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
                                <a href="credit-sales-return/add" class="btn btn-primary">
                                    Add  Credit Note Sales
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
                                    @foreach($creditnotesalesvouchers as $creditnotesalesvoucher)

                                        <tr class="text-center">
                                            <td>{{$creditnotesalesvoucher->transaction_no}}</td>
                                            <?php $total = 0; ?>
                                            @foreach($creditnotesalesvoucher->transaction_entries as $transaction_entry)
                                                <?php $total += $transaction_entry->amount; ?>
                                            @endforeach
                                            <td>{{ $amount=$total/2 }}</td>
                                            <td>{{$creditnotesalesvoucher->transaction_date}}</td>
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
