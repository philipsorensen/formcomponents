@props([
	'class' => 'btn-primary',
	'col' => 'col-12'
])

<div class="{{ $col }}">
	<button class="btn {{ $class }} form-control">{{ $slot }}</button>
</div>