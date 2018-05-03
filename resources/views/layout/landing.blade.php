<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
	<title>{{ isset($seo_title) ? $seo_title : 'HVG'}}</title>
	<meta name="keywords" content="{{ isset($seo_keywords) ? $seo_keywords : ''}}">
	<meta name="description" content="{{ isset($seo_description) ? $seo_description : ''}}">

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/hvg-custom.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/full-slider.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/yeti/bootstrap.min.css" />

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,900,500,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body id="landing-page">

	@include('layoutpartials.header')
		<!-- Dynamics are real -->
		@yield('content')
			
	@include('layoutpartials.footer')

	<!-- Global Action Bar -->
	<div class="global-action-bar navbar-fixed-bottom">
		<div class="container">
	  	@include('layoutpartials._action_bar')
		</div>
	</div>

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="{{ asset('/js/app-custom.js') }}"></script>

	<div class="left-background"></div>
	<div class="right-background"></div>
</body>
</html>
