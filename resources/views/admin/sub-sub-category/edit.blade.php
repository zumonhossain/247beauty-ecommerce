@extends('layouts.admin')
@section('title')
    Sub SubCategory Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Sub SubCategory Update Information</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('sub-sub-category.update') }}" id="myForm" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" class="form-control" value="{{ $subsubcategory->id }}">
                        <input type="hidden" name="slug" class="form-control" value="{{ $subsubcategory->subsubcategory_slug }}">

                        <div class="row row-sm">
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label class="form-control-label">Category Name<span class="require_star">*</span></label>
                                    <select class="form-control" name="category_id">
                                        <option value="">-- Select Category Name --</option>
                                        @foreach($category as $cat)
                                            <option value="{{ $cat->id }}" {{ $cat->id == $subsubcategory->category_id ? 'selected': '' }}> {{ $cat->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label class="form-control-label">Sub SubCategory Name<span class="require_star">*</span></label>
                                    <select class="form-control" name="subcategory_id">
                                        <option value="">-- Select SubCategory Name --</option>
                                        @foreach($subcategory as $subcat)
                                            <option value="{{ $subcat->id }}" {{ $subcat->id == $subsubcategory->subcategory_id ? 'selected': '' }}> {{ $subcat->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label class="form-control-label">Sub SubCategory Name<span class="require_star">*</span></label>
                                    <input type="text" name="subsubcategory_name" class="form-control" value="{{ $subsubcategory->subsubcategory_name }}">
                                    @error('subsubcategory_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label class="form-control-label">Sub Sub Category Image<span class="require_star">*</span></label>
                                    <input type="file" name="subsubcategory_image" class="form-control" onchange="mainThambUrl(this)">

                                    <img class="card-img-top" src="{{asset('uploads/admin/category/'.$subsubcategory->subsubcategory_image)}}" alt="Card image cap" style="height: 100px; width:150px;">

                                    <img src="" id="mainThmb">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-4">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark registration-btn">Update Sub SubCategory</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    "category_id": {
                        required : true,
                    },
                    "subcategory_id": {
                        required : true,
                    },
                    "subsubcategory_name": {
                        required : true,
                    },
                },
                messages :{

                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>

    <!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->
    <script src="{{ asset('contents/admin') }}/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: "{{  url('/admin/subcategory/ajax') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                        var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection





