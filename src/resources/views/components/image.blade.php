@props([
	'col' => 'col-12',
	'id',
	'name' => null,
])

<div class="{{ $col }} mb-3">
	@if ($name) <x-formcomponents::label :id="$id" :name="$name" /> @endif
	<input accept="image/*" class="form-control @error($id) is-invalid @enderror" id="{{ $id }}" name="{{ $id }}" type="file" {{ $attributes }}>

	<x-formcomponents::error :name="$id" />
</div>