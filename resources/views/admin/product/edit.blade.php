@extends('layouts.template')
@section('content')
    
    <form id="updateproductsForm"  enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="{{ $products->id }}">
        @csrf
     
        <div class="upload-imgs">
            <div class="img-uploade-row">
                <div class="upload-column">

                    <input onchange="doAfterSelectImage(this)" type="file" name="image" class="image" id="image"
                        style="display:none">

                    <div class="form-group">
                        <label class="col-sm-2">name</label>
                        <div class="col-sm-12">
                            <input type="integer" class="form-control" id="name" value="{{ $products->name }}" name="name" placeholder="name Product">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2">harga</label>
                        <div class="col-sm-12">
                            <input type="integer" class="form-control" id="harga" value="{{ $products->harga }}" name="harga" placeholder="Harga Product">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2">stock</label>
                        <div class="col-sm-12">
                            <input type="integer" class="form-control" id="stock" value="{{ $products->stock }}" name="stock" placeholder="stock Product">
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
                    <label for="image" class="img-uploaders ml-3">
                        <img src="{{ asset('storage/users/'.$products->image) }}" height="50px" id="products_user_image_" />
                    </label>
                    <p class="ml-3">products image</p>
                    <span style="display:none" id="error_image">
                        <div class="alert alert-danger" role="alert">image is required</div>
                    </span>
                </div>


            </div>
        </div>
        <br><br>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary update_btn">
                    Save
                </button>
            </div>

    </form>
@endsection


@section('javascript')


    <!-- Custom scripts for all pages-->
<script src="{{ asset('js/helpers.js') }}"></script>
<script>
    $(function () {


        $(document).on("click", ".update_btn", function (event) {
            event.preventDefault();
            let check = userHasUploadedimages();
            if (check) {
                let myForm = document.getElementById('updateproductsForm');
                let formData = new FormData(myForm);
                uploadimages(formData);
                
            }
        });
    });

    function uploadimages(formData) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const id = $('#id').val();
        $.ajax({
            type: "post",
            data: formData,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            url: "update/"+id,
            success: function (data) {
                if (data.status) {
                    showCustomSucces(data.message);
                
                } else {
                    showCustomError(data.error)
                }
            },
            error: function (err) {
                showCustomError('Something went Wrong!')
            }
        });
    }


    function userHasUploadedimages() {
        let check = true;
        let file = $('#image').get(0).files[0];
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
        let file = $("#image").get(0).files[0];
        if (file == undefined || file == null) {
            $("#error_image").show();
        } else {
            $("#error_image").hide();
        }
    }

    function doAfterSelectImage(input) {
        readURL(input);
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#products_user_image_').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
@endsection