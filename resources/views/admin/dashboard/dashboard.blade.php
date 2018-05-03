@extends('admin.adminlayout')

@section('content')
		<div class="col-sm-8 col-md-8 col-lg-8">
			@if (Auth::user()->isSuperAdmin())
			<div class="panel panel-default">
				<div class="panel-body">
						<h2>Latest Player Registrations <small><a href="{{ url('admin/players') }}"><i class="fa fa-eye"></i> View All</a></small></h2>
						@if ( !$users->count() )
					    There are no Players Registered.
					  @else
						<div class="table-responsive">
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th>Player Name</th>
										<th>Full Name</th>
										<th>Status</th>
										<th>Email Address</th>
										<th>Date Joined</th>
										<th>Player License</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
						      @foreach( $users as $user )
										<tr>
											<td><a href="{{ url('player', $user->player_name) }}">{{ $user->player_name }}</a></td>
											<td>{{ $user->first_name }} {{ $user->last_name }}</td>
											<td>
												@if ($user->online != 1)
						              <i class="fa fa-user text-muted" data-toggle="tooltip" data-placement="left" title="Offline"></i>
						              {{ $user->player_name }} <small><em class="text-muted">Offline</em></small>
						            @else
						              <i class="fa fa-user text-success" data-toggle="tooltip" data-placement="left" title="Online"></i>
						              {{ $user->player_name }} <small><em class="text-success">Online</em></small>
						            @endif
											</td>
											<td>{{ $user->email }}</td>
											<td>{{ $user->created_at }}</td>
											<td>
												@if ( $user->valid_license == 1 )
													<label class="label label-success">Valid</label>
												@else
													<label class="label label-danger">Invalid</label>
												@endif
											</td>
											<td>
												<a href="{{ url('player', $user->player_name) }}"><i class="fa fa-eye fa-2x" data-toggle="tooltip" data-placement="top" title="View {{ $user->player_name }}"></i></a>
												<a href=""><i class="fa fa-ticket text-info fa-2x" data-toggle="tooltip" data-placement="top" title="Add Ticket"></i></a>
											</td>
										</tr>
						      @endforeach
								</tbody>
							</table>
						</div>
					  @endif
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
          <h2>Latest Articles  <small><a href="{{ url('admin/posts') }}"><i class="fa fa-eye"></i> View All</a></small></h2>

					@if ( !$posts->count() )
						You have no Posts created.
					@else
						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Post</th>
									<th>Author</th>
									<th>Comments</th>
									<th>Slug</th>
									<th>Date Created</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach( $posts as $p )
									<tr>
										<td>{{ $p->id }}</td>
										<td>
											@if($p->draft == 1)
												<a href="{{ route('admin.posts.edit', $p->slug) }}">
													<span class="text-warning"><i class="fa fa-exclamation-triangle"></i> Draft</span> - {{ $p->name }}
												</a>
											@else
												<a href="{{ route('posts.show', $p->slug) }}">
													<i class="fa fa-check text-success"></i> {{ $p->name }}
												</a>
											@endif
										</td>
										<td>
											@if ($p->user->online != 1)
												<i class="fa fa-user text-muted" data-toggle="tooltip" data-placement="left" title="Offline"></i>
												{{ $p->user->player_name }} <small><em class="text-muted">Offline</em></small>
											@else
												<i class="fa fa-user text-success" data-toggle="tooltip" data-placement="left" title="Online"></i>
												{{ $p->user->player_name }} <small><em class="text-success">Online</em></small>
											@endif
										</td>
										<td><span class="badge badge-info">{{ $p->comments->count() }}</span></td>
										<td>{{ $p->slug }}</td>
										<td>{{ $p->created_at }}</td>
										<td>
											<a href="{{ route('posts.show', $p->slug) }}"><i class="fa fa-eye text-success fa-2x"></i></a>
											<a href="{{ route('admin.posts.edit', $p->slug) }}"><i class="fa fa-edit fa-2x"></i></a>
											<a href=""><i class="fa fa-remove text-danger fa-2x"></i></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@endif
        </div>
      </div>
			@endif
		</div>

@endsection
