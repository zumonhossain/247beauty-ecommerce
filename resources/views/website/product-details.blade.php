@extends('layouts.website')
@section('title')
Product Details
@endsection
@section('content')
    <!-- ==================== Product Details Area start ==================== -->
    <section class="details-area section-padding details-bg mt-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="owl-carousel product-details-active">
                        @foreach ($multiImgs as $img)
                            <div data-dot="<img src='{{ asset($img->photo_name) }}'>" class="single-product-details">
                                <div class="product-details-head">
                                    <img src="{{ asset($img->photo_name) }}" alt="">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="details-right-content">
                        <div class="details-head">
                            <h2 id="pname" class="name">{{ $product->product_name }}</h2>
                        </div>
                        <div class="details-rating-review mt-3">
                            <span class="details-rating"><i class="fa-solid fa-star"></i></span>
                            <span class="details-rating"><i class="fa-solid fa-star"></i></span>
                            <span class="details-rating"><i class="fa-solid fa-star"></i></span>
                            <span class="details-rating"><i class="fa-solid fa-star"></i></span>
                            <span class="details-rating"><i class="fa-solid fa-star"></i></span>
                            <span class="details-review">(10 Reviews)</span>
                        </div>
                        <div class="details-availability-stock mt-3 mb-3">
                            <span>Availability : </span>
                            <span class="details-stock"> In Stock</span>
                        </div>
                        <div class="details-product-specification mt-4 mb-4">
                            <table class="specification-table">
                                <tr>
                                    <td style="font-weight: bold">Gram</td>
                                </tr>
                                <tr>
                                    <td>{{ $product->product_gram }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="details-cart-social mb-3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="details-cart-price">
                                        @if ($product->discount_price == NULL)
                                            <span class="non-del">${{ $product->selling_price }}</span>
                                        @else
                                            <span class="non-del">${{ $product->discount_price }}</span>
                                            <span class="del"><del>${{ $product->selling_price }}</del></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="details-select-color mt-3">
                            <div class="row">

                                <div class="col-sm-4">
                                    @if ($product->product_color == null)

                                    @else
                                        <div class="form-group">
                                            <label style="color: #000;">Select Color</label>
                                            <select class="form-control" id="color">
                                                @foreach ($product_color as $color)
                                                    <option value="{{ $color }}">{{ ucwords($color) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label style="color: #000;">QTY</label>
                                        <div class="details-quantity-number">
                                            <span>
                                                <input type="number" class="form-control" id="qty" value="1" min="1">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="details-quantity-add-to-cart mt-3">
                            <div class="row">
                                <div class="col-sm-3 pr-0 mr-2">
                                    <div class="details-add-to-cart">
                                        <button type="submit" class="btn"style="background-color:#d7537b;color:#ffffff">Buy Now</button>
                                    </div>
                                </div>
                                <div class="col-sm-7 pl-0">
                                    <div class="details-add-to-cart">
                                        <input type="hidden" id="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn"style="background-color:#d7537b;color:#ffffff" onclick="addToCart()">Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="product-details-right-side">
                        <div class="single-product-details-right-side-content">
                            <div class="spdrsc-icon">
                                <i class="fa-solid fa-leaf"></i>
                            </div>
                            <div class="spdrsc-text">
                                <div class="spdrsc-product-name">
                                    <span>Free Delevery</span>
                                </div>
                                <div class="spdrsc-order-over">
                                    <span>For Order Over $50</span>
                                </div>
                                <div class="spdrsc-standard">
                                    <span>Standard : $50 / $100</span>
                                </div>
                            </div>
                        </div>
                        <div class="single-product-details-right-side-content mt-4">
                            <div class="spdrsc-icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                            </div>
                            <div class="spdrsc-text">
                                <div class="spdrsc-product-name">
                                    <span>3 Days Return</span>
                                </div>
                                <div class="spdrsc-order-over">
                                    <span>If Goods Have Problems</span>
                                </div>
                            </div>
                        </div>
                        <div class="single-product-details-right-side-content mt-4">
                            <div class="spdrsc-icon">
                                <i class="fa-solid fa-credit-card"></i>
                            </div>
                            <div class="spdrsc-text">
                                <div class="spdrsc-product-name">
                                    <span>Secure Payment</span>
                                </div>
                                <div class="spdrsc-order-over">
                                    <span>100% Secure Payment</span>
                                </div>
                            </div>
                        </div>
                        <div class="single-product-details-right-side-content mt-4">
                            <div class="spdrsc-icon">
                                <i class="fa-solid fa-car"></i>
                            </div>
                            <div class="spdrsc-text">
                                <div class="spdrsc-product-name">
                                    <span>9 AM - 11 PM Support</span>
                                </div>
                                <div class="spdrsc-order-over">
                                    <span>Dedicated Support</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==================== Product Details Area End ==================== -->

    <!-- ==================== Review Rating Area Start ==================== -->
    <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link review-comments-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">DESCRIPTION</a>
                    <a class="nav-link review-comments-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">REVIEW</a>
                    <a class="nav-link review-comments-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Comments</a>
                </div>
                </div>
                <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <p>{{ $product->short_description }}</p>
                    </div>

                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="h5">Zumon Hossain</div>
                        <div class="details-rating-review mt-3">
                            <span class="details-rating"><i class="fa-solid fa-star"></i></span>
                            <span class="details-rating"><i class="fa-solid fa-star"></i></span>
                            <span class="details-rating"><i class="fa-solid fa-star"></i></span>
                            <span class="details-rating"><i class="fa-solid fa-star"></i></span>
                            <span class="details-rating"><i class="fa-solid fa-star"></i></span>
                            <span class="calender-month"><i class="fa fa-calendar"></i> 6 month ago</span>
                        </div>
                        <div class="review-description">
                            <p>Nice Product</p>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <h5>Facebook Comments</h5>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==================== Review Rating  Area End ==================== -->

    <!-- ==================== Related Product Area Start ==================== -->
    <section class="mt-4 mb-5">
        <div class="best-sellers-arer">
            <!-- main heading start -->
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="all-heading">
                            <h3>Related Product</h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main heading end -->

            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="owl-carousel best-sellers-active">

                            @foreach($relatedProducts as $product)
                                <div class="single-best-sellers">
                                    <div class="best-seller-content">
                                        <div class="best-seller-image">
                                            <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">
                                                <img src="{{ asset($product->product_thambnail) }}" alt="">
                                            </a>
                                        </div>
                                        <div class="best-seller-text">
                                            <div class="best-seller-title">
                                                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">
                                                    <span>{{ $product->product_name }}</span>
                                                </a>
                                            </div>
                                            <div class="best-seller-kg">
                                                <span>{{ $product->product_gram }}</span>
                                            </div>
                                            <div class="best-seller-rating">
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span>(50)</span>
                                            </div>
                                            <div class="best-seller-price">
                                                @if ($product->discount_price == NULL)
                                                    <span class="price">${{ $product->selling_price }}</span>
                                                @else
                                                    <span class="price">${{ $product->discount_price }}</span>
                                                    <span class="price-before-discount">${{ $product->selling_price }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==================== Related Product Area Area End ==================== -->
@endsection
