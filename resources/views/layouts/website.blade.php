<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> @yield('title') </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @php
            $basic = App\Models\Basic::where('basic_status',1)->firstOrFail();
            $social = App\Models\SocialMedia::where('sm_status',1)->firstOrFail();
            $contactInfo=App\Models\ContactInformation::where('ci_status',1)->firstOrFail();
            $notice=App\Models\TopNotic::where('notice_status',1)->firstOrFail();
        @endphp

        <link rel="manifest" href="site.webmanifest">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('uploads/basic/'.$basic->basic_favicon)}}">
        <!-- Place favicon.ico in the root directory -->

		<!-- all css here -->
        <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/fontawesome.all.css">
        <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/magnific-popup.css">
        <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/meanmenu.css">
        <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/nice-select.css">
        <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/slick.css">
        <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/responsive.css">
        <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/others-page.css">
        <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/default.css">
        <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/style.css">


        <script src="https://js.stripe.com/v3/"></script>


    </head>
    <body>
		<!-- ================= Header Area Start ================ -->
		<header>
			<div class="header-area">
				<!-- ================= Header Top Start ================ -->
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                <div class="header-top-left">
                                    <div class="left-message">
                                        <a href="#">{{ $notice->notice_name }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="header-top-right">
                                    <ul>
                                        <li>
                                            <a href="#" title="Store & Events">
                                                <span class="header-top-right-icon"><i class="fa-solid fa-location-dot"></i></span>
                                                <span class="header-top-right-text">Store & Events</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Help Us">
                                                <span class="header-top-right-icon"><i class="fa-regular fa-circle-question"></i></span>
                                                <span class="header-top-right-text">Help</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ================= Header Top End ================ -->

				<!-- ================= Header Middle Start ================ -->
                <div class="header-middle">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                                <div class="header-middle-logo">
                                    <a href="{{ url('/') }}"><img src="{{asset('uploads/basic/'.$basic->basic_logo)}}" alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-1 col-sm-12 d-flex align-items-center">
                                <div class="header-middle-category-menu">

                                    <div class="header-middle-main-menu d-none d-lg-block">
										<nav>
											<ul>
												<li><a href="#">Categories</a></li>
												<li class="header-middle-static"><a href="#">Brand</a>
													<div class="header-middle-mega-menu header-middle-mega-full">
														<ul>
															<li class="header-middle-mega-title"><a href="#">Popular</a></li>
															<li><a href="#"><img src="{{ asset('contents/website') }}/assets/images/popular/1.webp" alt="" width="100%"></a></li>
															<li><a href="#"><img src="{{ asset('contents/website') }}/assets/images/popular/2.webp" alt="" width="100%"></a></li>
															<li><a href="#"><img src="{{ asset('contents/website') }}/assets/images/popular/3.webp" alt="" width="100%"></a></li>
														</ul>
														<ul>
															<li class="header-middle-mega-title"><a href="#">Luxe</a></li>
															<li><a href="#"><img src="{{ asset('contents/website') }}/assets/images/popular/6.webp" alt="" width="100%"></a></li>
															<li><a href="#"><img src="{{ asset('contents/website') }}/assets/images/popular/7.webp" alt="" width="100%"></a></li>
															<li><a href="#"><img src="{{ asset('contents/website') }}/assets/images/popular/8.webp" alt="" width="100%"></a></li>
														</ul>
														<ul>
															<li class="header-middle-mega-title"><a href="#">Only At Nykaa</a></li>
															<li><a href="#"><img src="{{ asset('contents/website') }}/assets/images/popular/3.webp" alt="" width="100%"></a></li>
															<li><a href="#"><img src="{{ asset('contents/website') }}/assets/images/popular/4.webp" alt="" width="100%"></a></li>
															<li><a href="#"><img src="{{ asset('contents/website') }}/assets/images/popular/5.webp" alt="" width="100%"></a></li>
														</ul>
														<ul>
															<li class="header-middle-mega-title"><a href="#">New Launches</a></li>
															<li><a href="#"><img src="{{ asset('contents/website') }}/assets/images/popular/8.webp" alt="" width="100%"></a></li>
															<li><a href="#"><img src="{{ asset('contents/website') }}/assets/images/popular/1.webp" alt="" width="100%"></a></li>
															<li><a href="#"><img src="{{ asset('contents/website') }}/assets/images/popular/2.webp" alt="" width="100%"></a></li>
														</ul>
													</div>
												</li>
											</ul>
										</nav>
									</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 d-flex align-items-center">
                                <div class="header-middle-search">
									<form action="">
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></div>
											</div>
											<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search on 247beauty">
										</div>
									</form>
                                </div>
                            </div>


                            <div class="col-sm-8 col-8 d-md-none">
                                <!-- main-menu-mobile-device start -->
                                <div class="main-menu-mobile-device">
                                    <nav id="main-menu-mobile-device">
                                        <ul>
                                            @php
                                                $categories = App\Models\Category::where('category_status',1)->orderBy('category_name','ASC')->limit(6)->get();
                                            @endphp

                                            @foreach($categories as $category)
                                                <li><a href="#" style="color: #000000;font-weight:bold">{{ $category->category_name }}</a></li>
                                                @php
                                                    $subcategories = App\Models\SubCategory::where('subcategory_status',1)->where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
                                                @endphp

                                                @foreach($subcategories as $subcategory)
                                                <li><a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug) }}">{{ $subcategory->subcategory_name }}</a>
                                                    <ul class="submenu">
                                                        @php
                                                            $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->where('subsubcategory_status',1)->orderBy('subsubcategory_name','ASC')->get();
                                                        @endphp

                                                        @foreach($subsubcategories as $subsucategory)
                                                            <li><a href="{{ url('sub/subcategory/product/'.$subsucategory->id.'/'.$subsucategory->subsubcategory_slug) }}">{{ $subsucategory->subsubcategory_name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </nav>
                                </div>
                                <!-- main-menu-mobile-device end -->
                            </div>




                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4 d-flex align-items-center">
                                <div class="header-middle-account-cart">

                                    <nav class="navbar navbar-expand m-0 p-0">
                                        <div class="collapse navbar-collapse">
                                          <ul class="navbar-nav">
                                            <li class="nav-item">
                                                @auth
                                                    <a href="{{ route('user.dashboard') }}">
                                                        <span class="header-middle-account-icon-account"><i class="fa-regular fa-user"></i></span>
                                                        <span class="header-middle-account-text">Profile</span>
                                                    </a>
                                                    <form id="logout-form" method="POST" action="{{ url('logout') }}">
                                                        @csrf
                                                    </form>
                                                @else
                                                    <a href="{{ url('login') }}">
                                                        <span class="header-middle-account-icon-account"><i class="fa-regular fa-user"></i></span>
                                                        <span class="header-middle-account-text">Account</span>
                                                    </a>
                                                @endauth
                                                <form id="logout-form" method="POST" action="{{ url('logout') }}">
                                                    @csrf
                                                </form>
                                            </li>
                                            <li class="nav-item dropdown">
                                              <a style="margin: 0px;padding:0px" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                                <div class="header-middle-account-icon-shoping">
                                                    <i class="fa-sharp fa-solid fa-bag-shopping "></i>
                                                </div>
                                              </a>
                                              <div class="dropdown-menu">
                                                    <div class="custom-cart">



                                                            <!-- mini cart start with ajax -->
                                                                <div id="miniCart">

                                                                </div>
                                                            <!-- mini cart end -->



                                                            <div class="clearfix"></div>
								                            <hr>

                                                            <div class="clearfix cart-total">
                                                                <div class="text-center mb-3">
                                                                    <span style="color: #d7537b;font-weight:500">Sub Total: TK</span>
                                                                    <span style="color: #d7537b;font-weight:500" id="cartSubTotal"></span>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <a href="{{ route('checkout') }}" class="btn btn-upper btn-block m-t-20" style="background-color: #d7537b;color:#ffffff">Checkout</a>
                                                            </div>
                                                    </div>
                                              </div>
                                            </li>
                                          </ul>
                                        </div>
                                    </nav>



                                </div>
                            </div>



                        </div>
                    </div>
                </div>
                <!-- ================= Header Middle End ================ -->

				<!-- ================= Header Bottom Start ================ -->

                <!-- header-bottom start -->
                <div class="header-bottom d-none d-md-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12"><!-- main menu start -->
                                <div class="main-menu">
                                    <nav>
                                        <ul>
                                            @php
                                                $categories = App\Models\Category::where('category_status',1)->orderBy('category_name','ASC')->limit(6)->get();
                                            @endphp

                                            @foreach($categories as $category)
                                                <li class="static"><a href="#">{{ $category->category_name }}</a>
                                                    <div class="mega-menu">
                                                        @php
                                                            $subcategories = App\Models\SubCategory::where('subcategory_status',1)->where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
                                                        @endphp

                                                        @foreach($subcategories as $subcategory)
                                                            <ul>
                                                                <li class="mega-title"><a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug) }}">{{ $subcategory->subcategory_name }}</a></li>
                                                                @php
                                                                    $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->where('subsubcategory_status',1)->orderBy('subsubcategory_name','ASC')->get();
                                                                @endphp

                                                                @foreach($subsubcategories as $subsucategory)
                                                                <li><a href="{{ url('sub/subcategory/product/'.$subsucategory->id.'/'.$subsucategory->subsubcategory_slug) }}">{{ $subsucategory->subsubcategory_name }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        @endforeach
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header-bottom end -->





				<!-- ================= Header Bottom End ================ -->
			</div>
		</header>
		<!-- ================= Header Area End ================ -->

        <!-- ================= Category Picture Area Start ================ -->
        <section class="d-md-none category-style">
            <div class="category-movile-view-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="owl-carousel category-movile-view-active">

                                @php
                                    $categories = App\Models\Category::where('category_status',1)->orderBy('category_name','ASC')->limit(6)->get();
                                @endphp

                                @foreach($categories as $category)
                                    <div class="single-category-movile-view">
                                        <div class="category-seller-content">
                                            <a href="{{ url('category/product/'.$category->id.'/'.$category->category_slug) }}">
                                                <img style="border-radius: 5px" src="{{asset('uploads/admin/category/'.$category->category_image)}}" alt="Category Image" height="40px">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================= Category Picture Area End ================ -->


        @yield('content')

		<!-- ==================== Footer Area Start ==================== -->
		<footer class="footer-area footer-bg">

			<!-- footer top start -->
			<section class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-12">
							<div class="footer-list-item">
								<div class="footer-title">
									<h3>Contact us</h3>
								</div>
								<div class="footer-list">
									<ul>
										<li><span class="list-icon"><i class="fas fa-map-marker-alt"></i></span>{{ $contactInfo->ci_add1 }}</li>
										<li><a href="#"><span class="list-icon"><i class="fas fa-phone-volume"></i></span>{{ $contactInfo->ci_phone1 }} / {{ $contactInfo->ci_phone2 }}</a></li>
										<li><a href="#"><span class="list-icon"><i class="far fa-envelope"></i></span>{{ $contactInfo->ci_email1 }}</a></li>
										<li><span class="list-icon"><i class="fas fa-crosshairs"></i></span>7 Days a week from 10-00 am to 6-00 pm</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-6">
									<div class="footer-list-item">
										<div class="footer-title">
											<h3>Information</h3>
										</div>
										<div class="footer-list">
											<ul>
												<li><a href="#">About Us</a></li>
												<li><a href="#">FAQ</a></li>
												<li><a href="#">Warranty And Services</a></li>
												<li><a href="#">Support 24/7 page</a></li>
												<li><a href="#">Blog</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-6">
									<div class="footer-list-item">
										<div class="footer-title">
											<h3>Product Support</h3>
										</div>
										<div class="footer-list">
											<ul>
												<li><a href="#">Brands</a></li>
												<li><a href="#">Gift Certificates</a></li>
												<li><a href="#">Affiliates</a></li>
												<li><a href="#">Specials</a></li>
												<li><a href="#">FAQs</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 d-none d-lg-block">
									<div class="footer-list-item">
										<div class="footer-title">
											<h3>Services</h3>
										</div>
										<div class="footer-list">
											<ul>
												<li><a href="#">Contact Us</a></li>
												<li><a href="#">Returns</a></li>
												<li><a href="#">Support</a></li>
												<li><a href="#">Site Map</a></li>
												<li><a href="#">Customer Service</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- footer top end -->

			<!-- footer middle start -->
			<section class="footer-middle d-flex align-items-center">
				<div class="footer-middle-overlay"></div>
				<div class="container">
					<div class="row">
						<div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12">
							<div class="follow">
								<div class="footer-social-title d-none d-xl-block">
									<h3>Follow us by</h3>
								</div>
								<div class="footer-social">
									<ul>
										<li><a href="{{ $social->sm_facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="{{ $social->sm_twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
										<li><a href="{{ $social->sm_google }}" target="_blank"><i class="fab fa-google"></i></a></li>
										<li><a href="{{ $social->sm_pInterest }}" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
										<li><a href="{{ $social->sm_instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
										<li><a href="{{ $social->sm_youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 col-12 d-none d-md-block">
							<div class="newsletter">
								<div class="footer-social-title d-none d-xl-block">
									<h3>Sign Up for Newsletter</h3>
								</div>
								<form>
									<div class="footer-subscribe">
										<input type="text" placeholder="Your email address...">
										<a href="#">Subscribe</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- footer middle end -->

			<!-- footer bottom start -->
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="footer-copy">
								<p>247beauty © 2022 Developed by Projonmo Digital Limited</p>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="payment-cart">
								<ul>
									<li><a href="#"><img src="{{ asset('contents/website') }}/assets/images/payment/1.webp" alt=""></a></li>
									<li><a href="#"><img src="{{ asset('contents/website') }}/assets/images/payment/2.jpeg" alt=""></a></li>
									<li><a href="#"><img src="{{ asset('contents/website') }}/assets/images/payment/3.jpeg" alt=""></a></li>
									<li><a href="#"><img src="{{ asset('contents/website') }}/assets/images/payment/5.jpeg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- footer bottom end -->
		</footer>
		<!-- ==================== Footer Area End ==================== -->




        <!-- ================== Cart Modal Start ==================== -->
		<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><span id="pname"></span></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-4">
								<div class="card">
									<img src="" class="card-img-top" id="pimage" alt="" style="height: 200px;">
								</div>
							</div>
							<div class="col-md-5">
								<ul class="list-group">
									<li class="list-group-item">
                                        Price: <strong class="text-danger">TK<span id="pprice"></span></strong>
									    <del id="oldprice">TK</del>
									</li>
									<li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
									<li class="list-group-item">Category: <strong id="pcategory"></strong></li>
									<li class="list-group-item">Brand: <strong id="pbrand"></strong> </li>

									<li class="list-group-item">Stock:
                                        <span class="badge badge-pill badge-success" id="aviable" style="background:green; color:white;"></span>
										<span class="badge badge-pill badge-danger" id="stockout" style="background:red; color:white;"></span>
									</li>
								</ul>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="color">Select Color</label>
									<select class="form-control" id="color" name="color">

									</select>
								</div>
								<div class="form-group">
									<label for="qty">Quantity</label>
									<input type="number" class="form-control" id="qty" value="1" min="1">
								</div>
								<input type="hidden" id="product_id">
								<button type="submit" class="btn btn-danger" onclick="addToCart()">Add To Cart</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ================== Cart Modal End ==================== -->






		<!-- all js here -->
        <script src="{{ asset('contents/website') }}/assets/js/vendor/jquery-3.2.1.min.js"></script>
        <script src="{{ asset('contents/website') }}/assets/js/popper.min.js"></script>
        <script src="{{ asset('contents/website') }}/assets/js/bootstrap.min.js"></script>
        <script src="{{ asset('contents/website') }}/assets/js/owl.carousel.min.js"></script>
        <script src="{{ asset('contents/website') }}/assets/js/isotope.pkgd.min.js"></script>
        <script src="{{ asset('contents/website') }}/assets/js/one-page-nav-min.js"></script>
        <script src="{{ asset('contents/website') }}/assets/js/slick.min.js"></script>
        <script src="{{ asset('contents/website') }}/assets/js/jquery.meanmenu.min.js"></script>
        <script src="{{ asset('contents/website') }}/assets/js/ajax-form.js"></script>
        <script src="{{ asset('contents/website') }}/assets/js/wow.min.js"></script>
        <script src="{{ asset('contents/website') }}/assets/js/nice-select.js"></script>
        <script src="{{ asset('contents/website') }}/assets/js/jquery.scrollUp.min.js"></script>
        <script src="{{ asset('contents/website') }}/assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="{{ asset('contents/website') }}/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="{{ asset('contents/website') }}/assets/js/plugins.js"></script>
        <script src="{{ asset('contents/website') }}/assets/js/main.js"></script>


        <script type="text/javascript" src="{{ asset('contents/common') }}/jquery.form-validator.min.js"></script>
		<script>
			$.validate({
				lang: 'en'
			});

		</script>




        <script src="{{ asset('contents/website') }}/assets/js/sweetalert2@8.js"></script>

        <script type="text/javascript">
			$.ajaxSetup({
				headers:{
					'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
				}
			});



            //start product view with modal
			function productView(id){
				$.ajax({
					type:'GET',
					url: '/product/view/modal/'+id,
					dataType:'json',
					success:function(data){
                        $('#pname').text(data.product.product_name);
						$('#pprice').text(data.product.selling_price);
						$('#pcode').text(data.product.product_code);
						$('#pcategory').text(data.product.category.category_name);
						$('#pbrand').text(data.product.brand.brand_name);
						$('#pimage').attr('src','/'+data.product.product_thambnail);


                        // product id
						$('#product_id').val(id);
						// Quentity
						$('#qty').val(1);


                        //product price
						if (data.product.discount_price == null) {
							$('#pprice').text('');
							$('#oldprice').text('');
							$('#pprice').text(data.product.selling_price);
						}else{
							$('#pprice').text(data.product.discount_price);
							$('#oldprice').text(data.product.selling_price);
						}


                        //stock
						if (data.product.product_qty > 0) {
							$('#aviable').text('');
							$('#stockout').text('');
							$('#aviable').text('aviable');
						}else{
							$('#aviable').text('');
							$('#stockout').text('');
							$('#stockout').text('stockout');
						}


                        //color
						$('select[name="color"]').empty();
						$.each(data.color,function(key,value){
							$('select[name="color"]').append('<option value="'+value+'">'+value+'</option>')
						})

					}
				})
			}
            productView();
			//end product view with modal



			//Start add to cart product
			function addToCart(){
				var id = $('#product_id').val();
				var quantity = $('#qty').val();
				var color = $('#color option:selected').text();
				var product_name = $('#pname').text();

				$.ajax({
					type: "POST",
					dataType: 'json',
					data:{
						color:color, quantity:quantity, product_name:product_name
					},
					url: "/cart/data/store/"+id,
					success:function(data){

                        miniCart();

                        $('#closeModal').click();


                        //  start message
						const Toast = Swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						})
						if($.isEmptyObject(data.error)){
								Toast.fire({
								type: 'success',
								title: data.success
								})
						}else{
							Toast.fire({
								type: 'error',
								title: data.error
							})
						}
						//  end message

					}
				})
			}
			//End add to cart product



		</script>



		<!-- =============== Mini Cart Start ==================== -->
		<script>
			/// mini cart product add start
			function miniCart(){
				$.ajax({
					type:'GET',
					url: '/product/mini/cart',
					dataType:'json',
					success:function(response){

                        $('span[id="cartSubTotal"]').text(response.cartTotal);
						$('#cartQty').text(response.cartQty);

                        var miniCart = ""


                        $.each(response.carts, function(key,value){
							miniCart += `

                                <div class="single-cart-product-summary">
                                    <div class="container">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-sm-4 pl-0">
                                                <div class="image">
                                                    <a href="detail.html"><img src="/${value.options.image}" alt="" width="50" height="50"></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 pl-0 pr-0">
                                                <h3 class="w-cart-name"><a href="index8a95.html?page-detail">${value.name}</a></h3>
                                                <div class="price">TK${value.price} * ${value.qty}</div>
                                            </div>
                                            <div class="col-sm-2 pr-0">
                                                <button class="cart-trash-icon" style="border:none;background:none;cursor:pointer" type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

							`

						});

                        $('#miniCart').html(miniCart);

					}
				})
			}
			miniCart();
			/// mini cart product add end


            /// mini cart remove start
			function miniCartRemove(rowId){
				$.ajax({
					type:'GET',
					url: '/minicart/product-remove/'+rowId,
					dataType:'json',
					success:function(data){

						miniCart();

						//  start sweet alert message
						const Toast = Swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						})
						if($.isEmptyObject(data.error)){
							Toast.fire({
								type: 'success',
								title: data.success
							})
						}else{
							Toast.fire({
								type: 'error',
								title: data.error
							})
						}
						//  end sweet alert message

					}
				})
			}
			// mini cart remove end


		</script>
		<!-- =============== Mini Cart End ==================== -->


        <!-- =============== Wishlist Page Start ==================== -->
		<script>
			// wishlist product add start
			function addToWishlist(product_id){
				$.ajax({
					type: "POST",
					dataType: 'json',
					url: "{{ url('/add-to-wishlist/') }}/"+product_id,
					success:function(data){

						//  start sweet alert message
						const Toast = Swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						})
						if($.isEmptyObject(data.error)){
							Toast.fire({
								type: 'success',
								title: data.success
							})
						}else{
							Toast.fire({
								type: 'error',
								title: data.error
							})
						}
						//  end sweet alert message
					}
				})
			}
			// wishlist product add end


            // wishlist page product show start
			function wishlist(){
				$.ajax({
					type:'GET',
					url: "{{ url('/user/get-wishlist-product') }}",
					dataType:'json',
					success:function(response){

						var rows = ""

						$.each(response, function(key,value){
							rows += `
                                <tr>
                                    <td class="col-md-2"><img class="wishlist-image" src="/${value.product.product_thambnail}" alt="imga"></td>
                                    <td class="col-md-7">
                                        <div class="wishlist-product-name"><a href="#">${value.product.product_name}</a></div>
                                        <div class="wishlist-product-price">
                                            ${value.product.discount_price == null
											? `${value.product.selling_price} TK `
											:
											`<span>${value.product.discount_price} TK </span> <span class="best-seller-discount-price">${value.product.selling_price} TK </span>`
                                            }
                                        </div>
                                    </td>
                                    <td class="col-md-2">
                                        <button class="wishlist-product-btn" type="button" title="Add Cart" data-toggle="modal" data-target="#cartModal" id="${value.product_id}" onclick="productView(this.id)">Add to cart</button>
                                    </td>
                                    <td class="col-md-1 close-btn">
                                        <button type="submit" class="wishlist-product-close-icon" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>

							`
						});

						$('#wishlist').html(rows);
					}
				})
			}
			wishlist();
			// wishlist page product show end

            // wishlist product remove start
			function wishlistRemove(id){
				$.ajax({
					type:'GET',
					url: "{{ url('/user/wishlist-remove/') }}/"+id,
					dataType:'json',
					success:function(data){

						wishlist();

						//  start message
						const Toast = Swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						})
						if($.isEmptyObject(data.error)){
							Toast.fire({
								type: 'success',
								title: data.success
							})
						}else{
							Toast.fire({
								type: 'error',
								title: data.error
							})
						}
						//  end message
					}
				});
			}
			// wishlist product remove end


		</script>
		<!-- =============== Wishlist Page End ==================== -->


        <!-- ================= Cart Page Start ====================== -->
		<script>

			// get cart product show start
			function cart(){
				$.ajax({
					type:'GET',
					url: "{{ url('/get-cart-product') }}",
					dataType:'json',
					success:function(response){

                        var rows = ""

                        $.each(response.carts, function(key,value){
                            rows += `


                                    <tr>
                                        <td class="col-md-2"><img src="/${value.options.image}" alt="imga" style="height:60px; width:60px;"></td>
                                        <td class="col-md-2">
                                            <div class="product-name"><span>${value.name}</span></div>
                                        </td>
                                        <td class="col-md-2">
                                            <span>${value.price} TK</span>
                                        </td>
                                        <td class="col-md-2">
                                            <span>${value.options.color}</span>
                                        </td>
                                        <td class="col-md-2">


                                            ${value.qty > 1

                                            ?
                                                ` <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)">-</button>`
                                            :
                                                ` <button type="submit" class="btn btn-success btn-sm" disabled>-</button>`
                                            }


                                            <input type="text" value="${value.qty}" min="1" max="100" disabled style="width:25px;">
                                            <button type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)" class="btn btn-sm" style="background-color: #d7537b;color: #ffffff;">+</button>


                                        </td>
                                        <td class="col-md-1">
                                            <span>${value.subtotal} TK</span>
                                        </td>
                                        <td class="col-md-1">
                                            <button type="submit" class="cart-close-btn" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>


                            `
                        });

                        $('#cartPage').html(rows);

					}
				})
			}
			cart();
			// get cart product show end

			// cart remove start
			function cartRemove(id){
				$.ajax({
					type:'GET',
					url: "{{ url('/cart-remove/') }}/"+id,
					dataType:'json',
					success:function(data){

						cart();
						miniCart();
						couponCalculation();

						$('#coupon_name').val('');
						$('#couponField').show();

						//  start sweet alert message
						const Toast = Swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						})
						if($.isEmptyObject(data.error)){
							Toast.fire({
								type: 'success',
								title: data.success
							})
						}else{
							Toast.fire({
								type: 'error',
								title: data.error
							})
						}
						//  end sweet alert message

					}
				});
			}
			// cart remove end

			// cart increment start
			function cartIncrement(rowId) {
				$.ajax({
					type: 'GET',
					url: "{{ url('/cart-increment/') }}/" + rowId,
					dataType: 'json',
					success: function(data) {
						couponCalculation();
						cart();
						miniCart();
					}
				});
			}
			// cart increment end

			// cart deccrement start
			function cartDecrement(rowId) {
				$.ajax({
					type: 'GET',
					url: "{{ url('/cart-decrement/') }}/" + rowId,
					dataType: 'json',
					success: function(data) {
						couponCalculation();
						cart();
						miniCart();
					}
				});
			}
			// cart deccrement end

		</script>
		<!-- ================= Cart Page End ====================== -->


        <!-- ===================== Coupon Page Start =============== -->
		<script>

			// Coupon apply Start
			function applyCoupon(){
				var coupon_name = $('#coupon_name').val();
				$.ajax({
					type:'POST',
					dataType:'json',
					data: { coupon_name:coupon_name},
					url: "{{ url('/coupon-apply') }}",
					success:function(data){
						couponCalculation();

						// $('#couponField').css("display","none");
						// $('#couponField').hide();

						if (data.validity == true) {
							$('#couponField').hide();
						}

						//  start sweet alert message
						const Toast = Swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						})
						if($.isEmptyObject(data.error)){
							Toast.fire({
								type: 'success',
								title: data.success
							})
						}else{
							$('#coupon_name').val('');
							Toast.fire({
								type: 'error',
								title: data.error
							})
						}
						//  end sweet alert message
					}
				});
			}
			// Coupon apply end

			//coupon calculation start
			function couponCalculation(){
				$.ajax({
					type:'GET',
					url: "{{ url('/coupon-calculation') }}",
					dataType:'json',
					success:function(data){
						if (data.total) {
							$('#couponCalField').html(`

                                <tr>
                                    <th>
                                        <div class="cart-sub-total text-right">
                                            Subtotal = <span class="inner-left-md">${data.total} TK</span>
                                        </div>
                                        <div class="cart-grand-total text-right">
                                            Grand Total = <span class="inner-left-md">${data.total} TK</span>
                                        </div>
                                    </th>
                                </tr>

							`)
						}else{
							$('#couponCalField').html(`

								<tr>
									<th>
										<div class="cart-sub-total text-right">
											Subtotal = <span class="inner-left-md">${data.subtotal} TK</span>
										</div>
										<div class="cart-sub-total text-right">
											Coupon = <span class="inner-left-md">${data.coupon_name} </span>
											<button class="cupon-close-button" type="submit" onclick="couponRemove()"><i class="fa fa-times"></i></button>
										</div>
										<div class="cart-sub-total text-right">
											Discount Amount = <span class="inner-left-md">${data.discount_amount} TK</span>
										</div>
										<div class="cart-grand-total text-right">
											Grand Total = <span class="inner-left-md">${data.total_amount} TK</span>
										</div>
									</th>
								</tr>
							`)
						}
					}
				});
			}
			couponCalculation();
			//coupon calculation end

			//remove coupon start
			function couponRemove(){
				$.ajax({
					type:'GET',
					url: "{{ url('/coupon-remove') }}",
					dataType:'json',
					success:function(data){

						$('#couponField').show();
						// $('#couponField').css("display","");

						$('#coupon_name').val('');
						//  start message

						couponCalculation();

						//  start sweet alert message
						const Toast = Swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						})
						if($.isEmptyObject(data.error)){
							Toast.fire({
							type: 'success',
							title: data.success
							})
						}else{
							Toast.fire({
								type: 'error',
								title: data.error
							})
						}
						//  end sweet alert message
					}
				});
			}
			//remove coupon end

		</script>
		<!-- ===================== Coupon Page End =============== -->

    </body>
</html>
