@props([
	'col' => 'col-12',
	'default' => null,
	'id',
	'name' => null,
	'tooltip' => null,
])

<div class="{{ $col }} mb-3">
	@if ($name) <x-formcomponents::label :id="$id" :name="$name" /> @endif
	@if ($tooltip) <x-formcomponents::tooltip :url="$tooltip" /> @endif
	<select class="form-select @error($id) is-invalid @enderror" id="{{ $id }}" name="{{ $id }}">
		@if ($default) <option disabled>{{ $default }}</option> @endif
		{{ $slot }}
	</select>

	<x-formcomponents::error :name="$id" />
</div>