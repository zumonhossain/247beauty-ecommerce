
@extends('layouts.admin')
@section('title')
    Banner Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Banner Update Information</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('banner.update') }}" id="myForm" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" class="form-control" value="{{ $data->id }}">
                        <input type="hidden" name="slug" class="form-control" value="{{ $data->ban_slug }}">

                        <div class="row row-sm">
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label class="form-control-label">Banner Image<span class="require_star">*</span></label>
                                    <input type="file" name="ban_image" class="form-control" onchange="mainThambUrl(this)">

                                    <img class="card-img-top" src="{{asset('uploads/admin/banner/'.$data->ban_image)}}" alt="Card image cap" style="height: 100px; width:150px;">

                                    <img src="" id="mainThmb">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label class="form-control-label">Banner Url<span class="require_star">*</span></label>
                                    <input type="text" name="ban_url" class="form-control" value="{{ $data->ban_url }}">
                                    @error('ban_url')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark registration-btn">Update Banner</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
