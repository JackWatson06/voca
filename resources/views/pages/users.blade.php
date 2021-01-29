@extends("index/index")

@section("body")

<div class="w-100 h-100 d-flex flex-column justify-content-center align-items-center pb-5">

	<h1 class="display-1">VOCA</h1>

	<x-resource-table
		:headers="['ID', 'Name', 'Email']"
		:resources="$users"
		:properties="['id', 'name', 'email']"
		route="web.users.show"/>

</div>

@stop
