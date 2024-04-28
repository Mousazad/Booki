@extends('layouts.base')

@section('onvan', $book->onvan)

@section('mohtava')

<div class="container mt-3">
  <h2>مشخصات کتاب</h2>
  <p>مشخصات کتاب به شرح زیر است: </p>            
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
    </tbody>
  </table>
</div>

@endsection