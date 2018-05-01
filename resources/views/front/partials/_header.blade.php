<?php
	$user = auth()->user();
	$balance = $user->credit() - $user->debit() - $user->bets()->where('status', 'risked')->sum('amount');
?>
<header class="header clearfix">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="logo clearfix">
					<a href="{{ route('index') }}" title="Imbting.com">
						<img src="/img/logo.png" alt="Imbting">
					</a>
				</div><!-- .logo -->
			</div>
			<div class="col-sm-8">
				<div class="navigation clearfix">
					<ul class="pull-right">
						<li class="user hidden-xs">{{ auth()->user()->name }}</li>
						<li class="icon hidden-xs">
							<a href="#" title="Contact us">
								<i class="fa fa-envelope"></i>
							</a>
						</li>
						<li class="icon hidden-xs">
							<a href="#" title="Gifts">
								<i class="fa fa-gift"></i>
								<span class="badge">4</span>
							</a>
						</li>
						<li class="button red text-uppercase">
							<a title="Deposit">$ {{ $balance }}</a>
						</li>
						<li class="button bordered text-uppercase">
							<a href="{{ route('logout') }}" title="Deposit">Log out</a>
						</li>
					</ul>
				</div><!-- .navigation -->
			</div>
		</div>
	</div>
</header><!-- .header -->