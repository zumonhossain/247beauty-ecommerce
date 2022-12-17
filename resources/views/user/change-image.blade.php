@extends('layouts.website')
@section('title')
    Image Change
@endsection
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="sign-in-page mt-4 mb-4">
                <div class="row">
                    <div class="col-md-4">
                        @include('user.includes.profile-sidebar')
                    </div>
                    <div class="col-md-8 mt-1">
                        <div class="card">
                            <h3 class="text-center pt-4"> <span class="text-danger">Hi..!</span> <strong
                                    class="text-warning">{{ Auth::user()->name }}</strong> Update Your profile</h3>
                            <div class="card-body">
                                <form action="{{ route('update.image') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="old_image" value="{{ Auth::user()->image }}">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image</label>
                                        <input type="file" name="image" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
