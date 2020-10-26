<?php

namespace App\Http\Controllers\Backend\User;
use Auth;
use Validator;
use App\User;
use App\Download;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $downloads = Download::where(['user_id'=>Auth::user()->id])->orderBy('id', 'DESC')->paginate(3);
        return view('user.dashboard')->with(compact('downloads'));
    }
}
