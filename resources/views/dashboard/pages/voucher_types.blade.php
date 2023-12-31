@extends('dashboard.layouts.app',['name' => 'Voucher Type'])

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
                            <li class="breadcrumb-item"><a href="#"></a></li>
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_voucher_type">
                                    Add Voucher Type
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

                                    @foreach($voucher_types as $voucher_type)

                                        <tr class="text-center">
                                            <td>{{$voucher_type->title}}</td>
                                            <td>{{$voucher_type->identifier}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="#" data-toggle="modal" data-target="#edit_voucher_type"
                                                       data-id="{{$voucher_type->id}}"
                                                       data-title="{{$voucher_type->title}}"
                                                       data-identifier="{{$voucher_type->identifier}}"
                                                       class="btn btn-primary btn-sm" title="Edit"><span class="fa fa-edit"></span></a>
                                                    &nbsp;&nbsp;
                                                    <a href="{{url('/ledger-type/delete/'.$voucher_type->id)}}"
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

    <div class="modal fade" id="add_voucher_type">
        @include('dashboard.pages.modals.add_edit_voucher_type', ['task' => 'save' ]);
    </div>

    <div class="modal fade" id="edit_voucher_type">
        @include('dashboard.pages.modals.add_edit_voucher_type', ['task' => 'update' ]);
    </div>

{{--    <div class="modal fade" id="delete_modal">--}}
{{--        @include('dashboard.pages.modals.delete_modal');--}}
{{--    </div>--}}

@endsection
