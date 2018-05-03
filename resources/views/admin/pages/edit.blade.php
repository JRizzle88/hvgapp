@extends('admin.adminlayout')

@section('content')
		<div class="col-sm-8 col-md-8 col-lg-8 backend-article">
			<div class="panel panel-default">
				<div class="panel-body">
          <h2>Edit Page <span><a href="{{ url('admin/pages') }}" class="btn btn-primary btn-sm">Back to Pages</a></span></h2>
          {!! Form::model($page, ['method' => 'PATCH', 'route' => ['admin.pages.update', $page->slug]]) !!}
            @include('admin/pages/partials/_form', ['submit_text' => 'Save Page'])
          {!! Form::close() !!}
					@if($page->draft == 1)
						<span class="text-warning"><i class="fa fa-exclamation-triangle"></i> Your page is a Draft. Only you can see your page.</span>
					@else
						<span class="text-success">Your page is Published! Everyone can see your page.</span>
					@endif
        </div>
      </div>
    </div>

@endsection
