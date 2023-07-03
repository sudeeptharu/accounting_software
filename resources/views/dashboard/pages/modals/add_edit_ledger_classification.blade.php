<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" > {{$task == 'save' ? 'Add ledger-classification' : 'Edit ledger-classification'}} </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="form-horizontal" action="{{url( $task == 'save' ? '/ledger-classification/save' : '/ledger-classification/update')}}" method="post">
            <div class="modal-body">

                @csrf
                {{$task == 'save' ? '' : method_field('put')}}
                <input type="hidden" name="id" id="id">

                <div class="col-12">
                    <div class="form-group row">

                        <label for="Name">Title</label>
                        <input type="text" class="form-control" name="title" id="title"
                               placeholder="Enter Title" autocomplete="off">

                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">

                        <label for="Name">Identifier</label>
                        <input type="text" class="form-control" name="identifier" id="identifier"
                               placeholder="Enter identifier" autocomplete="off">

                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">{{$task == 'save' ? 'Save' : 'Save changes'}}</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </form>

    </div>
    {{-- <!-- /.modal-content --> --}}
</div>
<!-- /.modal-District -->
