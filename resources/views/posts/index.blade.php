@extends('layout.blog')

@section('content')
				<div class="posts-archive">
					@if ( !$posts->count() )
						You have no Posts created.
					@else
						@foreach( $posts as $post )
              <section class="single-post well" id="{{ $post->name }}">
                <a href="{{ route('posts.show', $post->slug) }}"><h2>{{ $post->name }}</h2></a>
                <p>
                  <div class="text-muted panel">
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
											<a href="{{ route('posts.show', $post->slug) }}">
												<span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="{{ $post->comments->count() }} Comments">
													{{ $post->comments->count() }}
												</span>
												Comments
											</a>
										</small>
									</div>
                </p>
								<p>
									<a href="{{ route('posts.show', $post->slug) }}"><img src="http://placehold.it/830x350" /></a>
								</p>
                <p>
									<?php
                    $stripped = strip_tags($post->content);
                  ?>
                  {{{ str_limit($stripped, 600) }}}
								</p>
              </section>
						@endforeach
					@endif
				</div>
@endsection
