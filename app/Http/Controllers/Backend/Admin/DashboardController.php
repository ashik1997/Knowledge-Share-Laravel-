<?php

namespace App\Http\Controllers\Backend\Admin;
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
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $downloads = Download::orderBy('id', 'DESC')->paginate(3);
        return view('admin.dashboard')->with(compact('downloads'));
    }
}
