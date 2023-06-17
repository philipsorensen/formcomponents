@props([
	'name',
	'id',
	'class' => 'mb-1',
])

<label class="{{ $class }}" for="{{ $id }}">{{ $name }}</label>