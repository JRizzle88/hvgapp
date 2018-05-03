<?php use App\Poll; ?>
@extends('layout.landing')

@section('content')
<div id="home" class="home">
  <div class="container introduction">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="{{ asset('/images/slides/hvg-app-slide1-background.jpg') }}">
          <div class="carousel-caption slide1">
            <img src="{{ asset('/images/slides/hvg-dota2-logo-slide1.png') }}">
            <p><b>We Play Dota and have a few Semi-Competetive Teams</b></p>
            <p>We're always looking for more players for either<br>
              Competetive or Casual Play
            </p>
          </div>
        </div>
        <div class="item">
          <img src="{{ asset('/images/slides/hvg-app-slide2-background.jpg') }}">
          <div class="carousel-caption slide2">
            <img src="{{ asset('/images/slides/h1z1-logo.png') }}">
            <p><b>We Play H1Z1 and have a few Semi-Competetive Teams</b></p>
            <p>We're always looking for more players for either<br>
              Competetive or Casual Play
            </p>
          </div>
        </div>
        <div class="item">
          <img src="{{ asset('/images/slides/hvg-app-slide3-background.jpg') }}">
          <div class="carousel-caption slide3">
            <img src="{{ asset('/images/slides/bfh-logo.png') }}">
            <p><b>We Play Hardline and have a few Semi-Competetive Teams</b></p>
            <p>We're always looking for more players for either<br>
              Competetive or Casual Play
            </p>
          </div>
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <div class="main-home-content">
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          @if ( !$posts->count() )
						You have no Posts created.
					@else
						@foreach( $posts as $post )
              <section class="single-post" id="{{ $post->name }}">
                <div class="col-sm-3">
                  <img src="http://placehold.it/180x235" />
                </div>
                <div class="col-sm-9">
                  <a href="{{ route('posts.show', $post->slug) }}">
                    <h2>{{ $post->name }}</h2>
                  </a>
                  <span class="post-date">
                    <small>
                      <i class="fa fa-calendar text-danger" data-toggle="tooltip" data-placement="top" title="{{ date('F jS, Y',strtotime($post->created_at)) }}"></i>   {{ date("F jS, Y",strtotime($post->created_at)) }}
                    </small>
                  </span>
                  <span class="author">
                    <small>
                      @if ($post->user->online != 1)
                        <i class="fa fa-user text-muted" data-toggle="tooltip" data-placement="top" title="{{ $post->user->player_name }} is Offline"></i>
                        {{ $post->user->player_name }} <small><em class="text-muted">Offline</em></small>
                      @else
                        <i class="fa fa-user text-success" data-toggle="tooltip" data-placement="top" title="{{ $post->user->player_name }} is Online"></i>
                        {{ $post->user->player_name }} <small><em class="text-success">Online</em></small>
                      @endif
                    </small>
                  </span>
                  <div class="content-divider"></div>
                  <p>
                    <?php
                      $stripped = strip_tags($post->content);
                    ?>
                    {{{ str_limit($stripped, 250) }}}
                  </p>
                  <div class="content-divider"></div>
                  <a href="{{ route('posts.show', $post->slug) }}" class="comments btn btn-default btn-sm"><span class="badge badge-info"><b>{{ $post->comments->count() }}</b></span> Comments</a>
                  <a href="{{ route('posts.show', $post->slug) }}" class="read-more btn btn-danger btn-sm">Read More</a>
                </div>
              </section>
              <div class="clearfix"></div>
              <hr>
						@endforeach
					@endif
          
          <section id="home-steam-users">
             <h3>Steam Users</h3>
             <div class="row">
               @foreach($limitedPlayers as $spn)
                  <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 steam-profile-blocks">
                    <div class="profile-block">
                      <h4 class="profile-block-name">{{ $spn[0]->personaName }}</h4>
                      <div class="media">
                        <div class="media-left">
                          <img class="profile-block-avatar img-responsive" src="{{ $spn[0]->avatarFullUrl }}" />
                        </div>
                        <div class="media-body">
                          <b>Level</b><br>
                          <span class="badge">{{ $spn[1]->playerLevel }}</span>
                          <br>
                          <hr>
                          <b>Games</b><br>
                          {{$spn[2]->count()}}
                        </div>
                      </div>
                      <div class="progress">
                        <div class="profile-block-level-progress progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="{{ $spn[1]->percentThroughLevel }}" aria-valuemin="{{ $spn[1]->currentLevelFloor }}" aria-valuemax="{{ $spn[1]->currentLevelCeiling }}" style="width: {{ $spn[1]->percentThroughLevel }}%;">
                            {{ $spn[1]->playerXp }}
                        </div>
                      </div>
                      <hr>                    
                      <div class="profile-block-games">
                        @foreach(array_slice($spn[2]->toArray(), 0, 3) as $game)
                        <div class="game" data-game-owner="{{$spn[0]->personaName}}" data-game-playtime="{{$game->playtimeForever}}">
                          <img class="profile-block-game-icon img-responsive" src="{{$game->logo}}" />
                          <small>{{$game->name}}</small><br>
                          <span class="label label-danger">Time: {{$game->playtimeForeverReadable}}</span>
                          <hr>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
               @endforeach
             </div>
          </section>
        </div>
        <div class="col-sm-4 sidebar">
          @if (Auth::guest())
            <h3>Login<span style="float: right;"><a href="auth/register">Create Account</a></span></h3>
            @include('auth._home_form')
          @else
            <h3>Logged in as: {{ Auth::user()->player_name }}</h3>
            <a href="auth/logout">Logout</a>
            @if (Auth::user()->isSuperAdmin())
              <br><a href="{{url('admin')}}">View Admin</a>
            @endif
            @if (Auth::user()->isAuthor())
              <br><a href="{{url('author')}}">View Author Dashboard</a>
            @endif
          @endif
          <hr>
          <div class="well">        
        		@if ( !$polls->count() )
        			<p><em>There are no Polls at this time. Keep checking back.</em></p>
        		@else
              @foreach ( $polls as $poll)
                <h3>{{$poll->question}}</h3>
                @if(Auth::guest())
                  <em>You must be logged in to vote</em>
                @elseif(Auth::user()->isMember())
                
                @endif
                <ul class="sidebar-poll-answers">
            			@foreach( $poll->answers as $answer )
            				<li>
                      <div class="col-sm-10">
                      {{$answer->answer}}
                      <div class="progress">
                        <div data-progress-count="{{$answer->pollvotes->count()}}" class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="{{$answer->pollvotes->count()}}" aria-valuemin="0" aria-valuemax="100">
                          {{$answer->pollvotes->count()}}
                        </div>
                      </div>
                      </div>
                      <div class="col-sm-2">
                        @if(Auth::guest())
                          <a href="" class="btn btn-sm btn-danger pull-right" disabled="disabled">Vote</a>
                        @elseif(Auth::user()->isMember())
                          {!! Form::model(new App\PollVotes, ['route' => ['pollvotes.store', $answer->id], 'class'=>'']) !!}
                            {!! Form::hidden('answers_id', $answer->id) !!}
                            {!! Form::submit('Vote', ['class' => 'btn btn-danger btn-sm pull-right']) !!}
                          {!! Form::close() !!}
                        @endif
                      </div>
                      <div class="clearfix"></div>
                    </li>																	
            			@endforeach
                </ul>
              @endforeach  
        		@endif
        	
          </div>
          <hr>
          <h3>Members<span style="float: right"><a href="">View All</a></span></h3>
          <ul class="home-members">
            @foreach( $users as $user )
            <li>
              @include('layoutpartials._player_status')
            </li>
            @endforeach
          </ul>
          <hr>
          <h3>Teamspeak<span style="float: right"><a href="">Download</a></span></h3>
        </div>
      </div>
    </div>
  </div>

  <div class="steam">
    <div class="container">
      <h2>APIS</h2>
    </div>
  </div>

  <div class="">
  </div>
</div>
    <!-- Full Page Image Background Carousel Header
    <header id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('{{ asset('/images/concept-slide-1.jpg') }}');"></div>
                <div class="carousel-caption">
                    <img class="img-circle center-block img-responsive" src="{{ asset('/images/portrait-color-200x200.jpg') }}">
                    <div style="margin-top: 20px;"></div>
                    <ul class="socials list-inline">
                      <li><a href="https://github.com/JRizzle88" target="_blank"><i class="fa fa-github"></i></a></li>
                      <li><a href="https://www.google.com/+JoshRiley88" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                      <li><a href="https://www.linkedin.com/pub/joshua-riley/26/495/352" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="https://twitter.com/Jrizzle88" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                    <hr>
                    <h1>Your Vision</h1>
                    <h2>Brought to Life</h2>
                    <br>
                    <a href="{{ url('/about') }}" class="btn btn-lg btn-primary">Find out more</a>
                    <div style="margin-top: 100px;"></div>
                    <em>Website Development - Application Development - Business Solutions</em>
                </div>
            </div>
        </div>
    </header> -->
@endsection
