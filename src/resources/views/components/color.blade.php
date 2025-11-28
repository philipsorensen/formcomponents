@props([
	'col' => config('formcomponents.div.class'),
	'id',
	'name' => null,
	'tooltip' => null,
])

<div class="{{ $col }} {{ config('formcomponents.div.padding') }}">
    @if ($name) <x-formcomponents::label :id="$id" :name="$name" /> @endif
    @if ($tooltip) <x-formcomponents::tooltip :url="$tooltip" /> @endif
    <input class="form-control @error($id) {{ config('formcomponents.is-invalid-class') }} @enderror" id="{{ $id }}" name="{{ $id }}" type="color" {{ $attributes(['placeholder' => $name, 'value' => old($id)]) }} >

    <x-formcomponents::error :name="$id" />
</div>

<script>
    const colorPicker = document.getElementById('{{ $id }}');
    colorPicker.addEventListener('input', function () {
        selectedColor.textContent = this.value;
    });
</script>