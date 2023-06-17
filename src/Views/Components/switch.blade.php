@props([
	'name',
	'id',
	'checked' => 0,
	'col' => 'col-12'
])

<div class="{{ $col }} mb-3">
	<div class="form-check form-switch">
		<input type="hidden" name="{{ $id }}" value="0">
		<input class="form-check-input" id="{{ $id }}" name="{{ $id }}" type="checkbox" value="1" @if ($checked == 1) checked @endif>
		<x-form.label :id="$id" :name="$name" class="form-check-label" />

		<x-form.error :name="$id" />
	</div>
</div>