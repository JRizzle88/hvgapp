<h3>Poll Answers</h3>
<p class="text-muted"><em>A Poll question cannot be answered without answers.</em></p>
<div class="row">
  <div class="form-group col-sm-6">
    {!! Form::hidden('poll_id', $poll->id) !!}
    {!! Form::label('answer', 'Answer:') !!}
    {!! Form::text('answer', null, array('class' => 'form-control input-sm')) !!}
  </div>
</div>
<div class="form-group">
  {!! Form::submit($submit_text, ['class'=>'btn btn-success']) !!}
</div>