@extends("index/index_full")

@section("body")

<div class="w-100 h-100 d-flex flex-column justify-content-center align-items-center pb-5">
	<h1 class="display-1">VOCA</h1>

	@if (session('status'))
		<div class="alert alert-danger" role="alert">
			{{ session('status') }}
		</div>
	@endif
	{{-- @if (session('error'))
	  <div class="alert alert-danger text-center msg" id="error">
	  	<strong>{{ session('error') }}</strong>
	  </div>
	@endif --}}

	<form action="/login" method="POST" class="text-center">
		@csrf
		<div class="form-group">
			  <input type="email" id="input-email" name="email" placeholder="Email">
		</div>
		<div class="form-group">
			  <input type="password" id="input-password" name="password" placeholder="Password">
		</div>
		<button class="btn btn-primary" type="submit">Log In</button>
	</form>
</div>

@stop
