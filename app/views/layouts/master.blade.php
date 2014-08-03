<html>
	<head>
		<title>
			Pomodoro - @yield('title', 'Default Title')
		</title>
		<script src="components/jquery/jquery.js"></script>
		<link href="components/normalize/normalize.css" rel="stylesheet" type="text/css">
		
		<!-- Bootstrap -->
		<link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

		<link href="vendor/twbs/bootstrap/dist/css/starter-template.css" rel="stylesheet">
	</head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>