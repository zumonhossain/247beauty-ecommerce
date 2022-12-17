<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\ProductReview;

class WebsiteController extends Controller{
    public function index(){
        $best_sellers = Product::where('best_seller',1)->where('product_status',1)->orderBy('id','DESC')->get();
        return view('website.home.home',compact('best_sellers'));
    }

    public function productDetails($id,$slug){
        $product = Product::findOrFail($id);
        $multiImgs = MultiImg::where('product_id',$id)->get();

        $color = $product->product_color;
        $product_color = explode(',',$color);

        $cat_id = $product->category_id;
        $relatedProducts = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();

        return view('website.product-details',compact('product','multiImgs','color','product_color','cat_id','relatedProducts'));
    }

    //subcategory wise product show
    public function subCatWiseProduct(Request $request,$subcat_id,$slug){
        $products = Product::where('product_status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(12);
        $categories = Category::orderBy('category_name','ASC')->get();

        return view('website.sub-category-product',compact('products','categories'));
    }

    //sub subcatgory wise product show
    public function subSubCatWiseProduct(Request $request,$subsubcat_id,$slug){
        $products = Product::where('product_status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','DESC')->paginate(12);
        $categories = Category::orderBy('category_name','ASC')->get();

        return view('website.sub-sub-category-product',compact('products','categories'));
    }

    // =========================== Product view with ajax================
    public function productViewAjax($product_id){
        $product = Product::with('category','brand')->findOrFail($product_id);

        $color = $product->product_color;
        $product_color = explode(',',$color);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
        ));
    }

}
