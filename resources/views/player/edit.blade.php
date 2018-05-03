@extends('layout.app')

@section('content')
<div class="edit-profile">
  <h2 class="no-margin">Player Settings</h2>
  <hr>
  <div class="row">
    <div class="col-sm-12">
      @if ( $user->id == Auth::user()->id || Auth::user()->isSuperAdmin() )
        {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->player_name]]) !!}
          @include('player/partials/_form', ['submit_text' => 'Update Profile'])
        {!! Form::close() !!}
      @else
       <h1>Your headed to jail pal !!</h1>
       <h1>:), Just kidding but really GTFO</h1>
      @endif
    </div>
  </div>
</div>
@endsection
