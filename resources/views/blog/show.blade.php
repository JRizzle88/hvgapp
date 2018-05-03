@extends('layout.blog')

@section('content')
	<div class="row">
		<div class="single-post" id="{{ $post->name }}">
	    <h2>{{ $post->name }}</h2>
			<hr>
			<p>{{ $post->content }}</p>
		</div>
  </div>
@endsection
