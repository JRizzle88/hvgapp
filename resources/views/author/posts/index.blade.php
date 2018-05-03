@extends('author.authorlayout')

@section('content')

		<div class="col-sm-8 col-md-8 col-lg-8">
			<div class="panel panel-default">
				<div class="panel-body">
          <h2>All Articles {!! link_to_route('author.posts.create', 'New Article', '', array('class'=>'btn btn-success btn-sm')) !!}</h2>

					@if ( !$posts->count() )
						You have no Posts created.
					@else
						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Post</th>
									<th>Author</th>
									<th>Comments</th>
									<th>Slug</th>
									<th>Date Created</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach( $posts as $p )
									<tr>
										<td>{{ $p->id }}</td>
										<td>
											@if($p->draft == 1)
												<a href="{{ route('author.posts.edit', $p->slug) }}">
													<span class="text-warning"><i class="fa fa-exclamation-triangle"></i> Draft</span> - {{ $p->name }}
												</a>
											@else
												<a href="{{ route('posts.show', $p->slug) }}">
													<i class="fa fa-check text-success"></i> {{ $p->name }}
												</a>
											@endif
										</td>
										<td>
											@if ($p->user->online != 1)
												<i class="fa fa-user text-muted" data-toggle="tooltip" data-placement="left" title="Offline"></i>
												{{ $p->user->player_name }} <small><em class="text-muted">Offline</em></small>
											@else
												<i class="fa fa-user text-success" data-toggle="tooltip" data-placement="left" title="Online"></i>
												{{ $p->user->player_name }} <small><em class="text-success">Online</em></small>
											@endif
										</td>
										<td><span class="badge badge-info">{{ $p->comments->count() }}</span></td>
										<td>{{ $p->slug }}</td>
										<td>{{ $p->created_at }}</td>
										<td>
											{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('author.posts.destroy', $p->slug))) !!}
												{!! link_to_route('posts.show', '', $p->slug, array('class' => 'fa fa-eye text-success fa-2x')) !!}
												{!! link_to_route('author.posts.edit', '', $p->slug, array('class' => 'fa fa-edit fa-2x')) !!}
												{!! Form::button('<i class="fa fa-times text-danger fa-2x"></i>', array('type' => 'submit', 'class' => 'btn-link delete-comment')) !!}
								            {!! Form::close() !!}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@endif
          <p></p>

        </div>
      </div>
    </div>

@endsection
