@extends('layout.app')

@section('content')
	<div class="player-profile row divider-sm">
		<div class="col-md-12">
			<div class="panel panel-default panel-danger">
				<div class="panel-heading">{{ $user->player_name }}'s Player Profile</div>
				<div class="panel-body">
					<!-- IF IS SUPER ADMIN -->
						<h4>Basic Information
							
							@if(Auth::user()->id == $user->id)
								<small><a href="{{ route('player.edit', $user->player_name) }}" class="text-danger"><i class="fa fa-edit"></i> Edit</a></small>
							@endif

						</h4>
						<div class="col-sm-6 player-information">
              				<p><label>Player Name: </label> {{ $user->player_name }}</p>
							<p><label>Email: </label> {{ $user->email }}</p>
							<p><label>Phone: </label> {{ $user->phone }}</p>
							<p><label>City: </label> {{ $user->city }}</p>
							<p><label>State: </label> {{ $user->state}}</p>
						</div>
						<div class="col-sm-6 player-information">
							<div class="well">
								<p><label>First Name: </label> {{ $user->first_name }}</p>
								<p><label>Last Name: </label> {{ $user->last_name }}</p>
				                <p>
				                  <label >License Status: </label>
				                   @if ( $user->valid_license == 1 )
				                    <label class="label label-success">Valid</label>
				                   @else
				                    <label class="label label-danger">Invalid</label>
				                   @endif
				                </p>
								
								@if(Auth::user()->isSuperAdmin())
									<p><label>Role: </label> {{ $user->role }}</p>
								@endif

							</div>
						</div>
						<div class="clearfix"></div>
						<h4>Social Media

							@if(Auth::user()->id == $user->id)
								<small><a href="{{ route('player.edit', $user->player_name) }}" class="text-danger"><i class="fa fa-edit"></i> Edit</a></small>
							@endif

						</h4>
						<div class="col-sm-6 social-media">
              				<?php if(!empty($user->steam)) { echo '<p><label>Steam: </label>'.$user->steam.'</p>'; } ?>
							<?php if(!empty($user->twitch)) { echo '<p><label>Twitch: </label>'.$user->twitch.'</p>'; } ?>
							<?php if(!empty($user->origin)) { echo '<p><label>Origin: </label>'.$user->origin.'</p>'; } ?>
							<?php if(!empty($user->linkedin)) { echo '<p><label>LinkedIn: </label>'.$user->linkedin.'</p>'; } ?>
							<?php if(!empty($user->twitter)) { echo '<p><label>Twitter: </label>'.$user->twitter.'</p>'; } ?>
						</div>
						<div class="col-sm-6 social-media">
              				<?php if(!empty($user->facebook)) { echo '<p><label>Facebook: </label>'.$user->facebook.'</p>'; } ?>
							<?php if(!empty($user->googleplus)) { echo '<p><label>Google+: </label>'.$user->googleplus.'</p>'; } ?>
							<?php if(!empty($user->skype)) { echo '<p><label>Skype: </label>'.$user->skype.'</p>'; } ?>
							<?php if(!empty($user->github)) { echo '<p><label>Github: </label>'.$user->github.'</p>'; } ?>
						</div>
						<div class="clearfix"></div>
						<h4>Computer Specifications

							@if(Auth::user()->id == $user->id)
								<small><a href="{{ route('player.edit', $user->player_name) }}" class="text-danger"><i class="fa fa-edit"></i> Edit</a></small>
							@endif

						</h4>
						<div class="col-sm-6 social-media">
              				<?php if(!empty($user->player_cpu)) { echo '<p><label>Processor ( CPU ): </label>'.$user->player_cpu.'</p>'; } ?>
							<?php if(!empty($user->player_ram)) { echo '<p><label>Memory ( RAM ): </label>'.$user->player_ram.'</p>'; } ?>
							<?php if(!empty($user->player_video_card)) { echo '<p><label>Video Card ( GPU ): </label>'.$user->player_video_card.'</p>'; } ?>
						</div>
						<div class="col-sm-6 social-media">
              				<?php if(!empty($user->player_monitor)) { echo '<p><label>Display Monitor: </label>'.$user->player_monitor.'</p>'; } ?>
							<?php if(!empty($user->player_periphials)) { echo '<p><label>Peripherals / Accessories: </label>'.$user->player_periphials.'</p>'; } ?>
						</div>
						<div class="clearfix"></div>
						<h4>Other Information

							@if(Auth::user()->id == $user->id)
								<small><a href="{{ route('player.edit', $user->player_name) }}" class="text-danger"><i class="fa fa-edit"></i> Edit</a></small>
							@endif

						</h4>
						<div class="col-sm-6 social-media">
							<?php if(!empty($user->player_mobile_devices)) { echo '<p><label>Mobile / Tablet Devices: </label>'.$user->player_mobile_devices.'</p>'; } ?>
						</div>
						<div class="col-sm-6 social-media">
							<?php if(!empty($user->favorite_sites)) { echo '<p><label>Favorite Websites: </label>'.$user->favorite_sites.'</p>'; } ?>
						</div>
						<div class="clearfix"></div>
            		<hr>
						@if ( $user->role == 'author' || $user->role == 'super_admin' )
            		<h4>{{ $user->player_name }}'s Articles <small><a href="{{ route('posts.index' ) }}" class="text-danger"><i class="fa fa-eye"></i> View All</a></small></h4>
					@if ( !$posts->count() )
					    This player has no articles created.
					  @else
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Slug</th>
										<th>Date Created</th>
                    					<th>Actions</th>
									</tr>
								</thead>
								<tbody>
						      @foreach( $posts as $post )
										<tr>
											<td>{{ $post->id }}</td>
											<td><a href="{{ route('posts.show', $post->slug) }}">{{ $post->name }}</a></td>
											<td>{{ $post->slug }}</td>
											<td>{{ $post->created_at }}</td>
                      						<td>
												<a href="{{ route('posts.show', $post->slug) }}"><i class="fa fa-eye text-success"></i></a>
												<a href=""><i class="fa fa-edit"></i></a>
                        						<a href=""><i class="fa fa-remove text-danger"></i></a>
											</td>
										</tr>
						      @endforeach
								</tbody>
							</table>
		
					@endif
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection
