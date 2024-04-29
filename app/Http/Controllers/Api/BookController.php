<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
	public function get(Request $request)
	{
		$b = Book::find($request->id);
		return $b;
	}

}
