@extends('admin.adminlayout')

@section('content')
<div class="col-sm-8 col-md-8 col-lg-8">
	<div class="panel panel-default">
		<div class="panel-body">
			<h2>All Polls {!! link_to_route('admin.polls.create', 'New Poll', '', array('class'=>'btn btn-success btn-sm')) !!}</h2>
				@if ( !$polls->count() )
					You have no Polls created.
				@else
					<table class="table table-hover table-striped">
						<thead>
							<th>Poll ID</th>
							<th>Question</th>
							<th>Answers</th>
							<th>Actions</th>
						</thead>
						<tbody>
							@foreach( $polls as $p )
								<tr>
									<td>{{ $p->id }}</td>
									<td>{{ $p->question }}</td>
									<td>
										<ol id="poll-answers">			
										@if ( !$p->answers->count() )
											<li><em>There are no Answers set up for this Poll.</em></li>
										@else
											@foreach( $p->answers as $answer )	
												<li>{{$answer->answer}}</li>												
											@endforeach
										@endif
										</ol>
										{!! link_to_route('admin.polls.answers.create', 'Add New', $p->id, array('class' => 'fa fa-plus text-success')) !!}
									</td>
									<td>
										{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('admin.polls.destroy', $p->id))) !!}
											{!! link_to_route('admin.polls.show', '', $p->id, array('class' => 'fa fa-eye text-success fa-2x')) !!}
											{!! link_to_route('admin.polls.edit', '', $p->id, array('class' => 'fa fa-edit fa-2x')) !!}
											{!! Form::button('<i class="fa fa-times text-danger fa-2x"></i>', array('type' => 'submit', 'class' => 'btn-link delete-comment')) !!}
								        {!! Form::close() !!}					
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@endif
		</div>
	</div>
</div>
@endsection