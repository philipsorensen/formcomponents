@props([
	'col' => 'col-12',
	'id',
	'name',
])

<input id="{{ $id }}" name="{{ $id }}" type="hidden" {{ $attributes(['value' => old($id)]) }} >