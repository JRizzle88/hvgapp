@extends('admin.adminlayout')

@section('content')
		<div class="col-sm-8 col-md-8 col-lg-8 backend-page">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2>Create a New Page</h2>
          {!! Form::model(new App\page, ['route' => ['admin.pages.store']]) !!}
            @include('admin/pages/partials/_form', ['submit_text' => 'Create Page'])
          {!! Form::close() !!}
        </div>
      </div>
    </div>
@endsection
