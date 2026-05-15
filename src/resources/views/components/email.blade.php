@props([
	'col' => config('formcomponents.div.class'),
	'id',
	'name' => null,
	'padding' => config('formcomponents.div.padding'),
	'tooltip' => null,
])

<div class="{{ $col }} {{ $padding }}">
	@if ($name) <x-formcomponents::label :id="$id" :name="$name" /> @endif
	@if ($tooltip) <x-formcomponents::tooltip :url="$tooltip" /> @endif
	<input class="{{ config('formcomponents.input.class') }} @error($id) {{ config('formcomponents.is-invalid-class') }} @enderror" id="{{ $id }}" inputmode="email" name="{{ $id }}" type="email" {{ $attributes(['placeholder' => $name, 'value' => old($id)]) }} >

	<x-formcomponents::error :name="$id" />
</div>