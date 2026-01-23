@props([
	'col' => config('formcomponents.div.class'),
	'checked' => 0,
	'id',
	'name',
])

<div class="{{ $col }} {{ config('formcomponents.div.padding') }}">
	<div class="form-check form-switch">
		<input type="hidden" name="{{ $id }}" value="0">
		<input class="form-check-input" id="{{ $id }}" name="{{ $id }}" type="checkbox" value="1" @if ($checked == 1) checked @endif>
		<x-formcomponents::label :id="$id" :name="$name" :class="config('formcomponents.label.class')" />

		<x-formcomponents::error :name="$id" />
	</div>
</div>