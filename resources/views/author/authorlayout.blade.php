<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Author Dashboard | High Voltage Gaming</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/admin.css') }}" rel="stylesheet">

	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/yeti/bootstrap.min.css" />
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body id="author">
	@include('author.authorpartials.header')
	<div id="main-content">
		<div class="container-fluid">
			<!-- Informational Flash Messages -->
			<div class="messages">
				@if (Session::has('message'))
					<div class="flash alert alert-info">
						<p>{{ Session::get('message') }}</p>
					</div>
				@endif
				<!-- Error Flash Messages -->
				@if ($errors->any())
					<div class='flash alert alert-danger'>
						@foreach ( $errors->all() as $error )
							<p>{{ $error }}</p>
						@endforeach
					</div>
				@endif
			</div>
			<!-- Dynamics are real -->
			<div class="row">
	      @include('author.authorpartials.left_nav')

					@yield('content')

				@include('author.authorpartials.right_nav')
			</div>
		</div>
	</div>
	<!-- Scripts -->

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src="{{ asset('/js/admin-custom.js') }}"></script>
</body>
</html>
