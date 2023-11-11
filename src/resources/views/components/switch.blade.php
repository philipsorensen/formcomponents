@props([
	'col' => 'col-12',
	'checked' => 0,
	'id',
	'name',
])

<div class="{{ $col }} mb-3">
	<div class="form-check form-switch">
		<input type="hidden" name="{{ $id }}" value="0">
		<input class="form-check-input" id="{{ $id }}" name="{{ $id }}" type="checkbox" value="1" @if ($checked == 1) checked @endif>
		<x-formcomponents::label :id="$id" :name="$name" class="form-check-label" />

		<x-formcomponents::error :name="$id" />
	</div>
</div>