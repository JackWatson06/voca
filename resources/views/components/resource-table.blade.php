@props(['resources', 'headers', 'properties', 'route' => null])

<x-table class="table-resource">
		<x-slot name="headers">
      		@foreach($headers as $header)
				<th scope="col">{{ $header }}</th>
			@endforeach
    </x-slot>
		<x-slot name="data">
			@foreach($resources as $resource)
				{{-- If we want this table to link to the specific resource set the route. --}}
				@if($route)
					<tr class="row-clickable" data-href='{{ route($route, [ 'id' => $resource->id ]) }}'>
				@else
					<tr>
				@endif
			    @foreach($properties as $property)
						@if ($loop->index == 0)
							<td scope="row">{{ $resource->$property }}</td>
						@else
							<td>{{ $resource->$property }}</td>
						@endif
					@endforeach
				</tr>
			@endforeach
	 </x-slot>
</x-table>
