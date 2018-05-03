@extends('admin.adminlayout')

@section('content')
		<div class="col-sm-8 col-md-8 col-lg-8 backend-article">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2>Create a Poll</h2>
          {!! Form::model(new App\poll, ['route' => ['admin.polls.store']]) !!}
            @include('admin/polls/partials/_form', ['submit_text' => 'Create Poll'])
          {!! Form::close() !!}
        </div>
      </div>
    </div>
@endsection