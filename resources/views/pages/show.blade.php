@extends('layout.blog')

@section('content')
	<h2>{{ $page->name }}</h2>
	<p>{!!html_entity_decode($page->content)!!}</p>
@endsection
