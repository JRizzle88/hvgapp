<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	@if( isset($seo_title) && isset($post->seo_title) )
		<title>{{ isset($seo_title) ? $seo_title : 'HVG'}}</title>
		<meta name="keywords" content="{{ isset($seo_keywords) ? $seo_keywords : ''}}">
		<meta name="description" content="{{ isset($seo_description) ? $seo_description : ''}}">
	@endif

	@if( !isset($seo_title) && isset($post->seo_title)  )
		<title>{{ isset($post->seo_title) ? $post->seo_title : 'High Voltage Gaming'}} | High Voltage Gaming</title>
		<meta name="keywords" content="{{ isset($post->seo_keywords) ? $post->seo_keywords : ''}}">
		<meta name="description" content="{{ isset($post->seo_description) ? $post->seo_description : ''}}">
	@endif


	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/hvg-custom.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/yeti/bootstrap.min.css" />
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
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
<body id="blog">

  @include('layoutpartials.header')
	<div id="main-content">
		<div class="container">
			<!-- Dynamics are real -->
			<div class="row">
        <div class="main-content col-sm-9">
    			@yield('content')
        </div>
        <div class="sidebar col-sm-3">
          @include('layoutpartials.blog-sidebar')
        </div>
			</div>
		</div>
	</div>
	@include('layoutpartials.footer')

	<!-- Global Action Bar -->
	<div class="global-action-bar navbar-fixed-bottom">
		<div class="container">
	  	@include('layoutpartials._action_bar')
		</div>
	</div>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="{{ asset('/js/app-custom.js') }}"></script>

	<div class="left-background"></div>
	<div class="right-background"></div>
</body>
</html>
