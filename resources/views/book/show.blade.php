@extends('layouts.base')

@section('onvan', $book->onvan)

@section('mohtava')

<div class="container mt-3">
	<h2>مشخصات کتاب</h2>
	<p>مشخصات کتاب به شرح زیر است: </p>
	<img src="{{ Storage::url('cover/'.$book->filename)}}" alt=" cover image" width="250">
	<table class="table table-hover">
		<tbody>
			<tr>
				<td>شناسه</td>
				<td>{{$book->id}}</td>
			</tr>
			<tr>
				<td>عنوان</td>
				<td>{{$book->onvan}}</td>
			</tr>
			<tr>
				<td>تاریخ ایجاد</td>
				<td>{{$book->created_at->toJalali()->format('H:i:s -- Y/m/d')}}</td>
			</tr>
			<tr>
				<td>تاریخ به روزرسانی</td>
				<td>{{$book->updated_at->toJalali()->format('H:i:s -- Y/m/d')}}</td>
			</tr>
			<tr>
				<td>نویسندگان</td>
				<td>
					@if($book->authors->count() > 1)
					<ul>
						@foreach ($book->authors as $author)
						<li>{{$author->name}}</li>
						@endforeach
					</ul>
					@else
					@foreach ($book->authors as $author)
					{{$author->name}}
					@endforeach
					@endif
				</td>
			</tr>
		</tbody>
	</table>
</div>

@endsection