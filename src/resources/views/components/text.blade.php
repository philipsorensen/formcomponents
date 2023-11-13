@props([
	'col' => 'col-12',
	'id',
	'name' => null,
	'tooltip' => null,
	'value' => old($id),
])

<div class="{{ $col }} mb-3">
	@if ($name) <x-formcomponents::label :id="$id" :name="$name" /> @endif
	@if ($tooltip) <x-formcomponents::tooltip :url="$tooltip" /> @endif
	<textarea class="form-control @error($id) is-invalid @enderror" id="{{ $id }}" name="{{ $id }}" {{ $attributes(['rows' => 12]) }}>{{ $value }}</textarea>
	
	<x-formcomponents::error :name="$id" />
</div>