@props([
	'url'
])

<a class="{{ config('formcomponents.tooltip.class') }}" href="{{ $url }}" target="_blank">
	<x-bootstrapicons::info-circle />
</a>