@extends('layout.blog')

@section('content')

		<div class="single-page" id="{{ $page->name }}">
	    <h2>{{ $page->name }}</h2>
			<hr>
			<p>{{ $page->content }}</p>
		</div>

@endsection
