<section class="mt-2">

    @php
        $banners = App\Models\ProBannerThree::where('ban_status',1)->orderBy('id','ASC')->get();
    @endphp

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="promotional-banner-two">
                    <div id="carouselExampleIndicatorsprpmotionalbannertwo" class="carousel slide" data-ride="carousel">

                        @foreach( $banners as $banner )
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                        @endforeach

                        <div class="carousel-inner">
                            @foreach( $banners as $banner )
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <a href="{{ $banner->ban_url }}">
                                        <img class="d-block w-100 promotional-slider-image-threes" src="{{asset('uploads/admin/banner/'.$banner->ban_image)}}" alt="Banner">
                                    </a>
                                    <div class="slider-content">

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicatorsprpmotionalbannertwo" role="button" data-slide="prev">
                        <span aria-hidden="true"><i class="fa-solid fa-chevron-left promotional-banner-two-icon"></i></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicatorsprpmotionalbannertwo" role="button" data-slide="next">
                        <span aria-hidden="true"><i class="fa-solid fa-chevron-right promotional-banner-two-icon"></i></span>
                        <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
