@extends('layout.blog')

@section('content')
		<div class="single-post well" id="{{ $post->name }}">
	    <h2>{{ $post->name }}</h2>
      <p class="text-muted panel">
				<small>
					<i class="fa fa-calendar text-danger" data-toggle="tooltip" data-placement="top" title="Published: {{ date('F jS, Y',strtotime($post->created_at)) }}"></i>
					{{ date("F jS, Y",strtotime($post->created_at)) }}
				</small> --
				<small>
					@if ($post->user->online != 1)
						<i class="fa fa-user text-muted" data-toggle="tooltip" data-placement="top" title="Offline"></i>
						{{ $post->user->player_name }} <small><em class="text-muted">Offline</em></small>
					@else
						<i class="fa fa-user text-success" data-toggle="tooltip" data-placement="top" title="Online"></i>
						{{ $post->user->player_name }} <small><em class="text-success">Online</em></small>
					@endif
				</small> --
				<small>
					<span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="{{ $post->comments->count() }} Comments">
						{{ $post->comments->count() }}
					</span>
					Comments
				</small>

			</p>
			<p>{!!html_entity_decode($post->content)!!}</p>
			<hr>
			<h2 class="text-bold">Comments:</h2>
			@include('comments.partials._post_comments')
			@include('comments.partials._create')
		</div>
@endsection
