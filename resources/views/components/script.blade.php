
@props(['script'])

@once
	@push('scripts')
	  <script src="{{ $script }}" ></script>
	@endpush
@endonce
