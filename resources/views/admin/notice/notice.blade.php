@extends('layouts.admin')
@section('title')
    Notice Information
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #d7537b">
                    <div class="all_and_all">
                        <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Notice Information </h4>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('update_notice') }}" id="myForm" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Notice Name <span class="require_star">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="notice_name" value="{{ $data->notice_name }}">
                                <input class="form-control" type="hidden" name="id" value="{{ $data->notice_id }}">
                                <input class="form-control" type="hidden" name="slug" value="{{ $data->notice_slug }}">

                                @error('notice_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-dark waves-effect waves-light">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
