@extends('layouts.base')

@section('onvan', $book->onvan)

@section('mohtava')

<div class="container mt-3">
  @if(session()->has('message')) 
	<div class="toast show">
		<div class="toast-header">
			<button type="button" class="btn-close" data-bs-dismiss="toast"></button>
		</div>
		<div class="toast-body">
			 <p style="color:green">{{session('message')}}</p>
		</div>
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