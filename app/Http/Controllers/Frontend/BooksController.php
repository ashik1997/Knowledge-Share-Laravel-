<?php

namespace App\Http\Controllers\Frontend;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Book;
use App\Category;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{   
	public function showBooks($id=null)
    {
        
    	if (!empty($id)) {
            $category_name = Category::where(['id'=>$id])->pluck('name')[0];
    		$books = Book::where(['category_id'=>$id])->where(['status'=>1])->orderBy('id', 'desc')->paginate(12);
        	return view('books')->with(compact('books','category_name'));
    	}else{
    		$books = Book::where(['status'=>1])->orderBy('id', 'desc')->paginate(12);
        	return view('books')->with(compact('books'));
    	}
    	
    }
    public function showBookDetails($id)
    {
        $book = Book::where(['status'=>1])->find($id);
        $reviews = Review::where('post_id', [$id])->where(['table_name'=>'books'])->orderBy('id', 'DESC')->paginate(3);
        return view('book_details')->with(compact('book','reviews'));
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
            $review->table_name = 'books';
            $review->user_id = Auth::user()->id;
            $review->save();
            return redirect()->back()->with('add_review_flash_success','Review successfully submitted');
        }else{
            return redirect()->back()->with('add_review_flash_error','Something error.......!');
        }
    }
}
