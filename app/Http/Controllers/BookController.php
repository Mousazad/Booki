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
	
	public function show(Book $book)
	{
		return view('book.show', ['book' => $book]);
	}

    public function edit(Book $book)
	{
		return view('book.edit', ['book' => $book]);
	}
	
	public function store(Request $request)
	{
		$request->validate([
			'title' => 'required|string|max:255|min:4',
		],
		[
			'title.min' => 'تعداد حروف عنوان نمی تواند کمتر از 4 باشد.',
		]);
	
		Book::create(['onvan'=>$request->title]);
		
		return Redirect::back()->with('insert_message','اضافه کردن کتاب با موفقیت انجام شد.');
	}
	
	public function update(Request $request, Book $book)
	{
		$book->onvan = $request->new_title;
		$book->update();
		
		return Redirect::back()->with('message','به روزرسانی انجام شد.');
	}
	
	public function destroy(Book $book)
	{
		$book->delete();
		return Redirect::back()->with('message','حذف کتاب انجام شد.');
	}
}
