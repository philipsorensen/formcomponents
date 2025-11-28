@props([
	'col' => config('formcomponents.div.class'),
	'default' => null,
	'id',
	'name' => null,
	'tooltip' => null,
])

<div class="{{ $col }} {{ config('formcomponents.div.padding') }}">
	@if ($name) <x-formcomponents::label :id="$id" :name="$name" /> @endif
	@if ($tooltip) <x-formcomponents::tooltip :url="$tooltip" /> @endif
	<select class="form-select @error($id) {{ config('formcomponents.is-invalid-class') }} @enderror" id="{{ $id }}" name="{{ $id }}" {{ $attributes }}>
		@if ($default) <option disabled>{{ $default }}</option> @endif
		{{ $slot }}
	</select>

	<x-formcomponents::error :name="$id" />
</div>