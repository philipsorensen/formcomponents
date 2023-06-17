@props([
	'name',
	'id',
	'col' => 'col-12'
])

<div class="{{ $col }} mb-3">
	<x-form.label :id="$id" :name="$name" />
	<input class="form-control @error($id) is-invalid @enderror" dir="rtl" id="{{ $id }}" name="{{ $id }}" type="number" {{ $attributes(['placeholder' => $name, 'value' => old($id)]) }} >

	<x-form.error :name="$id" />
</div>