@extends('layout.blog')

@section('content')
	<div class="single-post" id="{{ $post->name }}">
	    <h2>{{ $post->name }}</h2>
		<hr>
		<p>{{ $post->content }}</p>
	</div>
@endsection
