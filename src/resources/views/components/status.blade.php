@if (session('error'))
	<div class="{{ config('formcomponents.alert.danger.class') }}" role="alert">
		{{ session('error') }}
	</div>
@endif
@if (session('success'))
	<div class="{{ config('formcomponents.alert.success.class') }}" role="alert">
		{{ session('success') }}
	</div>
@endif