@extends('layouts.website')
@section('title')
    247beauty
@endsection
@section('content')
    <!-- ================= Banner Area Start ================ -->
    @include('website.includes.banner')
    <!-- ================= Banner Area End ================ -->

    <!-- ================= Promotional Banner Area Start ================ -->
    @include('website.includes.promotional_banner_two')
    <!-- ================= Promotional Banner Area End ================ -->

    <!-- ================= Top Brand Area Start ================ -->
    @include('website.includes.top_brand')
    <!-- ================= Top Brand Area End ================ -->

    <!-- ================= Promotional Banner Two Area Start ================ -->
    @include('website.includes.promotional_banner_three')
    <!-- ================= Promotional Banner Two Area End ================ -->

    <!-- ==================== Best Seller Area Start ==================== -->
    @include('website.includes.best_seller')
    <!-- ==================== Best Seller Area Area End ==================== -->

    <!-- ==================== Featured Brand Area Area End ==================== -->
    @include('website.includes.featured_brand')
    <!-- ==================== Featured Brand Area Area End ==================== -->

    <!-- ==================== Sponsor Logo Area Start ==================== -->
    @include('website.includes.sponsor')
    <!-- ==================== Sponsor Logo Area End ==================== -->
@endsection
