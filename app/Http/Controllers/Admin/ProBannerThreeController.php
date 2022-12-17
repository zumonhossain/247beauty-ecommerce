<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProBannerThree;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProBannerThreeController extends Controller{
        // public function __construct(){
    //     $this->middleware('auth');
    // }
    public function index(){
        $banner = ProBannerThree::where('ban_status',1)->orderBy('id','ASC')->get();
        return view('admin.banner-three.index',compact('banner'));
    }

    public function view($slug){
        $data = ProBannerThree::where('ban_status',1)->where('ban_slug',$slug)->firstOrFail();
        return view('admin.banner-three.view',compact('data'));
    }
    public function edit($slug){
        $data = ProBannerThree::where('ban_status',1)->where('ban_slug',$slug)->firstOrFail();
        return view('admin.banner-three.edit',compact('data'));
    }

    public function insert(Request $request){
        $request->validate([
            'ban_image'=>'required',
            'ban_url'=>'required',
        ],[
            'ban_image.required'=>'Please enter brand image!',
            'ban_url.required'=>'Please enter brand url!',
        ]);

        $slug = uniqid('banner-15');
        $creator = Auth::user()->id;

        $insert = ProBannerThree::insertGetId([
            'ban_image'=>$request['ban_image'],
            'ban_url'=>$request['ban_url'],
            'ban_slug'=>$slug,
            'ban_creator'=>$creator,
            'created_at'=>carbon::now(),
        ]);

        if($request->hasFile('ban_image')){
            $image1=$request->file('ban_image');
            $imageName1='ban_image_'.$insert.'_'.time().'.'.$image1->getClientOriginalExtension();
            Image::make($image1)->resize(200,200)->save('uploads/admin/banner/'.$imageName1);
            ProBannerThree::where('id',$insert)->update([
                'ban_image'=>$imageName1
            ]);
        }

        $notification=array(
            'messege'=>'Banner Upload Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request){
        $request->validate([
            'ban_url'=>'required',
        ],[
            'ban_url.required'=>'Please enter brand url!',
        ]);

        $id = $request['id'];

        $slug = uniqid('banner-15');
        $creator = Auth::user()->id;

        if($request->hasFile('ban_image')){
            $image=$request->file('ban_image');
            $ban_image='ban_image_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('uploads/admin/banner/'.$ban_image);

            ProBannerThree::where('id',$id)->update([
                'ban_image'=>$ban_image,
            ]);
        }

        ProBannerThree::where('ban_status',1)->where('id',$id)->update([
            'ban_url'=>$request['ban_url'],
            'ban_slug'=>$slug,
            'ban_creator'=>$creator,
            'updated_at'=>Carbon::now(),
        ]);

        $notification=array(
            'messege'=>'Banner Update Success!',
            'alert-type'=>'success',
        );
        return redirect()->route('promotional.banner.three')->with($notification);
    }

    public function softdelete(Request $request){
        $id = $request['modal_id'];

        ProBannerThree::where('ban_status',1)->where('id',$id)->update([
            'ban_status'=>0
        ]);

        $notification=array(
            'messege'=>'Banner Softdelete Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }
}