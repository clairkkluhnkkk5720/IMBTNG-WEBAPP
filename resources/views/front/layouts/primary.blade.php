<?php $games = \App\Models\Game::get(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>@yield('page-title') | IMBTING</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="/css/bxslider/jquery.bxslider.min.css">
<link rel="stylesheet" type="text/css" href="/css/owl/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="/css/owl/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="/css/main.css?l=2">
<link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">

@yield('styles')

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

<div class="wrapper" id="wrapper">

	<div class="preloader">
		<div class="inner">
			<span class="spinner"></span>
		</div>
	</div>

	@include('front.partials._header')

	@include('front.partials._green-bar')

	<div class="container">
		<aside class="sidebar left clearfix hidden-xs hidden-sm">
			@include('front.partials.widgets._game-links', compact('games'))
		</aside><!-- .sidebar.left -->

		<section class="contents clearfix">
			
			@yield('contents')

		</section><!-- .contents -->

		<aside class="sidebar right clearfix">

			@include('front.partials.widgets._game-links_mobile', compact('games'))
			
			@include('front.partials.widgets._open-bets')

			{{-- @include('front.partials.widgets._leaderboard') --}}
			
		</aside><!-- .sidebar.right -->
	</div>

	@include('front.partials._footer')

	@include('front.partials.modals._place-bet')

</div><!-- .wrapper -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="/js/underscore-min.js"></script>
<script type="text/javascript" src="/js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="/js/jquery.countdown.min.js"></script>
<script type="text/javascript" src="/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/js/script.js?l=2"></script>

@yield('scripts')

</body>
</html>