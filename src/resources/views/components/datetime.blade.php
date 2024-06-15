@props([
	'col' => 'col-12',
	'id',
	'max' => '2028-06-30T16:30',
	'min' => '2018-06-30T16:30',
	'name' => null,
	'pattern' => '[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}',
	'tooltip' => null,
])

<div class="{{ $col }} mb-3">
	@if ($name) <x-formcomponents::label :id="$id" :name="$name" /> @endif
	@if ($tooltip) <x-formcomponents::tooltip :url="$tooltip" /> @endif
	<input class="form-control @error($id) is-invalid @enderror" id="{{ $id }}" max="{{ $max }}" min="{{ $min }}" name="{{ $id }}" pattern="{{ $pattern }}" type="datetime-local" {{ $attributes(['placeholder' => $name, 'value' => old($id)]) }} >

	<x-formcomponents::error :name="$id" />
</div>