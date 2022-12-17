<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponsor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class SponsorController extends Controller{
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    public function index(){
        $sponsor = Sponsor::where('ban_status',1)->orderBy('id','ASC')->get();
        return view('admin.sponsor.index',compact('sponsor'));
    }

    public function view($slug){
        $data = Sponsor::where('ban_status',1)->where('ban_slug',$slug)->firstOrFail();
        return view('admin.sponsor.view',compact('data'));
    }
    public function edit($slug){
        $data = Sponsor::where('ban_status',1)->where('ban_slug',$slug)->firstOrFail();
        return view('admin.sponsor.edit',compact('data'));
    }

    public function insert(Request $request){
        $request->validate([
            'ban_image'=>'required',
            'ban_url'=>'required',
        ],[
            'ban_image.required'=>'Please enter image!',
            'ban_url.required'=>'Please enter url!',
        ]);

        $slug = uniqid('sponsor-15');
        $creator = Auth::user()->id;

        $insert = Sponsor::insertGetId([
            'ban_image'=>$request['ban_image'],
            'ban_url'=>$request['ban_url'],
            'ban_slug'=>$slug,
            'ban_creator'=>$creator,
            'created_at'=>carbon::now(),
        ]);

        if($request->hasFile('ban_image')){
            $image1=$request->file('ban_image');
            $imageName1='ban_image_'.$insert.'_'.time().'.'.$image1->getClientOriginalExtension();
            Image::make($image1)->resize(200,200)->save('uploads/admin/sponsor/'.$imageName1);
            Sponsor::where('id',$insert)->update([
                'ban_image'=>$imageName1
            ]);
        }

        $notification=array(
            'messege'=>'Sponsor Upload Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request){
        $request->validate([
            'ban_url'=>'required',
        ],[
            'ban_url.required'=>'Please enter url!',
        ]);

        $id = $request['id'];

        $slug = uniqid('sponsor-15');
        $creator = Auth::user()->id;

        if($request->hasFile('ban_image')){
            $image=$request->file('ban_image');
            $ban_image='ban_image_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('uploads/admin/sponsor/'.$ban_image);

            Sponsor::where('id',$id)->update([
                'ban_image'=>$ban_image,
            ]);
        }

        Sponsor::where('ban_status',1)->where('id',$id)->update([
            'ban_url'=>$request['ban_url'],
            'ban_slug'=>$slug,
            'ban_creator'=>$creator,
            'updated_at'=>Carbon::now(),
        ]);

        $notification=array(
            'messege'=>'Sponsor Update Success!',
            'alert-type'=>'success',
        );
        return redirect()->route('sponsor')->with($notification);
    }

    public function softdelete(Request $request){
        $id = $request['modal_id'];

        Sponsor::where('ban_status',1)->where('id',$id)->update([
            'ban_status'=>0
        ]);

        $notification=array(
            'messege'=>'Sponsor Softdelete Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }
}
