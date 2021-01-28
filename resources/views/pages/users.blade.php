@extends("index/index")

@section("body")

<div class="w-100 h-100 d-flex flex-column justify-content-center align-items-center pb-5">
	<h1 class="display-1">VOCA</h1>
	@foreach ($users as $user)
		<h2>{{ $user->name }}</h2>
		<ul>
			<li>{{ $user->id }}</li>
			<li>{{ $user->email }}</li>
		</ul>
	@endforeach
</div>

@stop
