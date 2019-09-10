<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	@include('landing-page.head')

	<body>
		@yield('content')

		@include('landing-page.scripts')
	</body>
</html>
