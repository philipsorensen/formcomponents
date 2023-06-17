@props([
	'col' => 'col-12'
])

<div class="{{ $col }}">
	<button class="btn btn-primary form-control">{{ $slot }}</button>
</div>