@extends('layout.app')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
      @if (Auth::user()->isSuperAdmin())
				<div class="btn-group btn-group-justified">
					<div class="btn-group" role="group">
						<a href="{{ url('dashboard') }}" type="button" class="btn btn-sm btn-default">Dashboard</a>
					</div>
					<div class="btn-group" role="group">
						<a href="{{ url('dashboard/players') }}" type="button" class="btn btn-sm btn-default">Players</a>
					</div>
					<div class="btn-group" role="group">
						<a href="{{ url('dashboard/reports') }}" type="button" class="btn btn-sm btn-danger">Reports</a>
					</div>
				</div>
			@endif
			<div class="panel panel-default">
				<div class="panel-heading">Dashboard</div>

				<div class="panel-body">
    @foreach($users as $user)
        <p>{{ $user->first_name }}</p>
    @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
