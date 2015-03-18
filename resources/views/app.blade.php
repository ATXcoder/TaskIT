<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>TaskIt</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

		<link href="{{asset('css/app.css')}}" rel="stylesheet">
		<link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">
		<link href="{{asset('css/metisMenu.min.css')}}" rel="stylesheet">
		<link href="{{asset('css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
		
		@yield('css')

		<!-- Fonts -->
		<link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div id="wrapper">
			<!-- Navigation -->
			@include('partials.sidebar')
			<!-- Page Content -->
			<div id="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12" style="margin-top: 10px;">
							@yield('banner')
						</div>
						<!-- /.col-lg-12 -->
					</div>
					<!-- /.row -->
					@yield('content')
					<!-- /.container-fluid -->
				</div>
				<!-- /#page-wrapper -->

			</div>
			<!-- /#wrapper -->

			<!-- Scripts -->
			<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
			<script src="{{asset('js/moment.js')}}"></script>
			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

			<script src="{{asset('js/sb-admin-2.js')}}"></script>
			<script src="{{asset('js/metisMenu.min.js')}}"></script>
			<script src="{{asset('js/date.js')}}"></script>
			<script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
			@yield('scripts')
	</body>
</html>
