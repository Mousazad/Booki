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
			</tr>
		</tbody>
	  </table>
	  <button type="submit" class="btn btn-success" style="">ثبت</button>
	</form>
</div>

@endsection