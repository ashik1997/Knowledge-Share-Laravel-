<?php

namespace App\Http\Controllers\Backend;

use Auth;
use Validator;
use App\Admin;
use App\User;
use Illuminate\Support\Facades\Hash;

use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class VideoController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }
    public function showVideoPostForm(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request,[
                'title' => 'required',
                'image1' => 'required|mimes:jpeg,jpg,png,gif|max:2024|dimensions:max_width=350,max_height=450',
            ]);
            // $date = $request->all();
            $video = new Video;
            $video->title = $request->title;
            $video->sub_title = $request->sub_title;
            $video->author = $request->author;
            $video->description = $request->description;
            $video->posted_by_id = Auth::user()->id;
			$video->video_url = $request->video_url;
            if ($request->hasFile('image')) {
                $dir = 'images/videos/';
                $extension = strtolower($request->file('image')->getClientOriginalExtension()); // get image extension
                $fileName = str_random() . '.' . $extension; // rename image
                $request->file('image')->move($dir, $fileName);
                $video->image = $fileName;
            }
            
            $video->save();
            return redirect(route('user.add-video'))->with('add_video_flash_success','Successfully addeded');
        }
    	return view('user.add_new_video');
    }
    public function showVideoList()
    {
        $posted_by_id = Auth::user()->id;
        $videos = Video::where(['posted_by_id'=>$posted_by_id])->get();
        return view('user.video_list')->with(compact('videos'));
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
    public function showEditVideoPostForm(Request $request,$id)
    {
        $video = Video::find($id);

        if ($request->isMethod('post')) {
            $this->validate($request,[
                'title' => 'required',
            ]);
            $video->title = $request->title;
            $video->sub_title = $request->sub_title;
            $video->author = $request->author;
            $video->description = $request->description;
            $video->video_url = $request->video_url;
            $video->posted_by_id = Auth::user()->id;
            if ($request->hasFile('image')) {
                $dir = 'images/videos/';
                if (!empty($video->image)) {
                    unlink($dir.$video->image );
                }
                $extension = strtolower($request->file('image')->getClientOriginalExtension()); // get image extension
                $fileName = str_random() . '.' . $extension; // rename image
                $request->file('image')->move($dir, $fileName);
                $video->image = $fileName;
            }
            
            $video->save();
            return redirect()->back()->with('upadte_video_flash_success','Successfully updated');
        }
        return view('user.edit_video')->with(compact('video'));
    }
}
