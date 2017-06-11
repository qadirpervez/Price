<!-- header -->
	<div class="header">
		<div class="container">
			<div class="header-grid main-div-header">
				<div class="header-grid-right animated wow slideInLeft" data-wow-delay=".5s">
					<div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
						<h1><a href="{{ route('home') }}">Hike Market<span>compare &amp; buy</span></a></h1>
					</div>
				</div>
				<div class="search-form-div">
					<form class="form-inline" method="get" action="{{ route('guest.search') }}">
						<div class="form-group">
							{{ csrf_field() }}
							<input class="search-form-input" name="search" value="{{ isset($_GET['search']) ? $_GET['search'] : ''}}" size="80" placeholder="Search For any product...">
							<button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						</div>
					</form>
				</div>
				<div class="header-grid-left animated wow slideInRight pages-static" data-wow-delay=".5s">
					<ul class="">
						<li><i class="glyphicon glyphicon-lock" aria-hidden="true"></i><a href="#">Terms of use</a></li>
						<li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="#">Privacy policy</a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="logo-nav">
					<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="container-fluid">
						<span class="menu"><img src="{{ URL::asset('img/menu.png') }}"></span>
						<div class="clearfix"></div>
				<nav id="cbp-hrmenu" class="cbp-hrmenu">
					<ul class="res">
						@foreach ($mains as $main)

							<li>
								<a href="#" class="lists">{{ $main->name }}</a>
								<div class="cbp-hrsub ">
									<div class="cbp-hrsub-inner row">
										<div class="nav-click-list col-md-3">
											<ul>
												@foreach ($main->Categories as $category_nav_main)
													<li><a href="{{ route('category.guestProducts', $category_nav_main->id) }}">{{ $category_nav_main->name }}</a></li>
												@endforeach
											</ul>
										</div>
										<div class="nav-bar-category-img ">
											<a href="{{ $main->sponsor1_url }}">
												<img  src="{{ $main->sponsor_pic1_url }}" class="img-responsive">
											</a>
										</div>

										<div class="nav-bar-category-img ">
											<a href="{{ $main->sponsor2_url }}">
												<img  src="{{ $main->sponsor_pic2_url }}" class="img-responsive">
											</a>
										</div>
										<div class="nav-bar-category-img ">
											<a href="{{ $main->sponsor3_url }}">
												<img  src="{{ $main->sponsor_pic3_url }}" class="img-responsive">
											</a>
										</div><!-- /cbp-hrsub-inner -->
								</div><!-- /cbp-hrsub -->
							</li>

						@endforeach
					</ul>
					<script>
						$( "span.menu" ).click(function() {
						 	$( "ul.res" ).slideToggle( 300, function() {
						 	// Animation complete.
							});
						});
					</script>
				</nav>
			</div>
					</nav>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
<!-- //header -->
