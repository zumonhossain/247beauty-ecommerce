@extends('layouts.website')
@section('title')
    Category Product
@endsection
@section('content')
    <!-- ==================== Product Store Page Area start ==================== -->
		<section class="mt-4">
            <div class="shop-page-area">
                <div class="container">
                    <div class="row">


                        <div class='col-md-3 sidebar mb-4'>
                            <div class="sidebar-module-container">
                                <div class="sidebar-widget">
                                    <div class="widget-header">
                                        <h4 class="widget-title">Category</h4>
                                    </div>
                                    <div class="sidebar-widget-body">
                                        <div class="accordion">

                                            @php
                                                $categories = App\Models\Category::where('category_status',1)->orderBy('category_name','ASC')->limit(6)->get();
                                            @endphp

                                            @foreach($categories as $category)
                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <a href="#collapseOne{{ $category->id }}" data-toggle="collapse"
                                                            class="accordion-toggle collapsed">
                                                            {{ $category->category_name }}
                                                        </a>
                                                    </div>
                                                    <div class="accordion-body collapse" id="collapseOne{{ $category->id }}" style="height: 0px;">
                                                        <div class="accordion-inner">
                                                            @php
                                                                $subcategories = App\Models\SubCategory::where('subcategory_status',1)->where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
                                                            @endphp

                                                            @foreach($subcategories as $subcategory)
                                                                <ul>
                                                                    <li>
                                                                        <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug) }}">
                                                                            <img style="border-radius: 5px" src="{{asset('uploads/admin/category/'.$subcategory->subcategory_image)}}" alt="Category Image" width="82" height="65">
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-9">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                <a class="nav-link shop-page-tab-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="icon fa fa-th-large"></i> Grid</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link shop-page-tab-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="icon fa fa-th-list"></i> List</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row mt-3">

                                        @forelse($products as $product)
                                            <div class="col-sm-3 mb-5">
                                                <div class="single-shop-product">
                                                    <div class="shop-offer-product">
                                                        @php
                                                            $amount = $product->selling_price - $product->discount_price;
                                                            $discount = ( $amount/$product->selling_price) * 100;
                                                        @endphp

                                                        @if ($product->discount_price == NULL)
                                                            <span> new </span>
                                                        @else
                                                            <span> {{ round($discount) }}% </span>
                                                        @endif
                                                    </div>
                                                    <div class="shop-image">
                                                        <img src="{{ asset($product->product_thambnail) }}" alt="">
                                                    </div>
                                                    <div class="shop-content text-center">
                                                        <div class="shop-name">
                                                            <a href="#">{{ $product->product_name }}</a>
                                                        </div>
                                                        <div class="product-rating">
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                        </div>
                                                        <div class="product-price">
                                                            @if ($product->discount_price == NULL)
                                                                <span class="best-seller-main-price">{{ $product->selling_price }} TK</span>
                                                            @else
                                                                <span class="best-seller-main-price">{{ $product->discount_price }} TK</span>
                                                                <span class="best-seller-discount-price">{{ $product->selling_price }} TK</span>
                                                            @endif
                                                        </div>
                                                        <div class="shop-cart-list mt-2">

                                                            <button class="category-cart-btn" type="button" title="Add Cart" data-toggle="modal" data-target="#cartModal"  id="{{ $product->id }}" onclick="productView(this.id)">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </button>

                                                            <button class="category-cart-btn" type="button" title="Add to WIshlist" id="{{ $product->id }}" onclick="addToWishlist(this.id)">
                                                                <i class="icon fa fa-heart"></i>
                                                            </button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-12">
                                                <div class="text-danger" style="font-size:25px;text-align:center;margin-bottom: 50px;font-weight: bold;">
                                                    No Product Found
                                                </div>
                                            </div>
                                        @endforelse

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row mt-3">

                                        @forelse($products as $product)
                                            <div class="col-sm-3 mb-4">
                                                <div class="single-shop-product">
                                                    <div class="shop-image">
                                                        <img src="{{ asset($product->product_thambnail) }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-9 mb-4">
                                                <div class="shop-content">
                                                    <div class="shop-name">
                                                        <a class="m-0" href="#">{{ $product->product_name }}</a>
                                                    </div>
                                                    <div class="product-rating">
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                    </div>
                                                    <div class="product-price">
                                                        @if ($product->discount_price == NULL)
                                                            <span class="best-seller-main-price">{{ $product->selling_price }} TK</span>
                                                        @else
                                                            <span class="best-seller-main-price">{{ $product->discount_price }} TK</span>
                                                            <span class="best-seller-discount-price">{{ $product->selling_price }} TK</span>
                                                        @endif
                                                    </div>
                                                    <div class="shop-list-description">
                                                        <p>{!! $product->short_description !!}</p>
                                                    </div>
                                                    <div class="shop-cart-list-two mt-2">
                                                        <button class="category-cart-btn" type="button" title="Add Cart" data-toggle="modal" data-target="#cartModal"  id="{{ $product->id }}" onclick="productView(this.id)">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>

                                                        <button class="category-cart-btn" type="button" title="Add to WIshlist" id="{{ $product->id }}" onclick="addToWishlist(this.id)">
                                                            <i class="icon fa fa-heart"></i>
                                                        </button>
                                                    </div>
                                                    <div class="shop-offer-product">

                                                        @php
                                                            $amount = $product->selling_price - $product->discount_price;
                                                            $discount = ( $amount/$product->selling_price) * 100;
                                                        @endphp

                                                        @if ($product->discount_price == NULL)
                                                            <span> new </span>
                                                        @else
                                                            <span> {{ round($discount) }}% </span>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-12">
                                                <div class="text-danger" style="font-size:25px;text-align:center;margin-bottom: 50px;font-weight: bold;">
                                                    No Product Found
                                                </div>
                                            </div>
                                        @endforelse

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <!-- ==================== Product Store Page Area start ==================== -->
@endsection
