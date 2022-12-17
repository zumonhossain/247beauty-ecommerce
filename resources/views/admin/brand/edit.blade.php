@extends('layouts.admin')
@section('title')
    Brand Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Brand Update Information</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('brand.update') }}" id="myForm" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" class="form-control" value="{{ $data->id }}">
                        <input type="hidden" name="slug" class="form-control" value="{{ $data->brand_slug }}">

                        <div class="row row-sm">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label">Brand Name<span class="require_star">*</span></label>
                                    <input type="text" name="brand_name" class="form-control" value="{{ $data->brand_name }}">
                                    @error('brand_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label">Brand Image</label>
                                    <input type="file" name="brand_image" class="form-control" onchange="mainThambUrl(this)">

                                    <img class="card-img-top" src="{{asset('uploads/admin/brand/'.$data->brand_image)}}" alt="Card image cap" style="height: 100px; width:150px;">

                                    <img src="" id="mainThmb">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="demo-checkbox">
                                        <input type="checkbox" id="md_checkbox_20" name="top_brand" class="filled-in chk-col-red" value="1" {{ $data->top_brand == 1 ? 'checked': '' }}/>
                                        <label for="md_checkbox_20">Top Brand</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="demo-checkbox">
                                        <input type="checkbox" id="md_checkbox_21" name="featuren_brand" class="filled-in chk-col-red" value="1" {{ $data->featuren_brand == 1 ? 'checked': '' }}/>
                                        <label for="md_checkbox_21">Featuren Brand</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark registration-btn">Update Brand</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection





