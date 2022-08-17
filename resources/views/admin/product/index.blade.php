@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-12 text-right">
            <a href="javascript:void(0)" class="btn btn-success mb-3" id="create-new-post" onclick="addPost()">Add Products</a>
        </div>
    </div>
    <div class="body serviceListHolder"></div>
     
    <div class="modal fade" id="post-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Product</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" id="addPostForm" enctype="multipart/form-data">
                        @csrf
                        <div class="upload-imgs">
                            <div class="img-uploade-row">
                                <div class="upload-column">

                                    <input onchange="doAfterSelectImage(this)" type="file" name="image" class="image_" id="image_"
                                        style="display:none">
                                    <div class="form-group">
                                            <label class="col-sm-2">name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="nama product">
                                            </div>
                                        </div>

                                    <div class="form-group">
                                            <label class="col-sm-2">harga</label>
                                            <div class="col-sm-12">
                                                <input type="integer" class="form-control" id="harga" name="harga" placeholder="Harga Product">
                                            </div>
                                        </div>
                                    <div class="form-group">
                                            <label class="col-sm-2">stock</label>
                                            <div class="col-sm-12">
                                                <input type="integer" class="form-control" id="stock" name="stock" placeholder="stock Product">
                                            </div>
                                        </div>

                                            <div class="form-group">
                                                <label class="col-sm-2">Kategori</label>
                                                    <div class="col-sm-12">
                                                        <select name="categories_id" class="form-control">
                                                            @foreach ($categories as $p)
                                                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                            </div>

                                        {{-- <div class="form-group">
                                            <label class="col-sm-2">image</label>
                                            <div class="col-sm-12">
                                                <input type="file" class="form-control" id="image" name="image" placeholder="image Product">
                                            </div>
                                        </div> --}}
                                    <label for="image_" class="img-uploaders ml-3">
                                        <img src="{{asset('assets/images/placeholder.png')}}" height="50px" id="post_user_image_" />
                                    </label>
                                    <p class="ml-3">Masukan Image</p>
                                    <span style="display:none" id="error_image_" class="">
                                        <div class="alert alert-danger" role="alert">Post is required</div>
                                    </span>
                                </div>


                            </div>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn_modal_blue complete_order_btn">
                            Save Post
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script src="{{ asset('js/helpers.js') }}"></script>
<script>
    function addPost() {
        $("#post_id").val('');
        $('#post-modal').modal('show');
    }
    $(function () {

        getPostImages();
        $(document).on("click", ".complete_order_btn", function (event) {
            event.preventDefault();
            let check = userHasUploadedimages();
            if (check) {
                let myForm = document.getElementById('addPostForm');
                let formData = new FormData(myForm);
                uploadimages(formData);
                console.log(formData);
            }
        });
    });

    function uploadimages(formData) {
        console.log(formData);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            data: formData,
            dataType: 'JSON',
            contentType: false,
            processData: false,
            url: "{{ route('products-store') }}",
            success: function (data) {
                if (data.status) {
                    showCustomSucces(data.message);
                    getPostImages();
                } else {
                    showCustomError(data.error)
                }
                 $('#post-modal').modal('hide');
            },
            error: function (err) {
                showCustomError('Something went Wrong!')
            }
        });
    }


    function userHasUploadedimages() {
        let check = true;
        let file = $('#image_').get(0).files[0];
        console.log(file);
        if (file == undefined || file == null) {
            check = false;
            handleErrors();
            return check;
        }

        handleErrors();
        return check;
    }


    function handleErrors() {
        let file = $("#image_").get(0).files[0];
        if (file == undefined || file == null) {
            $("#error_image_").show();
        } else {
            $("#error_image_").hide();
        }
    }

    function doAfterSelectImage(input) {
        readURL(input);
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#post_user_image_').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }



    ////////////////////// Get all Customers //////////////////////////////
    // Get Data from DB
    function getPostImages() {
        $.ajax({
            type: 'GET',
            url: "get_products",
            success: function (response) {
                var response = JSON.parse(response);
                $('.serviceListHolder').empty();
                $('.serviceListHolder').append(`
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md serviceList">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Images</th>
                                        <th>name</th>
                                        <th>stock</th>
                                        <th>harga</th>
                                        <th>kategory</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                <tbody>
                </tbody>
                            </table>
                        </div>
                    </div>
                `);
                response.forEach(element => {
                $('.serviceList tbody').append(`
                <tr>
                    <td>${element.id}</td>
                    <td><img src="{{asset('storage/users/${element.image}')}}" height="50px" width="70px"> </td>
                    <td>${element.name}</td>
                    <td>${element.stock}</td>
                    <td>${element.harga}</td>
                    <td>${element.category.name}</td>
                    <td>
                        <a class="btn btn-dark btn-sm" href="{{ url('products/${element.id}') }}">Update</a>
                        <button class="btn btn-danger btn-sm del_post" id="${element['id']}">Delete</button>
                    </td>
                </tr>
                  `);
                });
            }
        })
    }


    // Delete Image 
    $(document).on('click', '.del_post', function () {
        var id = $(this).attr('id');
    
        $.ajax({
            type: 'GET',
            url: 'delete/'+id,
            data: {
                id: id
            },
            success: function (data) {

                if (data.status) {
                    showCustomSucces(data.message);
                    getPostImages();
                } else {
                    showCustomError(data.error)
                }

            }
        });
    });


</script>

@endsection