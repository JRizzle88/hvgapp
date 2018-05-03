
<div class="row">
    <div class="form-group col-sm-6">
      {!! Form::label('player_name', 'Player Name:') !!}
      {!! Form::text('player_name', null, array('class' => 'form-control input-sm')) !!}
    </div>
    <div class="form-group col-sm-6">
      {!! Form::label('email', 'Email Address:') !!}
      {!! Form::email('email', null, array('class' => 'form-control disabled input-sm', 'disabled')) !!}
    </div>
    <div class="form-group col-sm-6">
      {!! Form::label('first_name', 'First Name:') !!}
      {!! Form::text('first_name', null, array('class' => 'form-control input-sm')) !!}
    </div>
    <div class="form-group col-sm-6">
      {!! Form::label('last_name', 'Last Name:') !!}
      {!! Form::text('last_name', null, array('class' => 'form-control input-sm')) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
      {!! Form::label('city', 'City:') !!}
      {!! Form::text('city', null, array('class' => 'form-control input-sm')) !!}
    </div>
    <div class="form-group col-sm-6">
      {!! Form::label('state', 'State:') !!}
      {!! Form::text('state', null, array('class' => 'form-control input-sm')) !!}
    </div>
    <div class="form-group col-sm-6">
      {!! Form::label('phone', 'Phone:') !!}
      {!! Form::text('phone', null, array('class' => 'form-control input-sm')) !!}
    </div>
    <div class="form-group col-sm-6">
      <label>Country:</label>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-4">
      {!! Form::label('steam', 'Steam:') !!}
      {!! Form::text('steam', null, array('class' => 'form-control input-sm')) !!}
    </div>
    <div class="form-group col-sm-4">
      {!! Form::label('twitch', 'Twitch:') !!}
      {!! Form::text('twitch', null, array('class' => 'form-control input-sm')) !!}
    </div>
    <div class="form-group col-sm-4">
      {!! Form::label('origin', 'Origin:') !!}
      {!! Form::text('origin', null, array('class' => 'form-control input-sm')) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-4">
      {!! Form::label('linkedin', 'LinkedIn:') !!}
      {!! Form::text('linkedin', null, array('class' => 'form-control input-sm')) !!}
    </div>
    <div class="form-group col-sm-4">
      {!! Form::label('twitter', 'Twitter:') !!}
      {!! Form::text('twitter', null, array('class' => 'form-control input-sm')) !!}
    </div>
    <div class="form-group col-sm-4">
      {!! Form::label('facebook', 'Facebook:') !!}
      {!! Form::text('facebook', null, array('class' => 'form-control input-sm')) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-4">
      {!! Form::label('googleplus', 'Google+:') !!}
      {!! Form::text('googleplus', null, array('class' => 'form-control input-sm')) !!}
    </div>
    <div class="form-group col-sm-4">
      {!! Form::label('skype', 'Skype:') !!}
      {!! Form::text('skype', null, array('class' => 'form-control input-sm')) !!}
    </div>
    <div class="form-group col-sm-4">
      {!! Form::label('github', 'Github:') !!}
      {!! Form::text('github', null, array('class' => 'form-control input-sm')) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
      {!! Form::label('player_cpu', 'CPU / Processor:') !!}
      {!! Form::text('player_cpu', null, array('class' => 'form-control input-sm')) !!}
    </div>
    <div class="form-group col-sm-6">
      {!! Form::label('player_ram', 'RAM:') !!}
      {!! Form::text('player_ram', null, array('class' => 'form-control input-sm')) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
      {!! Form::label('player_video_card', 'Video Card:') !!}
      {!! Form::text('player_video_card', null, array('class' => 'form-control input-sm')) !!}
    </div>
    <div class="form-group col-sm-6">
      {!! Form::label('player_monitor', 'Monitor:') !!}
      {!! Form::text('player_monitor', null, array('class' => 'form-control input-sm')) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-12">
      {!! Form::label('player_periphials', 'Periphials / Accessories:') !!}
      {!! Form::textarea('player_periphials', null, array('class' => 'form-control input-sm')) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-12">
        API Connections
        <h4>Steam</h4>
        <h4>Twitch</h4>
        <h4>GTA5 Social Club</h4>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
      {!! Form::label('player_mobile_devices', 'Mobile / Tablet Devices:') !!}
      {!! Form::textarea('player_mobile_devices', null, array('class' => 'form-control input-sm')) !!}
    </div>
    <div class="form-group col-sm-6">
      {!! Form::label('favorite_sites', 'Favorite Websites:') !!}
      {!! Form::textarea('favorite_sites', null, array('class' => 'form-control input-sm')) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-12">
      {!! Form::submit($submit_text, ['class'=>'btn btn-success']) !!}
    </div>
</div>
