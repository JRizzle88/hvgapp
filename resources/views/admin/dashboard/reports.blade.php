@extends('admin.adminlayout')

@section('content')
		<div class="col-sm-8 col-md-8 col-lg-8">
			<div class="panel panel-default">
				<div class="panel-body">
          <h2>Reports Overview</h2>
          <div class="btn-group btn-group-justified">
            <div class="btn-group" role="group">
              <a href="" type="button" class="btn btn-lg btn-default"><h1>{{ $usersCount }}</h1><h3>Total Players</h3></a>
            </div>
            <div class="btn-group" role="group">
              <a href="" type="button" class="btn btn-lg btn-default"><h1>{{ $subscribedCount }}</h1><h3>Total Subscribed</h3></a>
            </div>
            <div class="btn-group" role="group">
              <a href="" type="button" class="btn btn-lg btn-default"><h1>{{ $postsCount }}</h1><h3>Total Posts</h3></a>
            </div>
          </div>
          <div class="btn-group btn-group-justified">
            <div class="btn-group" role="group">
              <a href="" type="button" class="btn btn-lg btn-default"><h1>{{ $pagesCount }}</h1><h3>Total Pages</h3></a>
            </div>
            <div class="btn-group" role="group">
              <a href="" type="button" class="btn btn-lg btn-default"><h1>{{ $authorsCount }}</h1><h3>Total Authors</h3></a>
            </div>
            <div class="btn-group" role="group">
              <a href="" type="button" class="btn btn-lg btn-default"><h1>{{ $adminsCount }}</h1><h3>Total Admins</h3></a>
            </div>
          </div>
          <div class="clearfix"></div>
          <hr>
        </div>
      </div>
    </div>
@endsection
