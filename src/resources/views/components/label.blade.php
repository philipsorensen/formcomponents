@props([
	'class' => config('formcomponents.label.class'),
	'id',
	'name',
])

<label class="{{ $class }}" for="{{ $id }}" {{ $attributes }}>{!! $name !!}</label>