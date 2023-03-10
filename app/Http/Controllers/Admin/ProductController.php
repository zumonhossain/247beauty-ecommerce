<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Gram;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProductController extends Controller{
    public function manage(){
        $products = Product::orderBy('id','DESC')->get();
        return view('admin.product.manage',compact('products'));
    }

    public function addProduct(){
        $brands = Brand::where('brand_status',1)->orderBy('brand_name','ASC')->get();
        $categories = Category::where('category_status',1)->orderBy('category_name','ASC')->get();
        return view('admin.product.add',compact('categories','brands'));
    }

    public function getsubsubCat($subcat_id){
        $subcat = SubSubcategory::where('subcategory_id',$subcat_id)->orderBy('subsubcategory_name','ASC')->get();
        return json_encode($subcat);
    }

    public function view($slug){
        $multiImgs = MultiImg::where('product_slug',$slug)->get();
        $data = Product::where('product_slug',$slug)->firstOrFail();
        return view('admin.product.view',compact('data','multiImgs'));
    }

    public function edit($slug){
        $multiImgs = MultiImg::where('product_slug',$slug)->get();
        $brands = Brand::where('brand_status',1)->orderBy('id','DESC')->get();
        $categories = Category::where('category_status',1)->orderBy('id','DESC')->get();
        $subcategories = SubCategory::where('subcategory_status',1)->orderBy('id','DESC')->get();
        $subsubcategories = SubSubCategory::where('subsubcategory_status',1)->orderBy('id','DESC')->get();
        $product = Product::where('product_slug',$slug)->firstOrFail();
        return view('admin.product.edit',compact('product','brands','categories','subcategories','subsubcategories','multiImgs'));
    }

    public function insert(Request $request){
        // dd($request->all());
        $request->validate([
            'brand_id'=>'required',
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'product_name'=>'required',
            'product_qty'=>'required',
            'selling_price'=>'required',
            'product_thambnail'=>'required',
            'multi_img'=>'required',
            'short_description'=>'required',
        ],[
            'brand_id.required'=>'please enter brand name!',
            'category_id.required'=>'please enter category name!',
            'subcategory_id.required'=>'please enter subcategory name!',
            'product_name.required'=>'please enter product name!',
            'product_qty.required'=>'please enter product quantity!',
            'selling_price.required'=>'please enter selling price!',
            'product_thambnail.required'=>'please enter product thambnail!',
            'multi_img.required'=>'please enter product multiple image!',
            'short_description.required'=>'please enter short description!',
        ]);


        $creator = Auth::user()->id;
        $slug = Str::slug($request['product_name'], '-');

        $image = $request->file('product_thambnail');
        $name_gen = time().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('uploads/admin/product/thambnail/'.$name_gen);
        $save_url = 'uploads/admin/product/thambnail/'.$name_gen;

        $product_id = Product::insertGetId([
            'user_id' => Auth::id(),
            'brand_id'=>$request['brand_id'],
            'category_id'=>$request['category_id'],
            'subcategory_id'=>$request['subcategory_id'],
            'subsubcategory_id'=>$request['subsubcategory_id'],
            'product_gram'=>$request['product_gram'],
            'product_name'=>$request['product_name'],
            'product_code'=>$request['product_code'],
            'product_qty'=>$request['product_qty'],
            'product_color'=>$request['product_color'],
            'selling_price'=>$request['selling_price'],
            'discount_price'=>$request['discount_price'],
            'short_description'=>$request['short_description'],
            'best_seller'=>$request['best_seller'],
            'product_thambnail'=>$save_url,
            'product_slug'=>$slug,
            'product_creator'=>$creator,
            'created_at' => Carbon::now(),
        ]);

        // Multiple Image Upload start
        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name= time().'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('uploads/admin/product/multi-image/'.$make_name);
            $uplodPath = 'uploads/admin/product/multi-image/'.$make_name;

            MultiImg::insert([
                'product_id' => $product_id,
                'product_slug' => $slug,
                'photo_name' => $uplodPath,
                'created_at' => Carbon::now(),
            ]);
        }

        // Multiple Image Upload end

        $notification=array(
            'messege'=>'Product Added Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('product.manage')->with($notification);
    }


    public function update(Request $request){
        $request->validate([
            'brand_id'=>'required',
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'product_name'=>'required',
            'product_qty'=>'required',
            'selling_price'=>'required',
            'short_description'=>'required',
        ],[
            'brand_id.required'=>'please enter brand name!',
            'category_id.required'=>'please enter category name!',
            'subcategory_id.required'=>'please enter subcategory name!',
            'product_name.required'=>'please enter product name!',
            'product_qty.required'=>'please enter product quantity!',
            'selling_price.required'=>'please enter selling price!',
            'short_description.required'=>'please enter description!',
        ]);

        $id = $request['id'];
        $oldImage = $request['old_img'];

        $creator = Auth::user()->id;
        $slug = Str::slug($request['product_name'], '-');

        Product::where('product_status',1)->where('id',$id)->update([
            'user_id' => Auth::id(),
            'brand_id'=>$request['brand_id'],
            'category_id'=>$request['category_id'],
            'subcategory_id'=>$request['subcategory_id'],
            'subsubcategory_id'=>$request['subsubcategory_id'],
            'product_gram'=>$request['product_gram'],
            'product_name'=>$request['product_name'],
            'product_code'=>$request['product_code'],
            'product_qty'=>$request['product_qty'],
            'product_color'=>$request['product_color'],
            'selling_price'=>$request['selling_price'],
            'discount_price'=>$request['discount_price'],
            'short_description'=>$request['short_description'],
            'best_seller'=>$request['best_seller'],
            'product_slug'=>$slug,
            'product_creator'=>$creator,
            'updated_at' => Carbon::now(),
        ]);

        $notification=array(
            'messege'=>'Product Update Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('product.manage')->with($notification);

    }

        // Product main thambnail update start
        public function thambnailUpdate(Request $request){
            // dd($request->all());
            $pro_id = $request->product_id;
            // $oldImage = $request->old_img;
            // unlink($oldImage);

            $image = $request->file('product_thambnail');
            $name_gen = time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('uploads/admin/product/thambnail/'.$name_gen);
            $save_url = 'uploads/admin/product/thambnail/'.$name_gen;

            Product::findOrFail($pro_id)->update([
                'product_thambnail' => $save_url,
                'updated_at' => Carbon::now(),

            ]);

            $notification=array(
                'messege'=>'Product Thambnail Update Success',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
        // Product main thambnail update end

        // Product Multiple Image start
        public function multiImageUpdate(Request $request){
            $imgs = $request->multiImg;

            foreach ($imgs as $id => $img) {
                $imgDel = MultiImg::findOrFail($id);
                unlink($imgDel->photo_name);


                $make_name = time().'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(917,1000)->save('uploads/admin/product/multi-image/'.$make_name);
                $uplodPath = 'uploads/admin/product/multi-image/'.$make_name;

                MultiImg::where('id',$id)->update([
                'photo_name' => $uplodPath,
                'updated_at' => Carbon::now(),
               ]);

            }
            $notification=array(
                'messege'=>'Product Image Update Success',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
        // Product Multiple Image end

        // Multi Image Delete Start
        public function multiImageDelete($id){
            $oldimg = MultiImg::findOrFail($id);
            unlink($oldimg->photo_name);
            MultiImg::findOrFail($id)->delete();

            $notification=array(
                'messege'=>'Product Image Dlete Success',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
        // Multi Image Delete Start

    public function inactive($slug){
        Product::where('product_status',1)->where('product_slug',$slug)->update([
            'product_status' => 0
        ]);
        $notification=array(
            'messege'=>'Product Inactivated',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function active($slug){
        Product::where('product_status',0)->where('product_slug',$slug)->update([
            'product_status' => 1
        ]);

        $notification=array(
            'messege'=>'Product Activated',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function softdelete(Request $request){
        $id=$request['modal_id'];

        Product::where('id',$id)->delete();

        $notification=array(
            'messege'=>'Product delete success!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
