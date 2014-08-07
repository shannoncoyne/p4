<html>
	<head>
		<title>
			Pomodoro - @yield('title', 'Default Title')
		</title>
		
		<?= stylesheet_link_tag() ?>
		
	</head>
    <body>
		<div class="container">
			<div class="header">
	        <ul class="nav nav-pills pull-right">
				@section('nav')
					@if(Auth::check())
							<li><a href="/pomodori">My Pomodori</a></li>
							<li><a href="/pomodori/create">Create New</a></li>
							<li><a href="/logout">Logout</a></li>
					@endif
					@if(!Auth::check())
						<li><a href="/signup">Sign Up</a></li>
						<li><a href="/login">Login</a></li>
					@endif	
		        @show
	        </ul>
	        <h3 class="text-muted">my<span class="red">Pomodoro</span></h3>
	      </div>
		</div>
			
			<div class="container">
				@if(Session::get('flash_message'))
					<div class="flash_message">{{ Session::get('flash_message') }}</div>
				@endif
				<div>
		            @yield('content')
				</div>
			</div>
			

					
					
		<?= javascript_include_tag() ?>
    </body>
</html>