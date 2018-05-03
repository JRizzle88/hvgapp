@if(Auth::check())
  <!-- Admin Actions -->
  @if (Auth::user()->isSuperAdmin())
    <div class="actions">
      <span class="copyright">2015 Copyright - High Voltage Gaming</span>
        <div class="btn-group pull-right">
          <a href="{{ url('filemanager') }}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-file-text"></i> File Manager</a>
          <a href="{{ url('/posts') }}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-cogs"></i> Articles</a>
          <a href="{{ url('/teams') }}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-user"></i> Teams</a>
          <a href="{{ url('admin/players') }}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-user"></i> Players</a>
          <a href="{{ url('admin/pages') }}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-file"></i> Pages</a>
          <a href="{{ url('admin') }}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-cogs"></i> Admin</a>
          <a href="{{ url('player', Auth::user()->player_name) }}" type="button" class="btn btn-sm btn-info"><i class="fa fa-cogs"></i> Profile</a>
          <a href="{{ url('auth/logout') }}" type="button" class="btn btn-sm btn-info"><i class="fa fa-sign-out"></i> Logout</a>
        </div>
    </div>
  @endif

  <!-- Author Actions -->
  @if (Auth::user()->isAuthor())
    <div class="actions">
      <span class="copyright">2015 Copyright - High Voltage Gaming</span>
        <div class="btn-group pull-right">
          <a href="{{ url('filemanager') }}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-file-text"></i> File Manager</a>
          <a href="{{ url('author/posts') }}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-cogs"></i> Articles</a>
          <a href="{{ url('/players') }}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-user"></i> Players</a>
          <a href="{{ url('author') }}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-cogs"></i> Dashboard</a>
          <a href="{{ url('player', Auth::user()->player_name) }}" type="button" class="btn btn-sm btn-info"><i class="fa fa-cogs"></i> Profile</a>
          <a href="{{ url('auth/logout') }}" type="button" class="btn btn-sm btn-info"><i class="fa fa-sign-out"></i> Logout</a>
        </div>
    </div>
  @endif
  
  <!-- Player Actions -->
  @if (Auth::user()->isPlayer())
    <div class="actions">
      <span class="copyright">2015 Copyright - High Voltage Gaming</span>
        <div class="btn-group pull-right">
          <a href="{{ url('/teams') }}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-user"></i> Teams</a>
          <a href="{{ url('/players') }}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-user"></i> Players</a>
          <a href="{{ url('player', Auth::user()->player_name) }}" type="button" class="btn btn-sm btn-info"><i class="fa fa-cogs"></i> Profile</a>
          <a href="{{ url('auth/logout') }}" type="button" class="btn btn-sm btn-info"><i class="fa fa-sign-out"></i> Logout</a>
        </div>
    </div>
  @endif
@endif
