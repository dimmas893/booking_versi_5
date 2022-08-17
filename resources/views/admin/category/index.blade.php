@extends('layouts.template')


@section('content')
    <div class="row">
        <div class="col-12 text-right">
            <a href="javascript:void(0)" class="btn btn-success mb-3" id="create-new-post" onclick="addPost()">Add Category</a>
        </div>
    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($category as $post)
                                            <tr id="row_{{$post->id}}">
                                                <td>{{ $post->id  }}</td>
                                                <td>{{ $post->name }}</td>
                                                <td>
                                                    <a href="javascript:void(0)" data-id="{{ $post->id }}" onclick="editPost(event.target)" class="btn btn-info">Edit</a>
                                                    <a href="javascript:void(0)" data-id="{{ $post->id }}" class="btn btn-danger" onclick="deletePost(event.target)">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
     
    <div class="modal fade" id="post-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form name="userForm" class="form-horizontal">
                    <input type="hidden" name="post_id" id="post_id">

                        <div class="form-group">
                            <label class="col-sm-2">name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="nama category" rows="4" cols="50">
                                <span id="nameError" class="alert-message"></span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="createPost()">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
        $('#example').DataTable();
    });

    function addPost() {
        $("#post_id").val('');
        $('#post-modal').modal('show');
    }

    function editPost(event) {
        var id  = $(event).data("id");
        let _url = `/category/edit/${id}`;
        $('#nameError').text('');

        $.ajax({
        url: _url,
        type: "GET",
        success: function(response) {
            if(response) {
                $("#post_id").val(response.id);
                $("#name").val(response.name);
                $('#post-modal').modal('show');
            }
        }
        });
    }

    function createPost() {
        var name = $('#name').val();
        var id = $('#post_id').val();

        let _url     = `/category/store`;
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: _url,
            type: "POST",
            data: {
            id: id,
            name: name,
            _token: _token
            },
            success: function(response) {
                if(response.code == 200) {
                if(id != ""){
                    $("#row_"+id+" td:nth-child(2)").html(response.data.name);
                } else {
                    $('table tbody').prepend('<tr id="row_'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.name+'</td><td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editPost(event.target)" class="btn btn-info">Edit</a><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deletePost(event.target)">Delete</a></td></tr>');
                }
                $('#title').val('');
                $('#name').val('');

                $('#post-modal').modal('hide');
                }
            },
            error: function(response) {
            $('#nameError').text(response.responseJSON.errors.name);
            }
        });
    }

    function deletePost(event) {
        var id  = $(event).data("id");
        let _url = `/category/delete/${id}`;
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: _url,
            type: 'DELETE',
            data: {
            _token: _token
            },
            success: function(response) {
            $("#row_"+id).remove();
            }
        });
    }

    </script>
@endsection