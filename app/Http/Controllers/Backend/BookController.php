<?php

namespace App\Http\Controllers\Backend;
use Auth;
use Validator;
use App\Admin;
use App\User;
use Illuminate\Support\Facades\Hash;

use App\Category;
use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
class BookController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // } 
    public function showBookPostForm(Request $request)
    {
    	$categories = Category::get();
        if ($request->isMethod('post')) {
            $this->validate($request,[
                'category_id' => 'required',
                'title' => 'required',
                'pdf_file' => 'required|mimes:pdf,xps',
                'image1' => 'required|mimes:jpeg,jpg,png,gif|max:2024|dimensions:max_width=350,max_height=450',
                'image2' => 'mimes:jpeg,jpg,png,gif|max:2024',
                'image3' => 'mimes:jpeg,jpg,png,gif|max:2024',
            ]);
            // $date = $request->all();
            $book = new Book;
            $book->category_id = $request->category_id;
            $book->title = $request->title;
            $book->sub_title = $request->sub_title;
            $book->author = $request->author;
            $book->description = $request->description;
            $book->posted_by_id = Auth::user()->id;
            if ($request->hasFile('pdf_file')) {
                $dir = 'books/';
                $extension = strtolower($request->file('pdf_file')->getClientOriginalExtension()); // get image extension
                $fileName = str_random() . '.' . $extension; // rename image
                $request->file('pdf_file')->move($dir, $fileName);
                $book->pdf_file = $fileName;
            }
            if ($request->hasFile('image1')) {
                $dir = 'images/books/';
                $extension = strtolower($request->file('image1')->getClientOriginalExtension()); // get image extension
                $fileName = str_random() . '.' . $extension; // rename image
                $request->file('image1')->move($dir, $fileName);
                $book->image1 = $fileName;
            }
            if ($request->hasFile('image2')) {
                $dir = 'images/books/';
                $extension = strtolower($request->file('image2')->getClientOriginalExtension()); // get image extension
                $fileName = str_random() . '.' . $extension; // rename image
                $request->file('image2')->move($dir, $fileName);
                $book->image2 = $fileName;
            }
            if ($request->hasFile('image3')) {
                $dir = 'images/books/';
                $extension = strtolower($request->file('image3')->getClientOriginalExtension()); // get image extension
                $fileName = str_random() . '.' . $extension; // rename image
                $request->file('image3')->move($dir, $fileName);
                $book->image3 = $fileName;
            }
            
            $book->save();
            return redirect(route('user.add-book'))->with('add_book_flash_success','Successfully addeded');
        }
    	return view('user.add_new_book')->with(compact('categories'));
    }

    public function showBooksList()
    {
        $posted_by_id = Auth::user()->id;
        $books = Book::where(['posted_by_id'=>$posted_by_id])->get();
        return view('user.show_books')->with(compact('books'));
    }
    public function showEditBookPostForm(Request $request,$id)
    {
        $book = Book::find($id);
        $categories = Category::where(['parent_id'=>1])->get();

        if ($request->isMethod('post')) {
            $this->validate($request,[
                'category_id' => 'required',
                'title' => 'required',
            ]);
            $book->category_id = $request->category_id;
            $book->title = $request->title;
            $book->sub_title = $request->sub_title;
            $book->author = $request->author;
            $book->description = $request->description;
            $book->posted_by_id = Auth::user()->id;
            if ($request->hasFile('pdf_file')) {
                $dir = 'books/';
                if (!empty($book->pdf_file)) {
                    unlink($dir.$book->pdf_file);
                }
                $extension = strtolower($request->file('pdf_file')->getClientOriginalExtension()); // get image extension
                $fileName = str_random() . '.' . $extension; // rename image
                $request->file('pdf_file')->move($dir, $fileName);
                $book->pdf_file = $fileName;
            }
            if ($request->hasFile('image1')) {
                if (!empty($book->image1)) {
                    unlink('images/books/'.$book->image1);
                }
                $dir = 'images/books/';
                $extension = strtolower($request->file('image1')->getClientOriginalExtension()); // get image extension
                $fileName = str_random() . '.' . $extension; // rename image
                $request->file('image1')->move($dir, $fileName);
                $book->image1 = $fileName;
            }
            if ($request->hasFile('image2')) {
                if (!empty($book->image2)) {
                    unlink('images/books/'.$book->image2);
                }
                $dir = 'images/books/';
                $extension = strtolower($request->file('image2')->getClientOriginalExtension()); // get image extension
                $fileName = str_random() . '.' . $extension; // rename image
                $request->file('image2')->move($dir, $fileName);
                $book->image2 = $fileName;
            }
            if ($request->hasFile('image3')) {
                if (!empty($book->image3)) {
                    unlink('images/books/'.$book->image3);
                }
                $dir = 'images/books/';
                $extension = strtolower($request->file('image3')->getClientOriginalExtension()); // get image extension
                $fileName = str_random() . '.' . $extension; // rename image
                $request->file('image3')->move($dir, $fileName);
                $book->image3 = $fileName;
            }
            
            $book->save();
            return redirect()->back()->with('upadte_book_flash_success','Successfully updated');
        }
        return view('user.edit_book')->with(compact('categories','book'));
    }
    public function deleteBook($id=null)
    {
        if (!empty($id)) {
            $data = Book::FindOrFail($id);
            if (!empty($data->image1)) {
                unlink('images/books/'.$data->image1);
            }
            if (!empty($data->image2)) {
                unlink('images/books/'.$data->image2);
            }
            if (!empty($data->image3)) {
                unlink('images/books/'.$data->image3);
            }
            Book::find($id)->delete();
            return redirect()->back()->with('delete_book_flash_success','Book successfully deleted');
        }
        
    }
}
