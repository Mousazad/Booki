<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
	public function get(Request $request)
	{
		$request->validate([
			'id' => 'required|int|min:1',
		]);
		$b = Book::find($request->id);
		$u = Auth::user();
		return ['book'=>$b,'user'=>$u];
	}

}
