@extends('layouts.website')
@section('content')
@section('title') SSL Hosted Payment @endsection
    <div class="body-content">
        <div class="container">
            <div class="checkout-box">
                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Your cart</span>
                            <span class="badge badge-secondary badge-pill">{{ Cart::count() }}</span>
                        </h4>
                        <ul class="list-group mb-3">
                            @foreach ($carts as $item)
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0"><strong style="color:black">Name : </strong> {{ $item->name }}</h6>
                                        <small class="text-muted"><strong style="color:black">Color : </strong> {{ $item->options->color }}</small> <br>
                                        <small class="text-muted"><strong style="color:black">Size : </strong> {{ $item->options->size }}</small>
                                    </div>
                                    <span class="text-muted"><strong style="color:black">Price : </strong> {{ $item->price }}tk</span>
                                </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between">
                                <span><strong>Total = </strong></span>
                                <strong>${{ $total_amount }}</strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8 order-md-1">
                        <form action="{{ url('/pay') }}" method="POST" class="needs-validation">

                            <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                            <input type="hidden" value="{{ $total_amount }}" name="amount" id="total_amount" required/>

                            <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                            <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                            <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                            <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                            <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                            <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                            <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                            <input type="hidden" name="notes" value="{{ $data['notes'] }}">

                            <hr class="mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="same-address">

                                <label class="custom-control-label" for="same-address">Shipping address is the same as my billing
                                    address</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="save-info">
                                <label class="custom-control-label" for="save-info">Save this information for next time</label>
                            </div>
                            <hr class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                        </form>
                    </div>
                </div><!-- /.row -->
            </div>
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection
