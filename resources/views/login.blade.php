@extends("index")

@section("body")

<div class="flex-row flex-center">

	<form action="/action_page.php">
	  <label for="email">Email:</label>
	  <input type="email" id="input-email" name="email" placeholder="Email">

	  <label for="password">Password:</label>
	  <input type="password" id="input-password" name="password" placeholder="Password"><br><br>

		<input type="submit" value="Submit">
	</form>
</div>


@stop
