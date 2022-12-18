<section>

    @php
        $brands = App\Models\Brand::where('brand_status',1)->where('top_brand',1)->orderBy('id','ASC')->limit('6')->get();
    @endphp

    <div class="top-brand-area pt-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="all-heading">
                        <h3>TOP BRANDS</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">

                @foreach( $brands as $brand )
                    <div class="col-xl-6 col-lg-6 mb-4">
                        <a href="{{ url('brand/product/'.$brand->id.'/'.$brand->brand_slug) }}">
                            <div class="top-brand-body-content" style="background-image: url('{{asset('uploads/admin/brand/'.$brand->brand_image)}}');">
                                <div class="top-brand-text">
                                    <div class="top-brand-text-discount">
                                        <span>{{ $brand->brand_discount_title }}</span>
                                    </div>
                                    <div class="top-brand-text-description">
                                        <span>{{ $brand->brand_name }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
</section>
