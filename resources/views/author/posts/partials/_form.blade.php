
<h3>Basic Information</h3>
<p class="text-muted"><em>Filling out this section is required.</em></p>
<div class="row">
  <div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, array('class' => 'form-control input-sm')) !!}
  </div>
  <div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, array('class' => 'form-control input-sm')) !!}
  </div>
  <div class="form-group col-sm-6">
    {!! Form::label('Featured Image') !!}
    {!! Form::file('featured_image', null) !!}
  </div>
  <div class="form-group col-sm-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, array('class' => 'form-control input-sm', 'size' => 'x25')) !!}
  </div>
</div>
<hr>

<h3>Search Engine Optimization</h3>
<p class="text-muted"><em>Filling out this section is not required. However, your article will not be visible to search engines.</em></p>

<div class="row">
  <div class="form-group col-sm-6">
    {!! Form::label('seo_title', 'Title:') !!}
    {!! Form::text('seo_title', null, array('class' => 'form-control input-sm')) !!}
    <p class="text-muted"><em>If your SEO Title is not the same as your Article Title. The fate is in your hands to keep it similar.</em></p>

  </div>
  <div class="form-group col-sm-6">
    {!! Form::label('seo_keywords', 'Keywords:') !!}
    {!! Form::text('seo_keywords', null, array('class' => 'form-control input-sm')) !!}
    <p class="text-muted"><em>Keywords needs to be related to the Article. Separate the Keywords with a "," - Example: one, two, three</em></p>
  </div>
  <div class="form-group col-sm-12">
    {!! Form::label('seo_description', 'Description:') !!}
    {!! Form::textarea('seo_description', null, array('class' => 'form-control input-sm', 'size' => 'x3')) !!}
    <p class="text-muted"><em>Summarize your Article down to an ideal range of about 130 to 155 characters.</em></p>
  </div>
</div>

<hr>

<div class="panel panel-warning">
  <div class="panel-heading">
    Post Status
  </div>
  <div class="panel-body">
    <p class="text-muted"><em>For your post to be visible. The selection below should be Published.</em></p>
    <div class="form-group">
      <div class="styled-select">
        {!! Form::select('draft', array('1' => 'Draft', '0' => 'Published'), null, array('class' => 'form-control input-sm')) !!}
      </div>
    </div>
  </div>
</div>

<div class="form-group">
  {!! Form::submit($submit_text, ['class'=>'btn btn-success']) !!}
</div>
