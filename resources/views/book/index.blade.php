@extends('layouts.base')

@section('onvan', 'کتاب ها')

@section('mohtava')

<div class="container mt-3">
  <h2>لیست کتاب ها</h2>
  <p>لیست تمامی کتاب ها که در پایگاه داده ما هستند به شرح زیر است: </p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>شناسه</th>
        <th>عنوان</th>
        <th>تاریخ ایجاد</th>
        <th>حذف</th>
      </tr>
    </thead>
    <tbody>
		@foreach($books as $book) 
		<tr>  
			<td>{{$book->id}}</td>
			<td><a href="{{route('showbook',['book'=>$book->id])}}">{{$book->onvan}}</a></td>
			<td>{{$book->created_at->toJalali()->format('H:i:s -- Y/m/d')}}</td>
			<td>
				<form action="{{ route('deletebook', $book) }}" method="POST">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger btn-sm" style="font-size:80%; margin-bottom: -15px; ">حذف</button>
				</form>
			</td>
		</tr>
		@endforeach
    </tbody>
  </table>
</div>

@endsection