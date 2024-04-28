<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request){
		$user = auth()->user();
		$b = Book::all();
		return view('book.index', ['books' => $b, 'user' => $user]);
	}
	
	public function show(Book $book){
		return view('book.show', ['book' => $book]);
	}
	
	public function destroy(Book $book)
	{
		$book->delete();
		return Redirect::back();
	}
}
