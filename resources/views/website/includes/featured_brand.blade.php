<section class="mt-4">

    @php
        $brands = App\Models\Brand::where('brand_status',1)->where('featuren_brand',1)->orderBy('id','ASC')->limit('8')->get();
    @endphp

    <div class="featured-brand-area">
        <!-- main heading start -->
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="all-heading">
                        <h3>FEATURED BRANDS</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- main heading end -->
        <div class="container">
            <div class="row">

                @foreach( $brands as $brand )
                    <div class="col-xl-3 mb-4">
                        <div class="single-featured-brands">
                            <a href="{{ url('brand/product/'.$brand->id.'/'.$brand->brand_slug) }}">
                                <div class="single-featured-brands-image">
                                    <a href="{{ url('brand/product/'.$brand->id.'/'.$brand->brand_slug) }}">
                                        <img src="{{asset('uploads/admin/brand/'.$brand->brand_image)}}" alt="fetured brand">
                                    </a>
                                </div>
                                <div class="single-featured-brands-text">
                                    <div class="single-featured-brands-text-discount">
                                        <span>{{ $brand->brand_discount_title }}</span>
                                    </div>
                                    <div class="single-featured-brands-text-description">
                                        <span>{{ $brand->brand_name }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
