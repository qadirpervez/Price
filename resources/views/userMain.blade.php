<!DOCTYPE html>
<html lang="en-US">
  <head>
    @include('partials._frontHead')
    @yield('stylesheet')
  </head>
<body>
  @include('partials._frontHeader')
  <div class="row">
	   <aside class="col-md-2">
       @include('partials._frontAside')
     </aside>
	   <div class="col-md-10">
		   @yield('content')
		</div>
	</div>
    @include('partials._frontFooter')
    @include('partials._frontScripts')
    @yield('script')
  </body>
</html>
