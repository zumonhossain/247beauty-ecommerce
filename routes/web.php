<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\CustomPaymentSubmitController;
use App\Http\Controllers\User\ProductReviewController;
use App\Http\Controllers\User\ChatController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GeneralController;
use App\Http\Controllers\Admin\TopNoticController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProBannerTwoController;
use App\Http\Controllers\Admin\ProBannerThreeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubSubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShippingAreaController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\CustomerReviewController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\SubadminController;
use App\Http\Controllers\Website\WebsiteController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\TrackingController;
use App\Http\Controllers\Website\SearchController;
use App\Http\Controllers\Website\ShopController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ================= Admin Routes ======================
Route::group(['prefix'=>'admin','middleware'=>['admin','auth','permission']], function(){
    route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');

    // Notice
    Route::get('dashboard/notice', [TopNoticController::class, 'notice'])->name('notice');
    Route::post('dashboard/notice/update', [TopNoticController::class, 'update_notice'])->name('update_notice');
    // Basic
    Route::get('dashboard/general/basic', [GeneralController::class, 'basic'])->name('basic');
    Route::post('dashboard/general/basic/update', [GeneralController::class, 'update_basic'])->name('update_basic');
    // Social Media
    Route::get('dashboard/general/social', [GeneralController::class, 'social'])->name('social');
    Route::post('dashboard/general/social/update', [GeneralController::class, 'update_social'])->name('update_social');
    // Contact Information
    Route::get('dashboard/general/contactinformation', [GeneralController::class, 'contactinformation'])->name('contactinformation');
    Route::post('dashboard/general/contactinformation/update', [GeneralController::class, 'update_contactinformation'])->name('update_contactinformation');

    //My Profile routes
    route::get('my/profile',[AdminController::class,'profile'])->name('my.profile');
    Route::post('my/profile/update',[AdminController::class,'profileUpdate'])->name('profile.update');
    Route::get('my/profile/image/change',[AdminController::class,'ProfileImagePage'])->name('profile.image');
    Route::post('my/profile/image/update',[AdminController::class,'imageUpdate'])->name('image.update');
    Route::get('my/profile/password/change',[AdminController::class,'ProfilePasswordPage'])->name('profile.passwordPage');
    Route::post('my/profile/password/update',[AdminController::class,'ProfilePasswordUpdate'])->name('profile.PasswordUpdate');

    // All Users
    route::get('all-users',[AdminController::class,'allUsers'])->name('all-users');
    Route::get('user-banned/{user_id}',[AdminController::class,'banned'])->name('banned');
    Route::get('user-unbanned/{user_id}',[AdminController::class,'unBanned'])->name('unBanned');

    //Sponsor routes
    route::get('sponsor',[SponsorController::class,'index'])->name('sponsor');
    route::post('sponsor/submit',[SponsorController::class,'insert'])->name('sponsor.insert');
    route::get('sponsor/view/{slug}',[SponsorController::class,'view'])->name('sponsor.view');
    route::get('sponsor/edit/{slug}',[SponsorController::class,'edit'])->name('sponsor.edit');
    route::post('sponsor/update',[SponsorController::class,'update'])->name('sponsor.update');
    route::post('sponsor/softdelete',[SponsorController::class,'softdelete'])->name('sponsor.softdelete');

    //Banner routes
    route::get('banner',[BannerController::class,'index'])->name('banner');
    route::post('banner/submit',[BannerController::class,'insert'])->name('banner.insert');
    route::get('banner/view/{slug}',[BannerController::class,'view'])->name('banner.view');
    route::get('banner/edit/{slug}',[BannerController::class,'edit'])->name('banner.edit');
    route::post('banner/update',[BannerController::class,'update'])->name('banner.update');
    route::post('banner/softdelete',[BannerController::class,'softdelete'])->name('banner.softdelete');

    //Promotional Banner Two routes
    route::get('promotional/banner/two',[ProBannerTwoController::class,'index'])->name('promotional.banner.two');
    route::post('promotional/banner/two/submit',[ProBannerTwoController::class,'insert'])->name('promotional.banner.two.insert');
    route::get('promotional/banner/two/view/{slug}',[ProBannerTwoController::class,'view'])->name('promotional.banner.two.view');
    route::get('promotional/banner/two/edit/{slug}',[ProBannerTwoController::class,'edit'])->name('promotional.banner.two.edit');
    route::post('promotional/banner/two/update',[ProBannerTwoController::class,'update'])->name('promotional.banner.two.update');
    route::post('promotional/banner/two/softdelete',[ProBannerTwoController::class,'softdelete'])->name('promotional.banner.two.softdelete');

    //Promotional Banner Three routes
    route::get('promotional/banner/three',[ProBannerThreeController::class,'index'])->name('promotional.banner.three');
    route::post('promotional/banner/three/submit',[ProBannerThreeController::class,'insert'])->name('promotional.banner.three.insert');
    route::get('promotional/banner/three/view/{slug}',[ProBannerThreeController::class,'view'])->name('promotional.banner.three.view');
    route::get('promotional/banner/three/edit/{slug}',[ProBannerThreeController::class,'edit'])->name('promotional.banner.three.edit');
    route::post('promotional/banner/three/update',[ProBannerThreeController::class,'update'])->name('promotional.banner.three.update');
    route::post('promotional/banner/three/softdelete',[ProBannerThreeController::class,'softdelete'])->name('promotional.banner.three.softdelete');

    //Brand Routes
    route::get('brand',[BrandController::class,'index'])->name('brand');
    route::get('brand/edit/{slug}',[BrandController::class,'edit'])->name('brand.edit');
    route::get('brand/view/{slug}',[BrandController::class,'view'])->name('brand.view');
    route::post('brand/submit',[BrandController::class,'insert'])->name('brand.insert');
    route::post('brand/update',[BrandController::class,'update'])->name('brand.update');
    route::post('brand/softdelete',[BrandController::class,'softdelete'])->name('brand.softdelete');
    Route::get('admin/brand-delete/{brand_id}',[BrandController::class,'delete']);

    //Category Routes
    route::get('category',[CategoryController::class,'index'])->name('category');
    route::get('category/edit/{slug}',[CategoryController::class,'edit'])->name('category.edit');
    route::get('category/view/{slug}',[CategoryController::class,'view'])->name('category.view');
    route::post('category/submit',[CategoryController::class,'insert'])->name('category.insert');
    route::post('category/update',[CategoryController::class,'update'])->name('category.update');
    route::post('category/softdelete',[CategoryController::class,'softdelete'])->name('category.softdelete');
    Route::get('admin/category-delete/{category_id}',[CategoryController::class,'delete']);

    //SubCategory Routes
    route::get('sub-category',[SubCategoryController::class,'index'])->name('sub-category');
    Route::get('/subcategory/ajax/{cat_id}',[SubSubCategoryController::class,'getSubCat']);
    route::get('sub-category/edit/{slug}',[SubCategoryController::class,'edit'])->name('sub-category.edit');
    route::get('sub-category/view/{slug}',[SubCategoryController::class,'view'])->name('sub-category.view');
    route::post('sub-category/submit',[SubCategoryController::class,'insert'])->name('sub-category.insert');
    route::post('sub-category/update',[SubCategoryController::class,'update'])->name('sub-category.update');
    route::post('sub-category/softdelete',[SubCategoryController::class,'softdelete'])->name('sub-category.softdelete');
    Route::get('admin/sub-category-delete/{category_id}',[SubCategoryController::class,'delete']);

    //Sub Sub Category routes
    route::get('sub-sub-category',[SubSubCategoryController::class,'index'])->name('sub-sub-category');
    Route::get('/subcategory/ajax/{cat_id}',[SubSubCategoryController::class,'getSubCat']);
    route::post('sub-sub-category/submit',[SubSubCategoryController::class,'insert'])->name('sub-sub-category.insert');
    route::get('sub-sub-category/edit/{slug}',[SubSubCategoryController::class,'edit'])->name('sub-sub-category.edit');
    route::get('sub-sub-category/view/{slug}',[SubSubCategoryController::class,'view'])->name('sub-sub-category-view');
    route::post('sub-sub-category/update',[SubSubCategoryController::class,'update'])->name('sub-sub-category.update');
    route::post('sub-sub-category/softdelete',[SubSubCategoryController::class,'softdelete'])->name('sub-sub-category.softdelete');

    //Product routes
    route::get('product',[ProductController::class,'manage'])->name('product.manage');
    route::get('product/add',[ProductController::class,'addProduct'])->name('product.add');
    Route::get('/subsubcategory/ajax/{subcat_id}',[ProductController::class,'getsubsubCat']);
    route::post('product/submit',[ProductController::class,'insert'])->name('product.insert');
    route::get('product/edit/{slug}',[ProductController::class,'edit'])->name('product.edit');
    route::get('product/view/{slug}',[ProductController::class,'view'])->name('product.view');
    route::post('product/update',[ProductController::class,'update'])->name('product.update');
    Route::get('product-inactive/{slug}',[ProductController::class,'inactive']);
    Route::get('product-active/{slug}',[ProductController::class,'active']);
    route::post('product/softdelete',[ProductController::class,'softdelete'])->name('product.softdelete');

    Route::post('product/thambnail/update',[ProductController::class,'thambnailUpdate'])->name('update-product-thambnail');

    route::post('product/multi-image/update',[ProductController::class,'multiImageUpdate'])->name('update.product.multi.image');
    route::get('product/multi-image/delete/{id}',[ProductController::class,'multiImageDelete'])->name('delete.product.multi.image');


    //Shipping Area routes

    // division
    route::get('division',[ShippingAreaController::class,'division'])->name('division');
    route::post('division/submit',[ShippingAreaController::class,'divisionInsert'])->name('division.insert');
    route::get('division/edit/{slug}',[ShippingAreaController::class,'divisionEdit'])->name('division.edit');
    route::get('division/view/{slug}',[ShippingAreaController::class,'divisionView'])->name('division.view');
    route::post('division/update',[ShippingAreaController::class,'divisionUpdate'])->name('division.update');
    route::post('division/softdelete',[ShippingAreaController::class,'divisionSoftdelete'])->name('division.softdelete');

    // District
    route::get('district',[ShippingAreaController::class,'district'])->name('district');
    route::post('district/submit',[ShippingAreaController::class,'districtInsert'])->name('district.insert');
    route::get('district/edit/{slug}',[ShippingAreaController::class,'districtEdit'])->name('district.edit');
    route::get('district/view/{slug}',[ShippingAreaController::class,'districtView'])->name('district.view');
    route::post('district/update',[ShippingAreaController::class,'districtUpdate'])->name('district.update');
    route::post('district/softdelete',[ShippingAreaController::class,'districtSoftdelete'])->name('district.softdelete');

    // state
    route::get('state',[ShippingAreaController::class,'state'])->name('state');
    Route::get('/district/ajax/{dis_id}',[ShippingAreaController::class,'getDistrict']);
    route::post('state/submit',[ShippingAreaController::class,'stateInsert'])->name('state.insert');
    route::get('state/edit/{slug}',[ShippingAreaController::class,'stateEdit'])->name('state.edit');
    route::get('state/view/{slug}',[ShippingAreaController::class,'stateView'])->name('state.view');
    route::post('state/update',[ShippingAreaController::class,'stateUpdate'])->name('state.update');
    route::post('state/softdelete',[ShippingAreaController::class,'stateSoftdelete'])->name('state.softdelete');

    // Coupon
    route::get('coupon',[CouponController::class,'index'])->name('coupon');
    route::post('coupon/submit',[CouponController::class,'insert'])->name('coupon.insert');
    route::get('coupon/edit/{slug}',[CouponController::class,'edit'])->name('coupon.edit');
    route::get('coupon/view/{slug}',[CouponController::class,'view'])->name('coupon.view');
    route::post('coupon/update',[CouponController::class,'update'])->name('coupon.update');
    route::post('coupon/softdelete',[CouponController::class,'softdelete'])->name('coupon.softdelete');

    //orders
    Route::get('pending-orders',[OrderController::class,'pendingOrder'])->name('pending-orders');
    Route::get('orders-view/{id}',[OrderController::class,'viewOrders']);
    Route::get('confirmed-orders',[OrderController::class,'confirmOrder'])->name('confirmed-orders');
    Route::get('processing-orders',[OrderController::class,'processingOrder'])->name('processing-orders');
    Route::get('picked-orders',[OrderController::class,'pickedOrders'])->name('picked-orders');
    Route::get('shipped-orders',[OrderController::class,'shippedOrders'])->name('shipped-orders');
    Route::get('delivered-orders',[OrderController::class,'deliveredOrders'])->name('delivered-orders');
    Route::get('cancel-orders',[OrderController::class,'cancelOrders'])->name('order-cancel');

    //status
    Route::get('pending-to-confirm/{order_id}',[OrderController::class,'pendingToConfirm']);
    Route::get('pending-to-cancel/{order_id}',[OrderController::class,'pendingToCancel']);
    Route::get('confirm-to-processing/{order_id}',[OrderController::class,'confirmToProcess']);
    Route::get('processing-to-picked/{order_id}',[OrderController::class,'processToPicked']);
    Route::get('picked-to-shipped/{order_id}',[OrderController::class,'pickedToShipped']);
    Route::get('shipped-to-delivery/{order_id}',[OrderController::class,'shippedToDelivery']);
    //invoice download
    Route::get('invoice-download/{order_id}',[OrderController::class,'downloadInvoice']);

    //reports
    Route::get('reports',[ReportController::class,'index'])->name('reports');
    Route::post('reports/by-date',[ReportController::class,'reportByDate'])->name('search-by-date');
    Route::post('reports/by-month',[ReportController::class,'reportByMonth'])->name('search-by-month');
    Route::post('reports/by-year',[ReportController::class,'reportByYear'])->name('search-by-year');

    //customer review
    Route::get('review-create',[CustomerReviewController::class,'create'])->name('customer.review');
    Route::get('review-delete/{review_id}',[CustomerReviewController::class,'destroy']);
    Route::get('review-approve/{review_id}',[CustomerReviewController::class,'approveNow']);

    //stock management
    Route::get('product-stock',[StockController::class,'index'])->name('product.stock');
    Route::get('product-stock/edit/{id}',[StockController::class,'edit'])->name('stock.edit');
    Route::post('product-stock/update',[StockController::class,'update'])->name('stock.update');
    Route::post('product-stock/update',[StockController::class,'update'])->name('stock.update');

    //Role management
    route::get('role',[RoleController::class,'index'])->name('role');
    route::get('role/add',[RoleController::class,'add'])->name('role.add');
    route::post('role/submit',[RoleController::class,'insert'])->name('role.insert');
    route::get('role/edit/{id}',[RoleController::class,'edit'])->name('role.edit');
    route::post('role/update',[RoleController::class,'update'])->name('role.update');
    route::get('role/delete/{id}',[RoleController::class,'delete'])->name('role.delete');

    //Permission management
    route::get('permission',[PermissionController::class,'index'])->name('permission');
    route::get('permission/add',[PermissionController::class,'add'])->name('permission.add');
    route::post('permission/submit',[PermissionController::class,'insert'])->name('permission.insert');
    route::get('permission/edit/{id}',[PermissionController::class,'edit'])->name('permission.edit');
    route::post('permission/update',[PermissionController::class,'update'])->name('permission.update');
    route::get('permission/delete/{id}',[PermissionController::class,'delete'])->name('permission.delete');

    //Subadmin management
    route::get('subadmin',[SubadminController::class,'index'])->name('subadmin');
    route::get('subadmin/add',[SubadminController::class,'add'])->name('subadmin.add');
    route::post('subadmin/submit',[SubadminController::class,'insert'])->name('subadmin.insert');
    route::get('subadmin/edit/{id}',[SubadminController::class,'edit'])->name('subadmin.edit');
    route::post('subadmin/update',[SubadminController::class,'update'])->name('subadmin.update');
    route::get('subadmin/delete/{id}',[SubadminController::class,'delete'])->name('subadmin.delete');

});

