@extends('layouts.base')

@section('onvan', $book->onvan)

@section('mohtava')

<div class="container mt-3">
	@if(session()->has('message'))
	<div class="alert alert-success alert-dismissible" style="font-size:90%; width:40%;">
		<button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"></button>
		<strong>موفق!</strong> {{session('message')}}
	</div>
	@endif

	<h2>ویرایش مشخصات کتاب</h2>
	<p>مشخصات کتاب را در اینجا ویرایش کنید:</p>
	<form method='POST' action="{{route('updatebook',$book)}}">
		@csrf
		@method('PATCH')
		<table class="table">
			<tbody>
				<tr>
					<td>عنوان</td>
					<td>
						<input name='new_title' value="{{$book->onvan}}"><br><br>
					</td>
					<td>
						<button type="submit" class="btn btn-success" style="">ثبت</button>
					</td>
				</tr>
			</tbody>
		</table>
	</form>

	<h2>ویرایش نویسندگان کتاب</h2>
	<p>🔸 نویسندگان کتاب را در اینجا می بینید:</p>
	<table style="border-collapse:separate;  border-spacing: 0 1em;" class="table table-sm">
		<tbody>
			@foreach ($book->authors as $author)
			<tr style="line-height: 15px;   min-height: 15px;   height: 15px;">
				<td>{{$author->name}}</td>
				<td>
					<form id="detach_form" action="{{ route('detachbookauthor') }}" method="POST">
						@csrf
						<input type="hidden" name="book_id" value="{{$book->id}}">
						<input type="hidden" name="author_id" value="{{$author->id}}">
						<a style="text-decoration: none;" class="text-danger" href="javascript:{}" onclick="document.getElementById('detach_form').submit();">حذف</a>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<p>🔸 افزودن نویسنده برای کتاب:</p>


</div>
@endsection