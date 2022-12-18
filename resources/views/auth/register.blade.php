@extends('layouts.website')
@section('title')
    Register
@endsection
@section('content')
    <div class="body-content mt-3 mb-3">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <div class="col-md-5 m-auto">

                        <div class="login-form-bg" style="background-color:#d7537b;padding:40px 35px">
                            <div class="login-hear text-center pb-3">
                                <h4 style="color: #ffffff">Create a new account</h4>
                            </div>
                            <form method="POST" action="{{ route('register') }}" class="register-form outer-top-xs" role="form">
                                @csrf

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1"><span style="color: #ffffff">Name</span> <span class="text-white">*</span></label>
                                    <input type="text" class="form-control unicase-form-control text-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="exampleInputEmail1" >
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: #000000">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail2"><span style="color: #ffffff">Email Address</span> <span class="text-white">*</span></label>
                                    <input type="email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: #000000">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1"><span style="color: #ffffff">Phone Number</span></label>
                                    <input type="phone" name="phone" class="form-control unicase-form-control text-input @error('phone') is-invalid @enderror" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1"><span style="color: #ffffff">Password</span> <span class="text-white">*</span></label>
                                    <input type="password" class="form-control unicase-form-control text-input @error('password') is-invalid @enderror" name="password" >
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: #000000">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1"><span style="color: #ffffff">Confirm Password</span> <span class="text-white">*</span></label>
                                    <input type="password" class="form-control unicase-form-control text-input" name="password_confirmation" >
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn-upper btn checkout-page-button" style="background-color: #000000;color:#ffffff">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Sign-in -->
                </div>
            </div>
        </div>
    </div>
@endsection

