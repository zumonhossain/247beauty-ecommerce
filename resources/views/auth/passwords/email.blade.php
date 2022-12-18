@extends('layouts.website')
@section('title')
    Forgate Password
@endsection
@section('content')
    <div class="body-content mt-5 mb-5">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <div class="col-md-6 m-auto create-new-account">
                        <div class="forgate-password" style="background-color:#d7537b;padding:40px 35px">
                            <div class="text-center">
                                <h4 class="checkout-subtitle" style="color: #ffffff">Forgate Password</h4>
                            </div>
                            <form method="POST" action="{{ route('password.email') }}" class="register-form outer-top-xs" role="form">
                                @csrf

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail2" style="color: #ffffff">Email Address <span style="color: #ffffff">*</span></label>
                                    <input type="email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: #000000">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn-upper btn checkout-page-button" style="background-color: #000000;color:#ffffff">Send Password Reset Link</button>
                                <a href="{{ route('login') }}" class="forgot-password pull-right"><span style="border-bottom:1px solid;font-weight:bold;color:#9f1786ad;font-size:14px">Return to login</span></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

