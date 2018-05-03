@extends('admin.adminlayout')

@section('content')
		<div class="col-sm-8 col-md-8 col-lg-8 backend-article">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2>Create Answer</h2>
          {!! Form::model(new App\answers, ['route' => ['admin.polls.answers.store']]) !!}
            @include('admin/polls/answers/partials/_form', ['submit_text' => 'Create Answer'])
          {!! Form::close() !!}
        </div>
      </div>
    </div>
@endsection