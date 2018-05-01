<section class="green-bar">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				@if (isset($game))
					<div class="green-bar-title">
						<h1>{{ $game->name }}</h1>
					</div><!-- .green-bar-title -->
				@endif
			</div>
			<div class="col-md-6">
				<div class="green-bar-navigation">
					<ul class="pull-right">
						<li class="icon"><a href="#" title="FAQ"><i class="fa fa-question-circle-o"></i></a></li>
						<li class="icon"><a href="#" title="Contact us"><i class="fa fa-envelope"></i></a></li>
						<li class="icon"><a href="#" title="Support"><i class="fa fa-commenting-o"></i></a></li>
						<li class="lang text-uppercase hidden"><a href="#">EN</a></li>
					</ul>
				</div><!-- .green-navigation -->
			</div>
		</div>
	</div>
</section><!-- .green-bar -->