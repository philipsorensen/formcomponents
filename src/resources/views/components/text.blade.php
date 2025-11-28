@props([
	'col' => config('formcomponents.div.class'),
	'id',
	'name' => null,
	'tooltip' => null,
	'value' => old($id),
])

<div class="{{ $col }} {{ config('formcomponents.div.padding') }}">
	@if ($name) <x-formcomponents::label :id="$id" :name="$name" /> @endif
	@if ($tooltip) <x-formcomponents::tooltip :url="$tooltip" /> @endif
	<textarea class="{{ config('formcomponents.textarea.class') }} @error($id) {{ config('formcomponents.is-invalid-class') }} @enderror" id="{{ $id }}" name="{{ $id }}" {{ $attributes(['rows' => 12]) }}>{{ $value }}</textarea>
	
	<x-formcomponents::error :name="$id" />
</div>