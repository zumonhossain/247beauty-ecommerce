@extends('layouts.admin')
@section('title')
    Brand
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Brand </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('brand.insert') }}" id="myForm" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label">Brand Name<span class="require_star">*</span></label>
                                    <input type="text" name="brand_name" class="form-control" value="{{ old('brand_name') }}">
                                    @error('brand_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label">Brand Image<span class="require_star">*</span></label>
                                    <input type="file" name="brand_image" class="form-control" onchange="mainThambUrl(this)">

                                    <img src="" id="mainThmb">

                                    @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="demo-checkbox">
                                        <input type="checkbox" id="md_checkbox_20" name="top_brand" class="filled-in chk-col-red" value="1" />
                                        <label for="md_checkbox_20">Top Brand</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="demo-checkbox">
                                        <input type="checkbox" id="md_checkbox_21" name="featuren_brand" class="filled-in chk-col-red" value="1" />
                                        <label for="md_checkbox_21">Featuren Brand</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark registration-btn">Save Brand</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Brand</h4>
                </div>
                <div class="card-body">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Top Brand</th>
                                <th>Featured Brand</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brand as $item)
                                <tr>
                                    <td>{{ $item->brand_name }}</td>
                                    <td>
                                        @if($item->brand_image!='')
                                            <img src="{{asset('uploads/admin/brand/'.$item->brand_image)}}" alt="Brand" style="height: 60px; width:60px;"/>
                                        @else
                                            <img src="{{asset('uploads/no_image.jpg')}}" alt="Brand" style="height: 60px; width:60px;"/>
                                        @endif
                                    </td>
                                    <td>{{ $item->top_brand }}</td>
                                    <td>{{ $item->featuren_brand }}</td>
                                    <td>
                                        <a class="btn-success view-icon" href="{{ url('admin/brand/view/'.$item->brand_slug) }}"><i class="mdi mdi-library-plus"></i></a>
                                        <a class="btn-warning edit-icon" href="{{ url('admin/brand/edit/'.$item->brand_slug) }}"><i class="mdi mdi-table-edit"></i></a>
                                        <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{$item->id}}" href="#"><i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--delete modal code start -->
    <div id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="{{ route('brand.softdelete') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header modal_header_title">
                    <h5><i class="mdi mdi-gamepad-circle"></i> Confirm Message</h5>
                </div>
                <div class="modal-body modal_card">
                    <input type="hidden" name="modal_id" id="modal_id" />
                    Are you want to sure delete this data?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger waves-effect">Confirm</button>
                    <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection





