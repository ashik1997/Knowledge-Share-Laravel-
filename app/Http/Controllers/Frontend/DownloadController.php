<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Book;
use App\Audio;
use App\Video;
use App\Blog;
use App\Download;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
    public function download(Request $request)
    {
    	if (Auth::user())
        {
            $book =  Book::FindOrFail($request->book_id);

            $have_download = Download::where(['book_id'=>$request->book_id])->where(['user_id'=>Auth::user()->id])->count();

            $download_limit = Download::where(['user_id'=>Auth::user()->id])->count();

            $total_book = Book::where(['posted_by_id'=>Auth::user()->id])->where(['status'=>1])->count();
            $total_audio = Audio::where(['posted_by_id'=>Auth::user()->id])->where(['status'=>1])->count();
            $total_video = Video::where(['posted_by_id'=>Auth::user()->id])->where(['status'=>1])->count();
            $total_blog = Blog::where(['posted_by_id'=>Auth::user()->id])->where(['status'=>1])->count();
            $default_download_limit = Auth::user()->download_limitation;
            $total_download_limitation = ($total_book*2)+$total_audio+$total_video+$total_blog+$default_download_limit;

            if ($have_download>0) {
                $download_file = public_path().'/books/' . $book->pdf_file;
                return response()->download($download_file);
            }else if($total_download_limitation>$download_limit){

                $download = new Download;
                $download->user_id = Auth::user()->id;
                $download->book_id = $request->book_id;
                $download->save();
                
                $download_file = public_path().'/books/' . $book->pdf_file;
                return response()->download($download_file);

            }else{
                return redirect()->back()->with('flash_message_download','Download limit over. Please share some book....');
            }
        }
        else
        {
            return redirect()->route('login')->with('flash_message_success', 'Please login first......');
        }        
        
    }
}
