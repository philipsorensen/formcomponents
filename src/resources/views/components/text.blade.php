@props([
	'col' => 'col-12',
	'id',
	'name' => null,
	'value' => old($id),
])

<div class="{{ $col }} mb-3">
	@if ($name) <x-formcomponents::label :id="$id" :name="$name" /> @endif
	<textarea class="form-control @error($id) is-invalid @enderror" id="{{ $id }}" name="{{ $id }}" {{ $attributes(['rows' => 12]) }}>{{ $value }}</textarea>
	
	<x-formcomponents::error :name="$id" />
</div>