<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\SubCategory;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Exception;

class SubCategoryController extends Controller{
   // public function __construct(){
    //     $this->middleware('auth');
    // }
    public function index(){
        $subCategories = SubCategory::where('subcategory_status',1)->orderBy('id','DESC')->get();
        $categories = Category::where('category_status',1)->orderBy('category_name','ASC')->get();
        return view('admin.sub-category.index',compact('subCategories','categories'));
    }

    public function view($slug){
        $data = SubCategory::where('subcategory_status',1)->where('subcategory_slug',$slug)->firstOrFail();
        return view('admin.sub-category.view',compact('data'));
    }

    public function edit($slug){
        $category = Category::where('category_status',1)->orderBy('id','ASC')->get();
        $subcategory = SubCategory::where('subcategory_status',1)->where('subcategory_slug',$slug)->firstOrFail();
        return view('admin.sub-category.edit',compact('subcategory','category'));
    }

    public function insert(Request $request){
        $request->validate([
            'category_id'=>'required',
            'subcategory_name'=>'required',
            'subcategory_image'=>'required',
        ],[
            'category_id.required'=>'Please enter category name!',
            'subcategory_name.required'=>'Please enter subcategory name!',
            'subcategory_image.required'=>'Please enter image!',
        ]);

        $slug = Str::slug($request['subcategory_name'], '-');
        $creator = Auth::user()->id;

        $insert = SubCategory::insertGetId([
            'category_id'=>$request['category_id'],
            'subcategory_name'=>$request['subcategory_name'],
            'subcategory_image'=>$request['subcategory_image'],
            'subcategory_slug'=>$slug,
            'subcategory_creator'=>$creator,
            'created_at' => Carbon::now(),
        ]);

        if($request->hasFile('subcategory_image')){
            $image1 = $request->file('subcategory_image');
            $imageName1 = 'subcategory_image_'.$insert.'_'.time().'.'.$image1->getClientOriginalExtension();
            Image::make($image1)->resize(1000,1000)->save('uploads/admin/category/'.$imageName1);
            SubCategory::where('id',$insert)->update([
                'subcategory_image' => $imageName1
            ]);
        }

        $notification = array(
            'messege' =>'SubCategory Upload Success!',
            'alert-type' =>'success',
        );
        return redirect()->route('sub-category')->with($notification);
    }

    public function update(Request $request){
        // dd($request->all);
        $request->validate([
            'category_id'=>'required',
            'subcategory_name'=>'required',
        ],[
            'category_id.required'=>'Please enter category name!',
            'subcategory_name.required'=>'Please enter subcategory name!',
        ]);

        $id = $request->id;

        $slug = Str::slug($request['subcategory_name'], '-');
        $creator = Auth::user()->id;

        if($request->hasFile('subcategory_image')){
            $image=$request->file('subcategory_image');
            $subcategory_image='subcategory_image_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('uploads/admin/category/'.$subcategory_image);

            SubCategory::where('id',$id)->update([
                'subcategory_image'=>$subcategory_image,
            ]);
        }

        SubCategory::where('subcategory_status',1)->where('id',$id)->update([
            'category_id'=>$request['category_id'],
            'subcategory_name'=>$request['subcategory_name'],
            'subcategory_slug'=>$slug,
            'subcategory_creator'=>$creator,
            'updated_at' => Carbon::now(),
        ]);

        $notification=array(
            'messege'=>'Sub-Catetory Update Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('sub-category')->with($notification);
    }

    public function softdelete(Request $request){
        $id=$request['modal_id'];

        SubCategory::where('subcategory_status',1)->where('id',$id)->update([
            'subcategory_status'=>0,
        ]);

        $notification = array(
            'messege' =>'SubCategory Softdelete Success!',
            'alert-type' =>'success',
        );
        return redirect()->back()->with($notification);
    }


    //  ===================================================================
    //  ==================== SubCategory API SECTION ===========================
    //  ===================================================================


    public function getWebsiteSubCategory($id = null){

        try {

            if ($id == null) {
                return SubCategory::where('subcategory_status', 1)->get();
            } else {
                return SubCategory::where('id', $id)->where('subcategory_status', 1)->first();
            }

            return response()->json(['success' => 'true', 'status_code' => '200']);
        }
        catch (ModelNotFoundException $ex) {
            return response()->json(['success' => 'false', 'status_code' => '404', 'error' => 'Invalid:Model Not Found']);
        }
        catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'error' => $ex->getMessage()]);
        }
    }

    public function saveWebsiteSubCategory(Request $request){
        $rules = [
            'subcategory_name' => 'required',
        ];

        $customMessage = [
            'subcategory_name.required' => 'sub category name field is required!'
        ];

        $validator = Validator::make($request->all(), $rules, $customMessage);

        if ($validator->fails()) {
            return response()->json([
                'success' => 'false',
                'status_code' => '401',
                'error' => 'error',
                'message' => $validator->errors()
            ]);
        }

        try {

            $slug = Str::slug($request['subcategory_name'], '-');
            // $creator = Auth::user()->id;

            $insertSubCategory = SubCategory::insertGetId([
                'category_id'=>$request['category_id'],
                'subcategory_name'=>$request['subcategory_name'],
                'subcategory_slug'=>$slug,
                // 'subcategory_creator'=>$creator,
                'created_at' => Carbon::now(),
            ]);

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $insertSubCategory]);
        }
        catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'message' => $ex->getMessage(), 'error' => 'error']);
        }
    }


    public function updateWebsiteSubCategory(Request $request, $id){

        try {
            $slug = Str::slug($request['subcategory_name'], '-');
            // $creator = Auth::user()->id;

            $updateSubCategory = SubCategory::where('subcategory_status',1)->where('id',$id)->update([
                'category_id'=>$request['category_id'],
                'subcategory_name'=>$request['subcategory_name'],
                'subcategory_slug'=>$slug,
                // 'subcategory_creator'=>$creator,
                'updated_at' => Carbon::now(),
            ]);

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $updateSubCategory]);
        }
        catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'message' => $ex->getMessage(), 'error' => 'error']);
        }

    }

    public function deleteWebsiteSubCategory($id = null){

        try {
            SubCategory::where('subcategory_status',1)->where('id',$id)->update([
                'subcategory_status'=>0,
            ]);

            return response()->json(['success' => 'true', 'status_code' => '200']);
        }
        catch (ModelNotFoundException $ex) {
            return response()->json(['success' => 'false', 'status_code' => '404', 'error' => 'Invalid:Model Not Found']);
        }
        catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'error' => $ex->getMessage()]);
        }
    }
}
