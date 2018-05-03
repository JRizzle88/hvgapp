<!-- header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="col-sm-5">
              <a class="navbar-brand" href="{{ url('admin') }}">Dashboard</a>
            </div>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="fa fa-user"></i> Admin <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">My Profile</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('auth/logout') }}"><i class="fa fa-lock"></i> Logout</a></li>
            </ul>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /Header -->
