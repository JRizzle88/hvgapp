<h3>Poll Information</h3>
<p class="text-muted"><em>A Poll is not a Poll without a question.</em></p>
<div class="row">
  <div class="form-group col-sm-6">
    {!! Form::label('question', 'Question:') !!}
    {!! Form::text('question', null, array('class' => 'form-control input-sm')) !!}
  </div>
</div>
<div class="form-group">
  {!! Form::submit($submit_text, ['class'=>'btn btn-success']) !!}
</div>