@props([
	'col' => 'col-12',
	'default' => 'Vælg',
	'id',
	'name',
	'options',
])

<div class="{{ $col }} mb-3">
	<x-form.label :id="$id" :name="$name" />
	<select class="form-select @error($id) is-invalid @enderror" id="{{ $id }}" name="{{ $id }}">
		<option disabled>{{ $default }}</option>
		{{ $slot }}
	</select>

	<x-form.error :name="$id" />
</div>