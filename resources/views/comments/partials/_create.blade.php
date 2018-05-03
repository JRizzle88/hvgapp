
@if(Auth::check())
<div class="new-comment panel">
  <h3>Add Comment</h3>
    {!! Form::model(new App\Comment, ['route' => ['posts.comments.store', $post->slug], 'class'=>'']) !!}
      @include('comments/partials/_form', ['submit_text' => 'Add Comment'])
    {!! Form::close() !!}
</div>
@else
<div class="guest-comment-msg panel">
  You must <a href="{{ url('auth/login') }}"><i class="fa fa-sign-in"></i> log in</a> to comment. 
</div>
@endif
