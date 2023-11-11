@props([
	'accept' => 'text/plain',
	'col' => 'col-12',
	'id' => 'file',
	'name' => null,
])

<div class="{{ $col }} mb-3">
	@if ($name) <x-formcomponents::label :id="$id" :name="$name" /> @endif
	<input accept="{{ $accept }}" class="form-control @error($id) is-invalid @enderror" id="{{ $id }}" name="{{ $id }}" type="file" {{ $attributes }}>

	<x-formcomponents::error :name="$id" />
</div>