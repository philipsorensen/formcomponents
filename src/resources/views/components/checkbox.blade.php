@props([
	'checked' => 0,
	'col' => config('formcomponents.div.class'),
	'id',
	'name',
])

<div class="{{ $col }} {{ config('formcomponents.div.padding') }}">
	<div class="form-check mt-sm-2 pt-sm-2">
		<input type="hidden" name="{{ $id }}" value="0" />
		<input class="form-check-input @error($id) {{ config('formcomponents.is-invalid-class') }} @enderror" id="{{ $id }}" name="{{ $id }}" type="checkbox" value="1" @if ($checked == 1) checked @endif />
		<x-formcomponents::label :id="$id" :name="$name" :class="config('formcomponents.label.class')" />
	</div>

	<x-formcomponents::error :name="$id" />
</div>