// ================= User Routes ======================
Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'User'], function(){
    route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::post('update/data',[UserController::class,'updateData'])->name('update-profile');
    Route::get('image',[UserController::class,'imagePage'])->name('user.image');
    Route::post('update/image',[UserController::class,'updateImage'])->name('update.image');
    Route::get('update/password',[UserController::class,'updatePassPage'])->name('update-password');
    Route::post('store/password',[UserController::class,'storePassword'])->name('password-store');

    //wishlist
    route::get('wishlist',[WishlistController::class,'wishlist'])->name('wishlist');
    //get wishlist with ajax
    route::get('/get-wishlist-product',[WishlistController::class,'readAllProduct'])->name('readAllProduct');
    // wishlist remove with ajax
    route::get('/wishlist-remove/{id}',[WishlistController::class,'destory'])->name('destory');


    //checkout
    route::get('district/ajax/{division_id}',[CheckoutController::class,'getDistrictWithAjax'])->name('getDistrictWithAjax');
    route::get('state-get/ajax/{district_id}',[CheckoutController::class,'getStateWithAjax'])->name('getStateWithAjax');
    route::post('payment',[CheckoutController::class,'storeCheckout'])->name('user.checkout.store');

    //stripe payment
    route::post('stripe/order-complete',[StripeController::class,'store'])->name('stripe.order');
    // CustomPaymentSubmit
    route::post('payment/submit',[CustomPaymentSubmitController::class,'customPaymentSubmit'])->name('customPaymentSubmit');

    //user orders
    Route::get('orders',[UserController::class,'orderCreate'])->name('my-orders');
    Route::get('order-view/{order_id}',[UserController::class,'orderView']);
    Route::get('invoice-download/{order_id}',[UserController::class,'invoiceDownload']);

    //return orders
    Route::post('return/orders-submit',[UserController::class,'returnOrderSubmit'])->name('user-return-order');
    Route::get('return/orders',[UserController::class,'returnOrder'])->name('return-orders');
    Route::get('cancel/orders',[UserController::class,'cancelOrder'])->name('cancel-orders');

    //product review
    Route::get('review-create/{product_id}',[ProductReviewController::class,'create']);
    Route::post('store/review',[ProductReviewController::class,'store'])->name('store.review');

});

