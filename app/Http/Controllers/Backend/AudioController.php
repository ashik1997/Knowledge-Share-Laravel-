<?php

namespace App\Http\Controllers\Backend;

use Auth;
use Validator;
use App\Admin;
use App\User;
use Illuminate\Support\Facades\Hash;

use App\Audio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;


class AudioController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }
    public function showAudioPostForm(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request,[
                'title' => 'required',
                'audio_file' => 'required|mimes:mp3,mp4,3gb',
                'image' => 'required|mimes:jpeg,jpg,png,gif|max:2024|dimensions:max_width=350,max_height=450',
            ]);
            // $date = $request->all();
            $audio = new Audio;
            $audio->title = $request->title;
            $audio->sub_title = $request->sub_title;
            $audio->author = $request->author;
            $audio->description = $request->description;
            $audio->posted_by_id = Auth::user()->id;
            if ($request->hasFile('audio_file')) {
                $dir = 'audios/';
                $extension = strtolower($request->file('audio_file')->getClientOriginalExtension()); // get image extension
                $fileName = str_random() . '.' . $extension; // rename image
                $request->file('audio_file')->move($dir, $fileName);
                $audio->file = $fileName;
            }
            if ($request->hasFile('image')) {
                $dir = 'images/audios/';
                $extension = strtolower($request->file('image')->getClientOriginalExtension()); // get image extension
                $fileName = str_random() . '.' . $extension; // rename image
                $request->file('image')->move($dir, $fileName);
                $audio->image = $fileName;
            }
            
            $audio->save();
            return redirect(route('user.add-audio'))->with('add_audio_flash_success','Successfully addeded');
        }
    	return view('user.add_new_audio');
    }
    public function showAudiosList()
    {
        $posted_by_id = Auth::user()->id;
        $audios = Audio::where(['posted_by_id'=>$posted_by_id])->get();
        return view('user.audio_list')->with(compact('audios'));
    }
    public function deleteAudio($id=null)
    {
        if (!empty($id)) {
            $data = Audio::FindOrFail($id);
            if (!empty($data->file)) {
                unlink('audios/'.$data->file);
            }
            if (!empty($data->image2)) {
                unlink('images/audios/'.$data->image2);
            }
            Audio::find($id)->delete();
            return redirect()->back()->with('delete_audio_flash_success','Audio successfully deleted');
        }
        
    }
    public function showEditAudioPostForm(Request $request,$id)
    {
        $audio = Audio::find($id);

        if ($request->isMethod('post')) {
            $this->validate($request,[
                 'title' => 'required',
            ]);
            $audio->title = $request->title;
            $audio->sub_title = $request->sub_title;
            $audio->author = $request->author;
            $audio->description = $request->description;
            $audio->posted_by_id = Auth::user()->id;
            if ($request->hasFile('audio_file')) {
                $dir = 'audios/';
                if (!empty($audio->file)) {
                    unlink($dir.$audio->file );
                }
                $extension = strtolower($request->file('audio_file')->getClientOriginalExtension()); // get image extension
                $fileName = str_random() . '.' . $extension; // rename image
                $request->file('audio_file')->move($dir, $fileName);
                $audio->file = $fileName;
            }
            if ($request->hasFile('image')) {
                $dir = 'images/audios/';
                if (!empty($audio->image)) {
                    unlink($dir.$audio->image );
                }
                $extension = strtolower($request->file('image')->getClientOriginalExtension()); // get image extension
                $fileName = str_random() . '.' . $extension; // rename image
                $request->file('image')->move($dir, $fileName);
                $audio->image = $fileName;
            }
            
            $audio->save();
            return redirect()->back()->with('upadte_audio_flash_success','Successfully updated');
        }
        return view('user.edit_audio')->with(compact('audio'));
    }
}
