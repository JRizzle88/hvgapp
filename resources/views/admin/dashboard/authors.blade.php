@extends('admin.adminlayout')

@section('content')
		<div class="col-sm-8 col-md-8 col-lg-8">
			<div class="panel panel-default">
				<div class="panel-body">
        @if (Auth::user()->isSuperAdmin())
          <h2>All Authors</h2>
          @if ( !$users->count() )
            You have no Authors Registered.
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
                    <td>
											<a href="{{ url('player', $user->player_name) }}"><i class="glyphicon glyphicon-certificate text-danger"></i> {{ $user->player_name }}</a>
										</td>
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
                      <a href=""><i class="fa fa-ticket fa-2x text-info" data-toggle="tooltip" data-placement="top" title="Add Ticket"></i></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @endif
      @endif
		</div>
			</div>
    </div>
@endsection
