<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <title>کتابی</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="{{url('css/Vazirmatn-font-face.css')}}" rel="stylesheet" type="text/css" />
</head>
<body style="font-family: Vazirmatn, sans-serif">

<div class="container mt-3">
 <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="/images/logo2.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> 
    </a>
	<div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{url('book')}}">کتاب ها</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('author')}}">نویسندگان</a>
        </li>
        </li>
      </ul>
	  
	@if (Route::has('login'))
	
	
	
			@auth
			
			
			
		<div class="dropdown">
		<button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
			پنل کاربری
		</button>
		  <ul class="dropdown-menu">
			<li><a
					href="{{ url('/dashboard') }}"
					class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
				>
					داشبرد
				</a> </li>
		  </ul>
		</div> 

			
			
				
			@else
			
			
					<div class="dropdown">
		<button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
			پنل کاربری
		</button>
		  <ul class="dropdown-menu">
			<li><a
					href="{{ route('login') }}"
					class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
				>
					ورود
				</a></li>
				@if (Route::has('register'))
			<li>	<a
						href="{{ route('register') }}"
						class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
					>
						ثبت نام
					</a></li>
			@endif
		  </ul>
		</div> 
			@endauth
		</nav>
	@endif 
	  
    </div>
  </div>
</nav>


 <footer>
 <hr>
  <p class="text-center">طراحی توسط استاد در 1403</p>
</footer> 

</div>

</body>
</html>
