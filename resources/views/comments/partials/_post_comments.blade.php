<div class="clearfix"></div>
<div class="comment" id="comments-{{ $post->id }}">
  @if ( !$post->comments->count() )
    <p class="text-muted">This article has no comments. You can be the first Player to comment on this article.</p>
  @else
    @foreach( $post->comments as $comment )
        <div class="panel divider-sm">
          <div class="text-left col-sm-10">
            @if ($comment->user->online != 1)
              <i class="fa fa-user text-muted" data-toggle="tooltip" data-placement="top" title="Offline"></i>
              {{ $comment->user->player_name }} <small><em class="text-muted">Offline</em></small>
            @else
              <i class="fa fa-user text-success" data-toggle="tooltip" data-placement="top" title="Online"></i>
              {{ $comment->user->player_name }} <small><em class="text-success">Online</em></small>
            @endif
          </div>
          @if(!Auth::guest() && $comment->user_id == Auth::user()->id)
          <div class="text-right col-sm-2">
            {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('posts.comments.destroy', $post->slug, $comment->id))) !!}
                {!! link_to_route('posts.comments.edit', '', array($post->slug, $comment->id), array('class' => 'fa fa-edit', 'data-toggle' => 'modal', 'data-target' => '#commentEdit')) !!}
                {!! Form::button('<i class="fa fa-times text-danger"></i>', array('type' => 'submit', 'class' => 'delete-comment')) !!}
            {!! Form::close() !!}
          </div>
          @endif
        </div>

      <div class="well">
        <small class="text-muted"><i class="fa fa-calendar"></i> {{ date("F jS, Y",strtotime($comment->created_at)) }}</small>
        <p class="comment-content">{{ $comment->content }}</p>
      </div>
      @if(!Auth::guest())
      <!-- Edit Comment Modal -->
      <!-- Modal -->
      <div class="modal fade" id="commentEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times text-danger"></i></span></button>
              <h4 class="modal-title" id="myModalLabel">Edit Comment</h4>
            </div>
            <div class="modal-body">
              {!! Form::model($comment, ['method' => 'PATCH', 'route' => ['posts.comments.update', $post->slug, $comment->id]]) !!}
                @include('comments/partials/_form', ['submit_text' => 'Update Comment'])
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
      @endif
    @endforeach
  @endif
</div>
