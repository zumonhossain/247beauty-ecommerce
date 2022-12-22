<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TopNotic;
use Carbon\Carbon;

class TopNoticController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function notice(){
        $data = TopNotic::where('notice_status',1)->where('notice_id',1)->firstOrFail();
        return view('admin.notice.notice',compact('data'));
    }
    public function update_notice(Request $request){
        $request->validate([
            'notice_name'=>'required',
        ],[
            'notice_name.required'=>'Please enter notice!',
        ]);

        TopNotic::where('notice_status',1)->where('notice_id',1)->update([
            'notice_name'=>$request['notice_name'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        $notification = array(
            'messege' => 'Notice Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }
}
