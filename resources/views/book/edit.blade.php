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
	<p><strong>🔸 نویسندگان کتاب را در اینجا می بینید:</strong></p>
	<table class="table table-sm align-middle">
		<tbody>
			@foreach ($book->authors as $author)
			<tr>
				<td>{{$author->name}}</td>
				<td>
					<form id="detach_form{{$author->id}}" action="{{ route('detachbookauthor') }}" method="POST" class="mb-0">
						@csrf
						<input type="hidden" name="book_id" value="{{$book->id}}">
						<input type="hidden" name="author_id" value="{{$author->id}}">
						<a style="text-decoration: none;" class="text-danger" href="javascript:{}" onclick="document.getElementById('detach_form{{$author->id}}').submit();">حذف</a>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<p><strong>🔸 افزودن نویسنده برای کتاب:</strong></p>
	<input hidden id="csrfToken" value="{{csrf_token()}}">
	<table class="table">
		<tbody>
			<tr>
				<td>جستجوی نام نویسنده</td>
				<td>
					<input id='key' placeholder="بخشی نام نویسنده"><br><br>
				</td>
				<td>
					<button type="submit" onclick="handleSearch();" class="btn btn-success">جستجو</button>
				</td>
			</tr>
		</tbody>
	</table>
	<table class="table table-sm align-middle">
		<tbody id="search-result">

		</tbody>
	</table>
</div>
<script>
	function handleSearch() {
		const key = document.getElementById('key').value;
		const token = document.getElementById('csrfToken').value;
		const params = 'key=' + key;
		const xhttp = new XMLHttpRequest();
		xhttp.open("POST", "{{route('searchauthor')}}", true);
		xhttp.setRequestHeader('X-CSRF-TOKEN', token);
		xhttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
		xhttp.send(params);
		xhttp.onload = function() {
			const authors = JSON.parse(xhttp.responseText);
			const tbody = document.getElementById("search-result");
			tbody.innerHTML = "";
			for (author of authors) {
				const tr = document.createElement("tr");
				const td1 = document.createElement("td");
				td1.innerText = author.name;
				const td2 = document.createElement("td");

				let Text = "<form id=\"attach_form" + author.id + "\" action=\"{{ route('attachbookauthor') }}\" method=\"POST\" class=\"mb-0\">";
				Text += "<input type=\"hidden\" name=\"_token\" value=\"" + token + "\" autocomplete=\"off\">";
				Text += "<input type=\"hidden\" name=\"book_id\" value=\"{{$book->id}}\">";
				Text += "<input type=\"hidden\" name=\"author_id\" value=\"" + author.id + "\">";
				Text += "<a style=\"text-decoration: none;\" class=\"text-danger\" href=\"javascript:{}\" onclick=\"document.getElementById('attach_form" + author.id + "').submit();\">افزودن</a>";
				Text += "</form>";
				td2.innerHTML = Text;
				tr.appendChild(td1);
				tr.appendChild(td2);
				tbody.appendChild(tr);
			}
		}
	}
</script>
@endsection