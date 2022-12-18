@extends('layouts.website')
@section('title')
    Login
@endsection
@section('content')
    <div class="body-content mt-3 mb-3">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <div class="col-md-4 m-auto">

                        <div class="login-form-bg" style="background-color:#d7537b;padding:40px 35px">
                            <div class="login-hear text-center pb-3">
                                <h4 style="color: #ffffff">Login In</h4>
                            </div>
                            <form action="{{ route('login') }}" method="POST"  class="register-form outer-top-xs" role="form">
                                @csrf

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1" style="color: #ffffff">Email Address <span class="star">*</span></label>
                                    <input type="email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="exampleInputEmail1">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputPassword1" style="color: #ffffff">Password <span class="star">*</span></label>
                                    <input type="password" class="form-control unicase-form-control text-input @error('password') is-invalid @enderror" name="password" id="exampleInputPassword1" >
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="radio outer-xs">
                                    <label>
                                        <input type="radio" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> <span style="color: #ffffff">Remember me!</span>
                                    </label>
                                    <a href="{{ route('password.request') }}" class="forgot-password pull-right"><span style="border-bottom:1px solid;color:#ddd;font-size:14px">Forgot your Password?</span></a>
                                </div>
                                <div class="create-new-account">
                                    <a href="{{ route('register') }}" style="color: #9f1786ad;font-size: 14px;font-weight: bold;">Register Here</a>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn-upper btn checkout-page-button" style="background-color: #000000;color:#ffffff">Login</button>
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

