@props(['name'])

@error($name)
	<span class="{{ config('formcomponents.error.class') }}" role="alert">
		<strong>{{ $message }}</strong>
	</span>
@enderror