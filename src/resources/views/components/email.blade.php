@props([
	'col' => 'col-12',
	'id',
	'name' => null,
])

<div class="{{ $col }} mb-3">
	@if ($name) <x-formcomponents::label :id="$id" :name="$name" /> @endif
	<input class="form-control @error($id) is-invalid @enderror" id="{{ $id }}" inputmode="email" name="{{ $id }}" type="email" {{ $attributes(['placeholder' => $name, 'value' => old($id)]) }} >

	<x-formcomponents::error :name="$id" />
</div>