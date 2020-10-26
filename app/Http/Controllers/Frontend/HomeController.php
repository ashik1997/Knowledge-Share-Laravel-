<?php

namespace App\Http\Controllers\Frontend;
use App\Category;
use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class HomeController extends Controller
{
	public function index()
    {
    	// $categories_menu = '';
    	// $categories = Category::where(['parent_id'=>0])->get();
    	
    	// foreach ($categories as $cat) {
    	// 	$sub_categories = Category::where(['parent_id'=>$cat->id])->get();
    	// 	$categories_menu .= '<li class=""><a href="'.$cat->url.'">'.$cat->name;
    	// 	if ($sub_categories->isNotEmpty()) {
    	// 		$categories_menu .= '<i class="fa fa-angle-down"></i>';
    	// 	}
    	// 	$categories_menu .= '</a>';
    	// 	if ($sub_categories->isNotEmpty()) {
    	// 		$categories_menu .=	'<div class="sub-menu"><ul>';
    		
    	// 	foreach ($sub_categories as $sub_cat) {
    	// 		$categories_menu .= '<li><a href="'.$sub_cat->url.'">'.$sub_cat->name.'</a></li>';
    	// 	}
     //            $categories_menu .=	'</ul></div>';
    	// 	}
    	// 	$categories_menu .= '</li>';
    	// }
        $books = Book::where(['status'=>1])->limit(10)->orderBy('id', 'desc')->get();
        return view('index')->with(compact('books'));

    }
    public function search()
    {
        return view('search');
    }
}
