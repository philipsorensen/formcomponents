@props([
	'col' => 'col-12',
	'default' => 'Select',
	'id',
	'name',
])

<div class="{{ $col }} mb-3">
	<x-formcomponents::label :id="$id" :name="$name" />
	<select class="form-select @error($id) is-invalid @enderror" id="{{ $id }}" name="{{ $id }}">
		<option disabled>{{ $default }}</option>
		{{ $slot }}
	</select>

	<x-formcomponents::error :name="$id" />
</div>