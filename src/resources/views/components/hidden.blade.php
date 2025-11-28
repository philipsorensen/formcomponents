@props([
	'col' => config('formcomponents.div.class'),
	'id',
	'name',
])

<input id="{{ $id }}" name="{{ $id }}" type="hidden" {{ $attributes(['value' => old($id)]) }} >