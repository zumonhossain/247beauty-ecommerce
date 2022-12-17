<section class="mt-4">

    @php
        $banners = App\Models\ProBannerTwo::where('ban_status',1)->orderBy('id','ASC')->get();
    @endphp

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="promotional-banner">
                    <div id="carouselExampleIndicatorsprpmotionalbanner" class="carousel slide" data-ride="carousel">

                        @foreach( $banners as $banner )
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                        @endforeach

                        <div class="carousel-inner">
                            @foreach( $banners as $banner )
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <a href="{{ $banner->ban_url }}">
                                        <img class="d-block w-100 slider-image" src="{{asset('uploads/admin/banner/'.$banner->ban_image)}}" alt="Banner" height="200">
                                    </a>
                                    <div class="slider-content">

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicatorsprpmotionalbanner" role="button" data-slide="prev">
                        <span aria-hidden="true"><i class="fa-solid fa-chevron-left promotional-banner-icon"></i></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicatorsprpmotionalbanner" role="button" data-slide="next">
                        <span aria-hidden="true"><i class="fa-solid fa-chevron-right promotional-banner-icon"></i></span>
                        <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
