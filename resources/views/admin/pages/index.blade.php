@extends('admin.adminlayout')

@section('content')

		<div class="col-sm-8 col-md-8 col-lg-8">
			<div class="panel panel-default">
				<div class="panel-body">
          <h2>All Pages {!! link_to_route('admin.pages.create', 'New Page', '', array('class'=>'btn btn-success btn-sm')) !!}</h2>

					@if ( !$pages->count() )
						You have no Pages created.
					@else
						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Page</th>
									<th>Author</th>
									<th>Slug</th>
									<th>Date Created</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach( $pages as $p )
									<tr>
										<td>{{ $p->id }}</td>
										<td>
											@if($p->draft == 1)
												<a href="{{ route('admin.pages.edit', $p->slug) }}">
													<span class="text-warning"><i class="fa fa-exclamation-triangle"></i> Draft</span> - {{ $p->name }}
												</a>
											@else
												<a href="{{ route('pages.show', $p->slug) }}">
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
										<td>{{ $p->slug }}</td>
										<td>{{ $p->created_at }}</td>
										<td>
											{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('admin.pages.destroy', $p->slug))) !!}
												{!! link_to_route('pages.show', '', $p->slug, array('class' => 'fa fa-eye text-success fa-2x')) !!}
												{!! link_to_route('admin.pages.edit', '', $p->slug, array('class' => 'fa fa-edit fa-2x')) !!}
												{!! Form::button('<i class="fa fa-times text-danger fa-2x"></i>', array('type' => 'submit', 'class' => 'btn-link')) !!}
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
