<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">Hike Market</a>
    </div>
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>{{ auth()->user()->name }}<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="{{ route('logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="nav navbar-right top-nav " >
      <div class="row">
        <form class="navbar-form " method="get" action="{{ route('admin.search') }}">
          {{ csrf_field() }}
          <div class="input-group">
            <input type="text" class="form-control" name="search" value="{{ isset($_GET['search']) ? $_GET['search'] : ''}}" size="80" placeholder="Search For any product...">
            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="{{ Request::path() == 'admin' ? 'active' : '' }}">
                <a href="{{ route('admin') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li class="{{ Request::path() == 'admin/main_category' ? 'active' : '' }}">
                <a href="{{ route('mainCategory.index') }}"><i class="fa fa-fw fa-list"></i>List Main Categories</a>
            </li>
            <li class="{{ Request::path() == 'admin/category/create' ? 'active' : '' }}">
                <a href="{{ route('category.create') }}"><i class="fa fa-fw fa-th-list"></i>Create Category</a>
            </li>
            <li class="{{ Request::path() == 'admin/category' ? 'active' : '' }}">
                <a href="{{ route('category.index') }}"><i class="fa fa-fw fa-list"></i>List Categories</a>
            </li>
            <li class="{{ Request::path() == 'admin/subCategory/create' ? 'active' : '' }}">
                <a href="{{ route('subCategory.create') }}"><i class="fa fa-fw fa-th-list"></i>Create Sub Category</a>
            </li>
            <li class="{{ Request::path() == 'admin/subCategory' ? 'active' : '' }}">
                <a href="{{ route('subCategory.index') }}"><i class="fa fa-fw fa-list"></i>List Sub Categories</a>
            </li>
            <li class="{{ Request::path() == 'admin/sellerData/create' ? 'active' : '' }}">
                <a href="{{ route('sellerData.create') }}"><i class="fa fa-fw fa-plus"></i>Add a Seller</a>
            </li>
            <li class="{{ Request::path() == 'admin/sellerData' ? 'active' : '' }}">
                <a href="{{ route('sellerData.index') }}"><i class="fa fa-fw fa-list"></i>List All Sellers</a>
            </li>
            <li class="{{ Request::path() == 'admin/product/create' ? 'active' : '' }}">
                <a href="{{ route('product.create') }}"><i class="fa fa-fw fa-plus"></i>Add New Product </a>
            </li>
            <li class="{{ Request::path() == 'admin/product' ? 'active' : '' }}">
                <a href="{{ route('product.index') }}"><i class="fa fa-fw fa-list"></i> List All Products</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
