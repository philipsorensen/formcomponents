@props([
	'col' => 'col-12',
	'id',
	'min' => 1,
	'max' => 5,
	'name' => null,
	'step' => 1,
	'tooltip' => null,
])

<div class="{{ $col }} mb-3">
	@if ($name) <x-formcomponents::label :id="$id" :name="$name" /> @endif
	@if ($tooltip) <x-formcomponents::tooltip :url="$tooltip" /> @endif

	<input class="form-range @error($id) is-invalid @enderror" id="{{ $id }}" max="{{ $max }}" min="{{ $min }}" name="{{ $id }}" step="{{ $step }}" type="range" {{ $attributes(['value' => old($id)]) }} />
	<x-formcomponents::error :name="$id" />
</div>