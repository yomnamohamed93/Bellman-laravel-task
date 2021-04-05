<!doctype html>
<html dir="{{app()->getLocale()=="ar"?'rtl':'ltr'}}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@yield('header')

<body class="uk-background-body {{app()->getLocale()=="ar"?'rtl':'ltr'}}">
@yield('navbar')
@yield('content')
@yield('footer')
@yield('scripts')
</body>

</html>
