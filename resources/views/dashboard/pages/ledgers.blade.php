@extends('dashboard.layouts.app',['name' => 'Ledger'])

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Ledger</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Ledger</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_ledger">
                                    Add Ledger
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <th>
                                    <tr class="table-info text-center">
                                        <th>Title</th>
                                        <th>Group </th>
                                    <th>Opening Amount</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ledgers as $ledger)
                                    @php($openingBalance = $ledger->openingBalance())

                                        <tr class="text-center">
                                            <td>{{$ledger->title}}</td>
                                            <td>{{$ledger->group_identifier}}</td>
                                            <td>{{$openingBalance}} </td>
                                            <td>

                                                <div class="btn-group">
                                                    <a href="#" data-toggle="modal" data-target="#edit_ledger"
                                                       data-id="{{$ledger->id}}"
                                                       data-title="{{$ledger->title}}"
                                                       data-group_identifier="{{$ledger->group_identifier}}"
                                                       data-opening_balance="{{ $openingBalance }}"
                                                       class="btn-primary btn-sm" title="Edit"><span class="fa fa-edit"></span></a>
                                                    <a href="{{url('/role/delete/'.$ledger->id )}}"
                                                       class="btn btn-danger btn-sm" title="Delete"><span class="fa fa-trash"></span>
                                                    </a>
                                                </div>

                                            </td>
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

    <div class="modal fade" id="add_ledger">
        @include('dashboard.pages.modals.add_edit_ledger', ['task' => 'save' ]);
    </div>

    <div class="modal fade" id="edit_ledger">
        @include('dashboard.pages.modals.add_edit_ledger', ['task' => 'update' ]);
    </div>

{{--    <div class="modal fade" id="delete_modal">--}}
{{--        @include('dashboard.pages.modals.delete_modal');--}}
{{--    </div>--}}

@endsection
