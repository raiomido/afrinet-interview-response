@inject('str', 'Illuminate\Support\Str')
<div>
    <table id="datatable" class="table table-bordered table-hover">
        <thead>
        <tr>
            @foreach($columns as $name => $type)
                <th>{{ucfirst($name)}}</th>
            @endforeach
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($_data as $datum)
            <tr>
                @foreach($columns as $name => $type)
                    <td>
                        @if($type == 'text')
                            {{$str->limit($datum->$name, 30)}}
                        @endif
                        @if($type == 'image')
                            <img alt="Avatar" class="img-size-50" src="{{$datum->$name}}">
                        @endif
                        @if($type == 'relationship')
                            {{$str->limit($datum->$name->name, 30)}}
                        @endif
                    </td>
                @endforeach
                <td class="project-actions text-right">
                    @if( Route::has($route_prefix.".show"))
                        <a class="btn btn-primary btn-sm" href="{{route($route_prefix.".show", $datum)}}">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                    @endif
                    @if( Route::has($route_prefix.".edit"))
                        <a class="btn btn-info btn-sm" href="{{route($route_prefix.".edit", $datum)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                    @endif
                    @if( Route::has($route_prefix.".destroy"))
                            <button type="button" data-url="{{route($route_prefix.".destroy", $datum)}}" data-toggle="modal" data-target="#delete-modal" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </button>
                        @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <form method="post" action="#" class="modal fade" id="delete-modal">
        @csrf
        @method('DELETE')
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm action</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Are you sure?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-light">Delete</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
    <script>
        $('#delete-modal').on('show.bs.modal', function(e) {
            //get data-id attribute of the clicked element
            let url = $(e.relatedTarget).data('url');
            //populate the textbox
            $(e.currentTarget).attr('action', url);
        });
    </script>
</div>
