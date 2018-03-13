<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('layout-welcome.head')

    <body>
    	@include('layout-welcome.nav')

		@yield('content')

        @include('layout-welcome.footer')

        @include('layout-welcome.scripts')	
    </body>
</html>
