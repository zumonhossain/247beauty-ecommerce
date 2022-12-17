<section class="mt-4 mb-4">

    @php
        $sponsors = App\Models\Sponsor::where('ban_status',1)->orderBy('id','ASC')->get();
    @endphp

    <div class="sponsor-logo-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="owl-carousel sponsor-logo-active">
                        @foreach( $sponsors as $sponsor )
                            <div class="single-sponsor-logo">
                                <a href="#">
                                    <img src="{{asset('uploads/admin/sponsor/'.$sponsor->ban_image)}}" alt="Sponsor" height="80">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
