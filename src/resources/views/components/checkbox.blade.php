@props([
	'checked' => 0,
	'col' => 'col-12'
	'id',
	'name',
])

<div class="{{ $col }} mb-3">
	<div class="form-check mt-sm-2 pt-sm-2">
		<input type="hidden" name="{{ $id }}" value="0">
		<input class="form-check-input @error($id) is-invalid @enderror" id="{{ $id }}" name="{{ $id }}" type="checkbox" value="1" @if ($checked == 1) checked @endif>
		<x-formcomponents::label :id="$id" :name="$name" class="form-check-label" />
	</div>

	<x-formcomponents::error :name="$id" />
</div>