// SSLCOMMERZ Start
Route::group(['middleware'=>['user','auth']], function(){
    Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
    Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

    Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
    Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

    Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

    Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
});
//SSLCOMMERZ END


// ================= Website Routes ======================
// Website Route Start
Route::get('/',[WebsiteController::class, 'index']);
route::get('product/details/{id}/{slug}',[WebsiteController::class,'productDetails'])->name('productDetails');
//Category wise Category Picture show
route::get('category/product/{category_id}/{slug}',[WebsiteController::class,'categoryWiseProduct'])->name('categoryWiseProduct');
//brand wise product show
route::get('brand/product/{brand_id}/{slug}',[WebsiteController::class,'brandWiseProduct'])->name('brandWiseProduct');
//subcategory wise product show
route::get('subcategory/product/{subcat_id}/{slug}',[WebsiteController::class,'subCatWiseProduct'])->name('subCatWiseProduct');
//Sub-subcategory wise product show
route::get('sub/subcategory/product/{subsubcat_id}/{slug}',[WebsiteController::class,'subSubCatWiseProduct'])->name('subSubCatWiseProduct');
//subcategory wise product show
route::get('subcategory/product/{subcat_id}/{slug}',[WebsiteController::class,'subCatWiseProduct'])->name('subCatWiseProduct');
//Sub-subcategory wise product show
route::get('sub/subcategory/product/{subsubcat_id}/{slug}',[WebsiteController::class,'subSubCatWiseProduct'])->name('subSubCatWiseProduct');
//product view modal with ajax
route::get('product/view/modal/{id}',[WebsiteController::class,'productViewAjax'])->name('productViewAjax');
// add to cart
route::post('/cart/data/store/{id}',[CartController::class,'addToCart'])->name('addToCart');
//mini cart
route::get('product/mini/cart',[CartController::class,'miniCart'])->name('miniCart');
//mini cart remove
route::get('/minicart/product-remove/{rowId}',[CartController::class,'miniCartRemove'])->name('miniCartRemove');


