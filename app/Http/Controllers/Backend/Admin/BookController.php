<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use Validator;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use App\Category;
use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function showUnapprovedBooksList($id=null)
    {
        $books = Book::where(['status'=>0])->get();

        if (!empty($id)) {
            $book = Book::find($id);
            $book->status = 1;

            $book->save();
            return redirect()->back()->with('approved_book_flash_success','Successfully approved',compact('books'));
        }
        return view('admin.view_unapproved_books')->with(compact('books'));
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
    public function showBooksList($id=null)
    {
        $books = Book::get();

        if (!empty($id)) {
            $book = Book::find($id);
            $book->status = 1;

            $book->save();
            return redirect()->back()->with('approved_book_flash_success','Successfully approved',compact('books'));
        }
        return view('admin.view_unapproved_books')->with(compact('books'));
    }
}
