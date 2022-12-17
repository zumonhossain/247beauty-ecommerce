@extends('layouts.website')

@section('content')
    <div class="body-content mt-5 mb-5">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
				    <!-- Sign-in -->
                    <div class="col-md-6 m-auto">

                        <form action="{{ route('login') }}" method="POST"  class="register-form outer-top-xs" role="form">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="exampleInputEmail1">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input @error('password') is-invalid @enderror" name="password" id="exampleInputPassword1" >
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="radio outer-xs">
                                <label>
                                    <input type="radio" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember me!
                                </label>
                                <a href="{{ route('password.request') }}" class="forgot-password pull-right"><span style="border-bottom:1px solid;">Forgot your Password?</span></a>
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                        </form>
                    </div>
                    <!-- Sign-in -->
                </div>
            </div>
        </div>
    </div>
@endsection

