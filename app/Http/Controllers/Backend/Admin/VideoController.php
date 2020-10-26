<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use Validator;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use App\Category;
use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function showUnapprovedVideosList($id=null)
    {
        $videos = Video::where(['status'=>0])->get();

        if (!empty($id)) {
            $video = Video::find($id);
            $video->status = 1;

            $video->save();
            return redirect()->back()->with('approved_video_flash_success','Successfully approved',compact('videos'));
        }
        return view('admin.video_list')->with(compact('videos'));
    }
    public function deleteVideo($id=null)
    {
        if (!empty($id)) {
            $data = Video::FindOrFail($id);
            if (!empty($data->image)) {
                unlink('images/videos/'.$data->image);
            }
            Video::find($id)->delete();
            return redirect()->back()->with('delete_video_flash_success','Video successfully deleted');
        }
        
    }
    public function showVideoList($id=null)
    {
        $videos = Video::get();

        if (!empty($id)) {
            $video = Book::find($id);
            $video->status = 1;

            $video->save();
            return redirect()->back()->with('approved_book_flash_success','Successfully approved',compact('videos'));
        }
        return view('admin.video_list')->with(compact('videos'));
    }
}
