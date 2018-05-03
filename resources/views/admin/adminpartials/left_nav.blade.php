    <div class="col-md-2 col-lg-2 admin-left-navigation">
        <!-- Left column -->
        <a href="{{ url('admin') }}"><img src="{{ asset('/images/logos/hvgapp-logo.png') }}" /></a>
        <hr>
        <div class="btn-group btn-group-justified">
          <div class="btn-group" role="group">
            <a href="{{ url('admin') }}" type="button" class="btn btn-sm btn-default">View Admin</a>
          </div>
          <div class="btn-group" role="group">
            <a href="{{ url('/') }}" type="button" class="btn btn-sm btn-default">View Website</a>
          </div>
        </div>

        <hr>

        <ul class="nav nav-stacked">
            <li class="nav-header active"> <a href="{{ url('admin') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#contentMenu">Content Management <i class="glyphicon glyphicon-chevron-right"></i></a>
                <ul class="nav nav-stacked collapse" id="contentMenu">
                    <li><a href="{{ url('admin/posts') }}"><i class="fa fa-newspaper-o"></i> Articles</a></li>
                    <li><a href="{{ url('admin/pages') }}"><i class="fa fa-clipboard"></i> Pages</a></li>
                </ul>
            </li>
            <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#mediaMenu">Media Management <i class="glyphicon glyphicon-chevron-right"></i></a>
                <ul class="nav nav-stacked collapse" id="mediaMenu">
                    <li><a href="{{ url('filemanager') }}"><i class="fa fa-file"></i> File Manager</a></li>
                </ul>
            </li>
            <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">User Management <i class="glyphicon glyphicon-chevron-right"></i></a>
                <ul class="nav nav-stacked collapse" id="userMenu">
                    <li><a href="{{ url('admin/players') }}"><i class="fa fa-user"></i> Players</a></li>
                    <li><a href="{{ url('admin/authors') }}"><i class="fa fa-user"></i> Authors</a></li>
                </ul>
            </li>
            <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#pollMenu">Poll Management <i class="glyphicon glyphicon-chevron-right"></i></a>
                <ul class="nav nav-stacked collapse" id="pollMenu">
                    <li><a href="{{ url('admin/polls') }}"><i class="fa fa-clipboard"></i> Polls</a></li>
                </ul>
            </li>
            <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu2"> Reports <i class="glyphicon glyphicon-chevron-right"></i></a>

                <ul class="nav nav-stacked collapse" id="menu2">
                    <li><a href="{{ url('admin/reports') }}">Overview</a>
                    </li>
                    <li><a href="#">Views</a>
                    </li>
                    <li><a href="#">Subscribed</a>
                    </li>
                    <li><a href="#">Articles</a>
                    </li>
                    <li><a href="#">Alerts / Errors</a>
                    </li>
                </ul>
            </li>
            <li class="nav-header">
                <a href="#" data-toggle="collapse" data-target="#menu3"> Social Media <i class="glyphicon glyphicon-chevron-right"></i></a>
                <ul class="nav nav-stacked collapse" id="menu3">
                    <li><a href=""><i class="glyphicon glyphicon-circle"></i> General</a></li>
                    <li><a href=""><i class="glyphicon glyphicon-circle"></i> Extras</a></li>
                </ul>
            </li>
            <li><a href="{{ url('auth/logout')}}"><i class="fa fa-sign-out text-danger"></i> Logout</a></li>
        </ul>
    </div>
