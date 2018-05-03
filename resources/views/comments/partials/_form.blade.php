<div class="form-group">
  {!! Form::hidden('user_id', Auth::user()->id) !!}
  {!! Form::hidden('post_id', $post->id) !!}
  {!! Form::label('content', 'Comment:') !!}
  <br>
  {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::submit($submit_text, ['class' => 'btn btn-success btn-sm']) !!}
</div>
