@props([
	'col' => 'col-12',
	'id',
	'idDistinct' => null,
	'name',
	'value',
])

@php $idDistinct ??= $id; @endphp

<div class="{{ $col }} mb-3">
	<div class="form-check mt-sm-2 pt-sm-2">
		<input class="form-check-input @error($id) is-invalid @enderror" id="{{ $idDistinct }}" name="{{ $id }}" type="radio" value="{{ $value }}">
		<x-formcomponents::label :id="$idDistinct" :name="$name" class="form-check-label" />
	</div>

	<x-formcomponents::error :name="$id" />
</div>