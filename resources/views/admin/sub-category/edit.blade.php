@extends('layouts.admin')
@section('title')
    Sub Category Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Sub Category Update Information</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('sub-category.update') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <input type="text" name="id" class="form-control" value="{{ $subcategory->id }}">
                        <input type="text" name="slug" class="form-control" value="{{ $subcategory->subcategory_slug }}">

                        <div class="row row-sm">
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label class="form-control-label">Category Name<span class="require_star">*</span></label>
                                    <select class="form-control" name="category_id">
                                        <option value="">-- Select Category Name --</option>
                                        @foreach($category as $cat)
                                            <option value="{{ $cat->id }}" {{ $cat->id == $subcategory->category_id ? 'selected': '' }}> {{ $cat->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label class="form-control-label">Category Name<span class="require_star">*</span></label>
                                    <input type="text" name="subcategory_name" class="form-control" value="{{ $subcategory->subcategory_name }}">
                                    @error('subcategory_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label class="form-control-label">Sub Category Image<span class="require_star">*</span></label>
                                    <input type="file" name="subcategory_image" class="form-control" onchange="mainThambUrl(this)">

                                    <img class="card-img-top" src="{{asset('uploads/admin/category/'.$subcategory->subcategory_image)}}" alt="Card image cap" style="height: 100px; width:150px;">

                                    <img src="" id="mainThmb">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-4">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark registration-btn">Update Sub Category</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection








