@props([
	'name',
	'id',
	'col' => 'col-12'
])

<div class="{{ $col }} mb-3">
	<x-formcomponents::label :id="$id" :name="$name" />
	<input class="form-control @error($id) is-invalid @enderror" id="{{ $id }}" name="{{ $id }}" placeholder="{{ $name }}" type="password" value="{{ old($id) }}" {{ $attributes }}>

	<x-formcomponents::error :name="$id" />
</div>