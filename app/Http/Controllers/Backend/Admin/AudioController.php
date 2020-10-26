<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use Validator;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use App\Category;
use App\Audio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class AudioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function showUnapprovedAudiosList($id=null)
    {
        $audios = Audio::where(['status'=>0])->get();

        if (!empty($id)) {
            $audio = Audio::find($id);
            $audio->status = 1;

            $audio->save();
            return redirect()->back()->with('approved_audio_flash_success','Successfully approved',compact('audios'));
        }
        return view('admin.audio_list')->with(compact('audios'));
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
            return redirect()->back()->with('delete_audio_flash_success','audio successfully deleted');
        }
        
    }
    public function showAudioList($id=null)
    {
        $audios = Audio::get();

        if (!empty($id)) {
            $audio = Audio::find($id);
            $audio->status = 1;

            $audio->save();
            return redirect()->back()->with('approved_audio_flash_success','Successfully approved',compact('audios'));
        }
        return view('admin.audio_list')->with(compact('audios'));
    }
}
