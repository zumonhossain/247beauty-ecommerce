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
                    <div class="col-xl-4 col-lg-4 mb-4">
                        <a class="top-brand-link" href="{{ url('brand/product/'.$brand->id.'/'.$brand->brand_slug) }}">
                            <div class="top-brand-content-body">
                                <div class="top-brand-image">
                                    <img src="{{asset('uploads/admin/brand/'.$brand->brand_image)}}" alt="">
                                </div>
                                <div class="top-brand-content">
                                    <span class="top-brand-title">{{ $brand->brand_discount_title }}</span>
                                    <span class="top-brand-description">{{ $brand->brand_name }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
</section>
