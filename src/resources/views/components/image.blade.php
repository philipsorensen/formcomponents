@props([
	'col' => 'col-12',
	'id',
	'name',
])

<div class="{{ $col }} mb-3">
	<x-formcomponents::label :id="$id" :name="$name" />
	<input accept="image/*" class="form-control @error($id) is-invalid @enderror" id="{{ $id }}" name="{{ $id }}" type="file" {{ $attributes }}>

	<x-formcomponents::error :name="$id" />
</div>