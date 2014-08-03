<html>
	<head>
		<title>
			Pomodoro - @yield('title', 'Default Title')
		</title>
		<script src="assets/jquery/jquery.min.js"></script>
		<link href="assets/normalize-css/normalize.css" rel="stylesheet" type="text/css">
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		
	</head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>