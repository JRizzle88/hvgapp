@extends('layout.app')

@section('content')
			<div class="panel panel-default">
				<div class="panel-heading">Create a Comment</div>

				<div class="panel-body">
          <h2>Add Comment for {{ $post->name }}</h2>

          {!! Form::model(new App\Comment, ['route' => ['posts.comments.store', $post->slug], 'class'=>'']) !!}
            @include('comments/partials/_form', ['submit_text' => 'Add Comment'])
          {!! Form::close() !!}
        </div>
      </div>
@endsection
