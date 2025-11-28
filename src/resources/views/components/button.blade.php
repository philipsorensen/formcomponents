@props([
	'class' => config('formcomponents.button.class'),
	'col' => config('formcomponents.div.class'),
])

<div class="{{ $col }} {{ config('formcomponents.div.padding') }}">
	<button class="{{ $class }}" {{ $attributes }}>{{ $slot }}</button>
</div>