<section class="mt-4">
    <div class="best-sellers-arer">
        <!-- main heading start -->
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="all-heading">
                        <h3>Best Seller</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- main heading end -->

        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="owl-carousel best-sellers-active">

                        @foreach($best_sellers as $product)
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
                                                <span class="best-seller-main-price">{{ $product->selling_price }} TK</span>
                                            @else
                                                <span class="best-seller-main-price">{{ $product->discount_price }} TK</span>
                                                <span class="best-seller-discount-price">{{ $product->selling_price }} TK</span>
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
