<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Random;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
	public function index(Request $request)
	{
		$user = auth()->user();
		$b = Book::all();
		return view('book.index', ['books' => $b, 'user' => $user]);
	}

	public function show(Book $book)
	{
		$book->load('authors');
		return view('book.show', ['book' => $book]);
	}

	public function edit(Book $book)
	{
		$book->load('authors');
		return view('book.edit', ['book' => $book]);
	}

	public function store(Request $request)
	{
		$request->validate(
			[
				'title' => 'required|string|max:255|min:4',
				'cover' => 'required|mimes:jpg,jpeg,gif,bmp,png|max:2048',
			],
			[
				'title.min' => 'تعداد حروف عنوان نمی تواند کمتر از 4 باشد.',
			]
		);

		$coverfile = $request->file('cover');
		$filename = $coverfile->getClientOriginalName();
		$newfilename = sha1(time() . rand(1000000, 9999999) . $filename) . '.' . $coverfile->extension();
		Storage::putFileAs('public/cover', $coverfile, $newfilename);

		Book::create(['onvan' => $request->title, 'created_by'=> auth()->user()->id, 'filename' => $newfilename]);

		return Redirect::back()->with('insert_message', 'اضافه کردن کتاب با موفقیت انجام شد.');
	}

	public function update(Request $request, Book $book)
	{
				
        // if (! Gate::allows('update-book', $book)) {
        //		 abort(403);
        // }			

        if ($request->user()->cannot('update', $book)) {
            abort(403);
        }
 		
		$book->onvan = $request->new_title;
		$book->update();

		return Redirect::back()->with('message', 'به روزرسانی انجام شد.');
	}

	public function destroy(Book $book)
	{
		$book->delete();
		return Redirect::back()->with('message', 'حذف کتاب انجام شد.');
	}
	public function detach_author(Request $request)
	{
		$request->validate(
			[
				'author_id' => 'required|int|min:1',
				'book_id' => 'required|int|min:1',
			]
		);
		$book = Book::find($request->book_id);
		$book->authors()->detach($request->author_id);

		return Redirect::back();
	}

	public function attach_author(Request $request)
	{
		$request->validate(
			[
				'author_id' => 'required|int|min:1',
				'book_id' => 'required|int|min:1',
			]
		);
		$book = Book::with('authors')->find($request->book_id);
		if ($book->authors->where('id', $request->author_id)->count() == 0)
			$book->authors()->attach($request->author_id);

		return Redirect::back();
	}
}
