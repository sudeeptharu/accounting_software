<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" > {{$task == 'save' ? 'Add ledger-group' : 'Edit ledger-group'}} </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="form-horizontal" action="{{url( $task == 'save' ? '/ledger-group/save' : '/ledger-group/update')}}" method="post">
            <div class="modal-body">

                @csrf
                {{$task == 'save' ? '' : method_field('put')}}
                <input type="hidden" name="id" id="id">

                <div class="col-12">
                    <div class="form-group row">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter ledger-group" autocomplete="off">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label for="identifier">Identifier</label>
                        <input type="text" class="form-control" name="identifier" id="identifier" placeholder="Enter ledger-group" autocomplete="off">
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group row">
                        <label for="ledger_classification"> Classification Identifier </label>
                        <select class="form-control" name="classification_identifier" id="classification_identifier">
                            <option value="">select one</option>
                            @foreach($ledger_classifications as $ledger_classification)
                                <option value="{{ $ledger_classification->identifier }}">{{ $ledger_classification->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label for="parent_identifier">parent Identifier</label>

                        <select class="form-control" name="parent_identifier" id="parent_identifier">
                            <option value="">select one</option>
                            @foreach($ledger_groups as $ledger_group)
                                <option value="{{ $ledger_group->identifier }}">{{ $ledger_group->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label for="negative_identifier">negative Identifier</label>

                        <select class="form-control" name="negative_identifier" id="negative_identifier">
                            <option value="">select one</option>
                            @foreach($ledger_groups as $ledger_group)
                                <option value="{{ $ledger_group->identifier }}">{{ $ledger_group->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label for="affect_gross_profit">Affect Gross Profit</label>
                        <label>
                            <input type="radio" name="affects_gross_profit" value="1">
                            Yes
                        </label>

                        <label>
                            <input type="radio" name="affects_gross_profit" value="0">
                            No
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label for="negative_identifier">Ledger Type</label>

                        <select class="form-control" name="ledger_type" id="ledger_type">
                            <option value="">select one</option>
                            @foreach($ledger_types as $ledger_type)
                                <option value="{{ $ledger_type->identifier }}">{{ $ledger_type->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">{{$task == 'save' ? 'Save' : 'Save changes'}}</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </form>

    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-District -->
