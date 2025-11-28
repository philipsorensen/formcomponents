@props([
	'accept' => 'text/plain',
	'col' => config('formcomponents.div.class'),
	'id' => 'file',
	'name' => null,
	'tooltip' => null,
])

<div class="{{ $col }} {{ config('formcomponents.div.padding') }}">
	@if ($name) <x-formcomponents::label :id="$id" :name="$name" /> @endif
	@if ($tooltip) <x-formcomponents::tooltip :url="$tooltip" /> @endif
	<input accept="{{ $accept }}" class="form-control @error($id) {{ config('formcomponents.is-invalid-class') }} @enderror" id="{{ $id }}" name="{{ $id }}" type="file" {{ $attributes }}>

	<x-formcomponents::error :name="$id" />
</div>