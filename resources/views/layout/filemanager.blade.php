<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HVG File Manager</title>
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/hvg-custom.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/file-manager.css') }}" rel="stylesheet">
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
<body>
	@include('filemanager._header')
	<div id="main-content">
		<div class="container file-manager">
			<!-- Dynamics are real -->
			@yield('content')
		</div>
	</div>

	<!-- Global Action Bar -->
	<div class="global-action-bar navbar-fixed-bottom">
		<div class="container file-manager">
	  	@include('layoutpartials._action_bar')
		</div>
	</div>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="{{ asset('/js/app-custom.js') }}"></script>

</body>
</html>
