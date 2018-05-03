<div class="well">
<h3>Latests Articles</h3>
<ul>
  @if ( !$sidebarPosts->count() )
    There are no posts.
  @else
    @foreach( $sidebarPosts as $post )
    <li><a href="{{ route('posts.show', $post->slug) }}">{{ $post->name }}</a></li>
    @endforeach

  @endif
</ul>
</div
