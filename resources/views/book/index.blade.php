@extends('layouts.base')

@section('onvan', 'کتاب ها')

@section('mohtava')

<div class="container mt-3">
 @if(session()->has('message')) 
	<div class="alert alert-danger alert-dismissible" style="font-size:90%; width:40%;">
		<button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"></button>
		<strong>موفق!</strong> {{session('message')}}
	</div>
 @endif

  <h2>لیست کتاب ها</h2>
  <p>لیست تمامی کتاب ها که در پایگاه داده ما هستند به شرح زیر است: </p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ردیف</th>
        <th>عنوان</th>
        <th>تاریخ ایجاد</th>
        <th>ویرایش</th>
        <th>حذف</th>
      </tr>
    </thead>
    <tbody>		
		@php ($i=0)
		@foreach($books as $book)
		@php ($i++)
		<tr>  
			<td>{{$i}}</td>
			<td><a href="{{route('showbook', $book)}}">{{$book->onvan}}</a></td>
			<td>{{$book->created_at->toJalali()->format('H:i:s -- Y/m/d')}}</td>
			<td><a href="{{route('editbook', $book)}}">ویرایش</a></td>
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
  <hr>
  
   @if(session()->has('insert_message')) 
	<div class="alert alert-success alert-dismissible" style="font-size:90%; width:40%;">
		<button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"></button>
		<strong>موفق!</strong> {{session('insert_message')}}
	</div>
  @endif

  <h2>افزودن کتاب جدید</h2>
	<p>مشخصات کتاب مورد نظر را وارد کنید:</p>            
	<form method='POST' action="{{route('insertbook')}}">
	@csrf
	  <table class="table">
		<tbody>
			<tr>  
				<td>عنوان</td>
				<td>
					<input name='title' placeholder="عنوان کتاب"><br><br>
				</td>
			</tr>
		</tbody>
	  </table>
		@if ($errors->any())
			@foreach ($errors->all() as $error)
				<p style="color:red">{{$error}}</p>
			@endforeach
		@endif
	  
	  <button type="submit" class="btn btn-success" style="">ثبت</button>
	</form>
  
  
</div>

@endsection