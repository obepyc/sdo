<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
	
	@include('layouts.partilas.top_menu')

	@yield('content')

	<!-- Scripts -->
	<script src="/assets/js/jquery.js"></script>

	@yield('scripts')

	<script src="/assets/js/main.js"></script>

</body>
</html>