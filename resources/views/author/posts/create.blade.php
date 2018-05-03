@extends('author.authorlayout')

@section('content')
		<div class="col-sm-8 col-md-8 col-lg-8 backend-article">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2>Post a New Article</h2>
          {!! Form::model(new App\post, ['route' => ['posts.store'], 'files' => true]) !!}
            @include('author/posts/partials/_form', ['submit_text' => 'Create Article'])
          {!! Form::close() !!}
        </div>
      </div>
    </div>
@endsection
