<section>
    @php
        $banners = App\Models\Banner::where('ban_status',1)->orderBy('id','ASC')->get();
    @endphp

    <div class="banner-area">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach( $banners as $banner )
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach( $banners as $banner )
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <a href="{{ $banner->ban_url }}">
                            <img class="d-block w-100 slider-image" src="{{asset('uploads/admin/banner/'.$banner->ban_image)}}" alt="Banner" height="350">
                        </a>
                        <div class="slider-content">

                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span aria-hidden="true"><i class="fa-solid fa-chevron-left banner-icon"></i></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span aria-hidden="true"><i class="fa-solid fa-chevron-right banner-icon"></i></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>
