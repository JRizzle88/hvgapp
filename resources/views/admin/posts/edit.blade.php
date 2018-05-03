@extends('admin.adminlayout')

@section('content')
		<div class="col-sm-8 col-md-8 col-lg-8 backend-article">
			<div class="panel panel-default">
				<div class="panel-body">
          <h2>Edit Article <span><a href="{{ url('admin/posts') }}" class="btn btn-primary btn-sm">Back to Articles</a></span></h2>
          {!! Form::model($post, ['method' => 'PATCH', 'route' => ['admin.posts.update', $post->slug]]) !!}
            @include('admin/posts/partials/_form', ['submit_text' => 'Save Article'])
          {!! Form::close() !!}
					@if($post->draft == 1)
						<span class="text-warning"><i class="fa fa-exclamation-triangle"></i> Your post is a Draft. Only you and other Authors can see your post.</span>
					@else
						<span class="text-success">Your post is Published! Everyone can see your post.</span>
					@endif
        </div>
      </div>
    </div>

@endsection