//wishlist
route::post('/add-to-wishlist/{product_id}',[CartController::class,'addToWishlist']);

//cart
route::get('my-cart',[CartController::class,'create'])->name('cart');
route::get('/get-cart-product',[CartController::class,'getAllCart'])->name('getAllCart');
route::get('/cart-remove/{rowId}',[CartController::class,'destory'])->name('destory');
route::get('/cart-increment/{rowId}',[CartController::class,'cartIncrement'])->name('cartIncrement');
route::get('/cart-decrement/{rowId}',[CartController::class,'cartDecrement'])->name('cartDecrement');

//coupon
route::post('/coupon-apply',[CartController::class,'couponApply'])->name('couponApply');
route::get('/coupon-calculation',[CartController::class,'couponCalcaultion'])->name('couponCalcaultion');
route::get('/coupon-remove',[CartController::class,'removeCoupon'])->name('removeCoupon');

//checkout
route::get('user/checkout',[CartController::class,'checkoutCreate'])->name('checkout');




// ====================================== LARAVEL SOCIATLITE START=====================================

//login google
Route::get('login/google',[LoginController::class,'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback',[LoginController::class,'handleGoogleCallback']);

//facebook
Route::get('login/facebook',[LoginController::class,'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback',[LoginController::class,'handleFacebookCallback']);

// ====================================== LARAVEL SOCIATLITE END=====================================


//Order Track
Route::post('order/track', [TrackingController::class,'orderTrackNow'])->name('order.track');


//search product
Route::get('/search-products',[SearchController::class,'searchProduct'])->name('search.product');
Route::post('/find-products',[SearchController::class,'findProducts']);


//shop
Route::get('shop',[ShopController::class,'shopPage'])->name('shop');
Route::post('shop/filter',[ShopController::class,'shopFilter'])->name('shop.filter');


//user to buyer chat communication
Route::group(['middleware' =>'auth'], function(){
    Route::post('send-message',[ChatController::class,'sendMsg'])->name('send.msg');
    Route::get('my-chat',[ChatController::class,'chatPage'])->name('chat.page');
    Route::get('/user-all',[ChatController::class,'getAllUsers'])->name('chat.users');
    Route::get('/user-messages/{id}',[ChatController::class,'useMsgById'])->name('user.msg');
    Route::get('/admin-chat',[ChatController::class,'adminChatPage'])->name('admin.chat');
});




