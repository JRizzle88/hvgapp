    <div class="col-md-2 col-lg-2 author-left-navigation">
        <!-- Left column -->
        <a href="{{ url('author') }}"><img src="{{ asset('/images/logos/hvgapp-logo.png') }}" /></a>
        <hr>
        <div class="btn-group btn-group-justified">
          <div class="btn-group" role="group">
            <a href="{{ url('author') }}" type="button" class="btn btn-sm btn-default">View Dashboard</a>
          </div>
          <div class="btn-group" role="group">
            <a href="{{ url('/') }}" type="button" class="btn btn-sm btn-default">View Website</a>
          </div>
        </div>

        <hr>

        <ul class="nav nav-stacked">
            <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">Settings <i class="glyphicon glyphicon-chevron-down"></i></a>
                <ul class="nav nav-stacked collapse in" id="userMenu">
                    <li class="active"> <a href="{{ url('author') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="{{ url('author/posts') }}"><i class="fa fa-newspaper-o"></i> Articles</a></li>
                    <li><a href="{{ url('filemanager') }}"><i class="fa fa-file"></i> File Manager</a></li>
                </ul>
            </li>
            <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu2"> Reports <i class="glyphicon glyphicon-chevron-right"></i></a>

                <ul class="nav nav-stacked collapse" id="menu2">
                    <li><a href="{{ url('admin/reports') }}">Overview</a>
                    </li>
                    <li><a href="{{ url('admin/reports') }}">Views</a>
                    </li>
                    <li><a href="{{ url('admin/reports') }}">Subscribed</a>
                    </li>
                    <li><a href="{{ url('admin/reports') }}">Articles</a>
                    </li>
                    <li><a href="{{ url('admin/reports') }}">Alerts / Errors</a>
                    </li>
                </ul>
            </li>
            <li><a href="{{ url('auth/logout')}}"><i class="fa fa-sign-out text-primary"></i> Logout</a></li>
        </ul>
    </div>
