@props([
	'class' => 'btn-primary',
	'col' => 'col-12'
])

<div class="{{ $col }} mb-3">
	<button class="btn {{ $class }} form-control">{{ $slot }}</button>
</div>