@extends('dashboard.layouts.app',['name' => 'ledger_group'])

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">ledger Group</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Ledger Group</a></li>
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_ledger_group">
                                    Add Ledger Group
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped dataTable datatable">
                                    <thead>
                                    <tr class="table-info text-center">
                                        <th>Title</th>
                                        <th>Identifier</th>
                                        <th>Classification</th>
                                        <th>Parent </th>
                                        <th>Negative </th>
                                        <th>Legder Type</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($ledger_groups as $ledger_group)

                                        <tr class="text-center">
                                            <td>{{$ledger_group->title}}</td>
                                            <td>{{$ledger_group->identifier}}</td>
                                            <td>
                                                @if ($ledger_group->classification)
                                                    {{ $ledger_group->classification->title }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($ledger_group->parent)
                                                    {{$ledger_group->parent->title}}
                                                @endif

                                            </td>
                                            <td>

                                                @if($ledger_group->negative_ledger)
                                                    {{$ledger_group->negative_ledger->title}}
                                                @endif
                                            </td>
                                            <td>{{$ledger_group->ledger_type}}</td>
                                            <td>

                                                <div class="btn-group">
                                                    <a href="#" data-toggle="modal" data-target="#edit_ledger_group"
                                                       data-id="{{$ledger_group->id}}"
                                                       data-title="{{$ledger_group->title}}"
                                                       data-classification_identifier="{{$ledger_group->classification_identifier}}"
                                                       data-parent_identifier="{{$ledger_group->parent_identifier}}"
                                                       data-negative_identifier="{{$ledger_group->negative_identifier}}"
                                                       data-identifier="{{$ledger_group->identifier}}"
                                                       data-affects_gross_profit="{{$ledger_group->affects_gross_profit}}"
                                                       class="btn btn-primary btn-sm" title="Edit"><span class="fa fa-edit"></span></a>
                                                    &nbsp;&nbsp;
                                                    <a href="{{url('/ledger-group/delete/'.$ledger_group->id)}}"
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

    <div class="modal fade" id="add_ledger_group">
        @include('dashboard.pages.modals.add_edit_ledger_group', ['task' => 'save' ]);
    </div>

    <div class="modal fade" id="edit_ledger_group">
        @include('dashboard.pages.modals.add_edit_ledger_group', ['task' => 'update' ]);
    </div>

{{--    <div class="modal fade" id="delete_modal">--}}
{{--        @include('dashboard.pages.modals.delete_modal');--}}
{{--    </div>--}}

@endsection
