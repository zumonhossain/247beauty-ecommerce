@extends('layouts.website')
@section('title')
    My-Cart
@endsection
@section('content')
    <!-- ==================== Cart Page Area start ==================== -->
    <section>
        <div class="cart-page-main-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mt-5">
                        <div class="shopping-cart">
                            <div class="shopping-cart-table ">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-romove item">Image</th>
                                                <th class="cart-description item">Name</th>
                                                <th class="cart-description item">Price</th>
                                                <th class="cart-product-name item">Color</th>
                                                <th class="cart-qty item">Quantity</th>
                                                <th class="cart-total last-item">Subtotal</th>
                                                <th class="cart-total last-item">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody id="cartPage">

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 mt-5 mb-5">

                        @if (Session::has('coupon'))

                        @else
                            <table id="couponField">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="estimate-title">Discount Code</span>
                                            <p>Enter your coupon code if you have one..</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon.." id="coupon_name">
                                            </div>
                                            <div class="clearfix pull-right">
                                                <button type="submit" class="btn-upper btn checkout-btn" onclick="applyCoupon()">APPLY COUPON</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>

                    <div class="col-md-6 col-sm-12 mt-5 mb-5">
                        <table class="table">
                            <thead id="couponCalField">

                            </thead>


                            <tbody>
                                <tr>
                                    <td>
                                        <div class="cart-checkout-btn mt-4">
                                            <a href="{{ route('checkout') }}" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- ==================== Cart Page Area start ==================== -->
@endsection
