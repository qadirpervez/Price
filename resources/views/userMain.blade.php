<!DOCTYPE html>
<html lang="en-US">
  <head>
    @include('partials._frontHead')
    @yield('stylesheet')
  </head>
  <body>
    @include('partials._frontHeader')
    @yield('content')
    @include('partials._frontFooter')
    @include('partials._frontScripts')
    @yield('script')
  </body>
</html>
