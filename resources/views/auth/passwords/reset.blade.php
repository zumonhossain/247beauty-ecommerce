@extends('layouts.website')
@section('title')
    Forget Password
@endsection
@section('content')
    <div class="body-content mt-5 mb-5">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <div class="col-md-6 m-auto sign-in">
                        <div class="forgate-password" style="background-color:#d7537b;padding:40px 35px">
                            <h4 class="text-center" style="color: #ffffff">Forget Password</h4>
                            <form class="register-form outer-top-xs" role="form" method="POST"
                                action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1" style="color: #ffffff">Email Address <span style="color: #ffffff">*</span></label>
                                    <input type="email" class="form-control unicase-form-control text-input"
                                        id="exampleInputEmail1" name="email" vvalue="{{ $email ?? old('email') }}"
                                        placeholder="email address">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: #000000">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1" style="color: #ffffff">Password <span style="color: #ffffff">*</span></label>
                                    <input type="password" class="form-control unicase-form-control text-input"
                                        id="exampleInputEmail1" name="password" placeholder="password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: #000000">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1" style="color: #ffffff">Confirm Password <span style="color: #ffffff">*</span></label>
                                    <input type="password" class="form-control unicase-form-control text-input"
                                        id="exampleInputEmail1" name="password_confirmation" placeholder="Retype Password">
                                </div>

                                <button type="submit"
                                    class="btn-upper btn checkout-page-button" style="background-color:#000000;color: #ffffff">{{ __('Reset Password') }}</button>
                                <a href="{{ route('login') }}" class="forgot-password pull-right" style="color:#9f1786ad;font-size:14px;text-decoration: underline;">Return to login</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
