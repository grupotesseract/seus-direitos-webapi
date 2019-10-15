<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('landing-page.partials.head')

<body>
	@yield('content')

	@include('landing-page.partials.footer')

	@include('landing-page.partials.scripts')
</body>

</html>