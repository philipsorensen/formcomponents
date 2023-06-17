@props([
	'col' => 'col-12',
	'id',
	'name',
])

<div class="{{ $col }} mb-3">
	<x-formcomponents::label :id="$id" :name="$name" />
	<input class="form-control @error($id) is-invalid @enderror" id="{{ $id }}" name="{{ $id }}" type="text" {{ $attributes(['placeholder' => $name, 'value' => old($id)]) }} >

	<x-formcomponents::error :name="$id" />
</div>