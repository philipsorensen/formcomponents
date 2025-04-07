@props([
	'col' => 'col-12',
	'id',
	'name' => null,
	'tooltip' => null,
])

<div class="{{ $col }} mb-3">
	@if ($name) <x-formcomponents::label :id="$id" :name="$name" /> @endif
	@if ($tooltip) <x-formcomponents::tooltip :url="$tooltip" /> @endif
	<input class="form-control @error($id) is-invalid @enderror" id="{{ $id }}" name="{{ $id }}" type="date" {{ $attributes(['placeholder' => $name, 'value' => old($id)]) }} >

	<x-formcomponents::error :name="$id" />
</div>