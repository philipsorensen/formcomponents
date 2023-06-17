@props([
	'class' => 'mb-1',
	'id',
	'name',
])

<label class="{{ $class }}" for="{{ $id }}">{{ $name }}</label>