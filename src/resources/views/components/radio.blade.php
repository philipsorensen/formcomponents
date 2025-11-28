@props([
	'col' => config('formcomponents.div.class'),
	'id',
	'idDistinct' => null,
	'name',
	'value',
	'required' => false,
])

@php $idDistinct ??= $id; @endphp

<div class="{{ $col }} {{ config('formcomponents.div.padding') }}">
	<div class="form-check mt-sm-2 pt-sm-2">
		<input class="form-check-input @error($id) {{ config('formcomponents.is-invalid-class') }} @enderror" id="{{ $idDistinct }}" name="{{ $id }}" @if($required) required @endif type="radio" value="{{ $value }}">
		<x-formcomponents::label :id="$idDistinct" :name="$name" :class="{{ config('formcomponents.label.class') }}" />
	</div>

	<x-formcomponents::error :name="$id" />
</div>