<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request){
		$user = auth()->user();
		$b = Book::all();
		return view('book.index', ['books' => $b, 'user' => $user]);
	}

    public function edit(Book $book)
	{
		return view('book.edit', ['book' => $book]);
	}
	
	public function update(Request $request, Book $book)
	{
		$book->onvan = $request->new_title;
		$book->update();
		
		return Redirect::back()->with('message','به روزرسانی انجام شد.');
	}
}
