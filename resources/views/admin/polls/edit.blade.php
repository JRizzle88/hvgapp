@extends('admin.adminlayout')

@section('content')
		<div class="col-sm-8 col-md-8 col-lg-8 backend-article">
			<div class="panel panel-default">
				<div class="panel-body">
          <h2>Edit Poll <span><a href="{{ url('admin/polls') }}" class="btn btn-primary btn-sm">Back to Polls</a></span></h2>
          {!! Form::model($poll, ['method' => 'PATCH', 'route' => ['admin.polls.update', $poll->id]]) !!}
            @include('admin/polls/partials/_form', ['submit_text' => 'Save Poll'])
          {!! Form::close() !!}
			    <span class="text-success">Your poll is active.</span>

        </div>
      </div>
    </div>

@endsection