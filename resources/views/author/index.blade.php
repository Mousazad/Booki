@extends('layouts.base')

@section('onvan', 'نویسندگان')

@section('mohtava')

<div class="container mt-3">
  <h2>لیست نویسندگان</h2>
  <p>لیست تمامی نویسندگانی که در پایگاه داده ما هستند به شرح زیر است: </p>
  <table class="table table-hover align-middle">
    <thead>
      <tr>
        <th>شناسه</th>
        <th>نام</th>
        <th>تاریخ ایجاد</th>
      </tr>
    </thead>
    <tbody>
		@foreach($authors as $author)
		<tr>
			<td>{{$author->id}}</td>
			<td>{{$author->name}}</td>
			<td>{{$author->created_at->toJalali()->format('H:i:s -- Y/m/d')}}</td>
		</tr>
		@endforeach
    </tbody>
  </table>
</div>



@endsection
