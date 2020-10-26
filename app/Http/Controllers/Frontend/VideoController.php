<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Video;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function videoList($id=null)
    {
    	$videos = Video::where(['status'=>1])->orderBy('id', 'desc')->paginate(8);
        return view('video_list')->with(compact('videos'));
    	
    }
    public function showVideoDetails($id)
    {
        $video = Video::where(['status'=>1])->find($id);
        $reviews = Review::where('post_id', [$id])->where(['table_name'=>'videos'])->orderBy('id', 'DESC')->paginate(3);
        return view('video_details')->with(compact('video','reviews'));
    }
    public function reviewSubmit(Request $request)
    {
        if (!isset(Auth::user()->id)) {
            return redirect()->back()->with('add_review_flash_error','Please login first...!');
        }
        if ($request->isMethod('post')) {
            // $date = $request->all();
            $review = new Review;
            $review->summery = $request->summery;
            $review->post_id = $request->post_id;
            $review->review = $request->massage;
            $review->table_name = 'videos';
            $review->user_id = Auth::user()->id;
            $review->save();
            return redirect()->back()->with('add_review_flash_success','Review successfully submitted');
        }else{
            return redirect()->back()->with('add_review_flash_error','Something error.......!');
        }
    }
}
