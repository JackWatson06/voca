<table {{ $attributes->merge(['class' => 'table table-striped']) }}>
    <thead class="thead-dark">
			<tr>
				{{ $headers }}
			</tr>
		</thead>
		<tbody>
				{{ $data }}
		</tbody>
</table>


{{-- Example use of this class --}}
{{-- <x-table>
		<x-slot name="headers">
        <th>ID</th>
				<th>Name</th>
				<th>Email</th>
    </x-slot>
		<x-slot name="data">
			@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
				</tr>
			@endforeach
	 </x-slot>
	</x-table> --}}
