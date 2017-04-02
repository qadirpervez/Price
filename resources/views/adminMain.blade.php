<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials._head')
  @yield('stylesheet')
</head>
<body>
    <div id="wrapper">
      @include('partials._header')
        <div id="page-wrapper">
            @yield('messages')
            @yield('content')
        </div>
    </div>
    @include('partials._footer')
    @include('partials._scripts')
    @yield('script')
</body>
</html>
