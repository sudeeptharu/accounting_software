@extends('dashboard.layouts.app',['name' => 'Ledger classification'])

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Ledger Classification</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">ledger-classification</a></li>
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_ledger_classification">
                                    Add Ledger Classification
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped dataTable datatable">
                                    <thead>
                                    <tr class="table-info text-center">
                                        <th>Title</th>
                                        <th>Identifier</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($ledgerClassifications as $ledgerClassification)

                                        <tr class="text-center">
                                            <td>{{$ledgerClassification->title}}</td>
                                            <td>{{$ledgerClassification->identifier}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="#" data-toggle="modal" data-target="#edit_ledger_classification"
                                                       data-id="{{$ledgerClassification->id}}"
                                                       data-title="{{$ledgerClassification->title}}"
                                                       data-identifier="{{$ledgerClassification->identifier}}"
                                                       class="btn btn-primary btn-sm" title="Edit"><span class="fa fa-edit"></span></a>
                                                    &nbsp;&nbsp;
                                                    <a href="{{url('/ledger-classification/delete/')}}" data-toggle="modal" data-target="#delete_modal"
                                                       data-url=""
                                                       class="btn btn-danger btn-sm" title="Delete"><span class="fa fa-trash"></span></a>
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

    <div class="modal fade" id="add_ledger_classification">
        @include('dashboard.pages.modals.add_edit_ledger_classification', ['task' => 'save' ]);
    </div>

    <div class="modal fade" id="edit_ledger_classification">
        @include('dashboard.pages.modals.add_edit_ledger_classification', ['task' => 'update' ]);
    </div>

{{--    <div class="modal fade" id="delete_modal">--}}
{{--        @include('dashboard.pages.modals.delete_modal');--}}
{{--    </div>--}}

@endsection
