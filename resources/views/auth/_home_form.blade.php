@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form class="home-page-login form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="form-group">
    <label class="control-label">E-Mail Address</label>
    <div class="">
      <input type="email" class="form-control" name="email" value="{{ old('email') }}">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label">Password <span><a class="text-muted" href="{{ url('/password/email') }}">Forgot Your Password?</a></span></label>
    <div class="">
      <input type="password" class="form-control" name="password">
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-6">
      <button type="submit" class="btn btn-danger btn-lg">Login</button>
    </div>
    <div class="col-md-6">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="remember"> Remember Me
        </label>
      </div>
    </div>
  </div>
</form>
