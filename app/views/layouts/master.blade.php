<html>
	<head>
		<title>
			Pomodoro - @yield('title', 'Default Title')
		</title>
		<script src="{{ public_path() }}/assets/jquery/jquery.min.js"></script>
		<link href="{{ public_path() }}/assets/normalize-css/normalize.css" rel="stylesheet" type="text/css">
		<link href="{{ public_path() }}/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="{{ public_path() }}/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		
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
		<!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>