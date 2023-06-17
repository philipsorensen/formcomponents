@props([
	'name',
	'id',
	'col' => 'col-12',
	'value' => old($id),
])

<div class="{{ $col }} mb-3">
	<x-form.label :id="$id" :name="$name" />
	<textarea class="form-control @error($id) is-invalid @enderror" id="{{ $id }}" name="{{ $id }}" rows="12">{{ $value }}</textarea>
	
	<x-form.error :name="$id" />
</div>