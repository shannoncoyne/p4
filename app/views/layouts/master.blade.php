<html>
	<head>
		<title>
			Pomodoro - @yield('title', 'Default Title')
		</title>
		
		<?= stylesheet_link_tag() ?>
		<?= javascript_include_tag() ?>
		
	</head>
    <body>
		<div id="head">
			Pomodoro
			<ul>
				@if(Auth::check())
					Currently logged in as {{ Auth::user()->email }}
				@endif
				@section('nav')
					<li><a href="/signup">Sign Up</a></li>
					<li><a href="/login">Login</a></li>
					<li><a href="/logout">Logout</a></li>
		        @show
			</ul>
			
		</div>


		@if(Session::get('flash_message'))
			<div class='flash_message'>{{ Session::get('flash_message') }}</div>
		@endif
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>