@extends('admin.adminlayout')

@section('content')
<div class="col-sm-8 col-md-8 col-lg-8">
	<div class="panel panel-default">
		<div class="panel-body">
		<div class="single-poll" id="{{ $poll->name }}">
	    <h2>{{ $poll->question }}</h2>
		<ul class="list-group">
		@if ( !$poll->answers->count() )
			<li class="list-group-item"><em>There are no Answers set up for this Poll.</em></li>
		@else
			@foreach( $poll->answers as $answer )
				
				<li class="list-group-item"><span class="badge pull-left">Votes: {{$poll->answers->count()}}</span> - {{$answer->answer}}</li>
																	
			@endforeach
		@endif
		</ul>
		</div>
			
		</div>
	</div>
</div>
@endsection
