<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('landing-page.head')

<body>
	@yield('content')

	@include('landing-page.scripts')

	@include('landing-page.partials.footer')
</body>

</html>