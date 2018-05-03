<a href="{{ url('player', $user->player_name) }}">

@if ($user->online != 1)
<i class="fa fa-user text-muted" data-toggle="tooltip" data-placement="left" title="User Offline"></i>
{{ $user->player_name }} <small><em class="text-muted">Last seen - {{ date("D, M jS, Y",strtotime($post->updated_at)) }}</em></small>
@else
<i class="fa fa-user text-success" data-toggle="tooltip" data-placement="left" title="User Online"></i>
{{ $user->player_name }} <small><em class="text-success">Online</em></small>
@endif

</a>
