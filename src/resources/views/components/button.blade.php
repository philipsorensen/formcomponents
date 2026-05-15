@props([
	'class' => config('formcomponents.button.class'),
	'col' => config('formcomponents.div.class'),
	'padding' => config('formcomponents.div.padding'),
])

<div class="{{ $col }} {{ $padding }}">
	<button class="{{ $class }}" {{ $attributes }}>{{ $slot }}</button>
</div>